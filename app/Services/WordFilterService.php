<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class WordFilterService
{
    /**
     * In-memory cache of the compiled regex and category mapping.
     */
    private static ?array $cachedData = null;

    /**
     * Path candidates for banned_wordlist.json.
     */
    private static function getFilePath(): ?string
    {
        $paths = [
            storage_path('app/banned_wordlist.json'),
            config_path('banned_wordlist.json'),
            base_path('banned_wordlist.json'),
        ];

        foreach ($paths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }

        return null;
    }

    /**
     * Load raw categories and words from JSON.
     */
    public static function getWordlist(): array
    {
        return Cache::remember('banned_wordlist_data', 3600, function () {
            $path = self::getFilePath();
            if (!$path || !file_exists($path)) {
                return [];
            }

            $content = file_get_contents($path);
            $data = json_decode($content, true);

            return is_array($data) ? $data : [];
        });
    }

    /**
     * Get compiled regex and word-to-category map.
     */
    private static function getCompiledData(): array
    {
        if (self::$cachedData !== null) {
            return self::$cachedData;
        }

        $rawList = self::getWordlist();
        $allWords = [];

        foreach ($rawList as $category => $words) {
            if (!is_array($words)) continue;
            foreach ($words as $word) {
                $trimmed = trim((string) $word);
                if ($trimmed !== '') {
                    $allWords[mb_strtolower($trimmed)] = $category;
                }
            }
        }

        // Sort descending by length to match longer phrases first (e.g., "bego banget" before "bego")
        uksort($allWords, fn($a, $b) => mb_strlen($b) <=> mb_strlen($a));

        $patterns = [];
        foreach (array_keys($allWords) as $word) {
            $escaped = preg_replace('/\s+/', '\s+', preg_quote($word, '/'));
            $patterns[] = '\b' . $escaped . '\b';
        }

        $regex = !empty($patterns) ? '/(' . implode('|', $patterns) . ')/iu' : null;

        self::$cachedData = [
            'regex' => $regex,
            'map' => $allWords,
        ];

        return self::$cachedData;
    }

    /**
     * Check if text contains any banned words.
     *
     * @param string|null $text
     * @return array|null Returns details array ['word' => ..., 'category' => ...] if detected, null if clean.
     */
    public static function check(?string $text): ?array
    {
        if ($text === null || trim($text) === '') {
            return null;
        }

        $compiled = self::getCompiledData();
        if (!$compiled['regex']) {
            return null;
        }

        if (preg_match($compiled['regex'], $text, $matches)) {
            $matchedWord = $matches[0];
            $normalizedWord = mb_strtolower(preg_replace('/\s+/', ' ', trim($matchedWord)));
            $category = $compiled['map'][$normalizedWord] ?? 'inappropriate';

            return [
                'found' => true,
                'word' => $matchedWord,
                'category' => $category,
            ];
        }

        return null;
    }

    /**
     * Boolean check if text has any banned word.
     */
    public static function containsBannedWord(?string $text): bool
    {
        return self::check($text) !== null;
    }

    /**
     * Return the first detected banned word, or null.
     */
    public static function findBannedWord(?string $text): ?string
    {
        $result = self::check($text);
        return $result ? $result['word'] : null;
    }

    /**
     * Censor banned words in text with replacement string.
     */
    public static function censor(?string $text, string $replacement = '***'): string
    {
        if ($text === null || trim($text) === '') {
            return '';
        }

        $compiled = self::getCompiledData();
        if (!$compiled['regex']) {
            return $text;
        }

        return preg_replace_callback($compiled['regex'], function ($match) use ($replacement) {
            if ($replacement === '***') {
                return str_repeat('*', mb_strlen($match[0]));
            }
            return $replacement;
        }, $text);
    }

    /**
     * Clear cached wordlist from memory & Laravel cache.
     */
    public static function clearCache(): void
    {
        self::$cachedData = null;
        Cache::forget('banned_wordlist_data');
    }
}
