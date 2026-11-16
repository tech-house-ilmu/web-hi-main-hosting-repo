<?php

namespace App\Console\Commands;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class SyncServerArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:sync {--url=https://houseilmuindonesia.biz.id : The live server base URL}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync and download article data and images directly from the production server (Biznet)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $baseUrl = rtrim($this->option('url'), '/');
        $this->info("Fetching article list from {$baseUrl}/article ...");

        try {
            $response = Http::withOptions(['verify' => false, 'timeout' => 30])
                ->get("{$baseUrl}/article");

            if (!$response->successful()) {
                $this->error("Failed to fetch article list! HTTP Status: " . $response->status());
                return self::FAILURE;
            }

            $html = $response->body();
        } catch (\Throwable $e) {
            $this->error("Connection error: " . $e->getMessage());
            return self::FAILURE;
        }

        // Match all article card blocks
        $cardRegex = '/<a\s+href=["\'](?:https?:\/\/[^\/]+)?\/articles\/([^"\']+)["\']\s+class=["\']mix\s+([^"\']+)["\']>([\s\S]*?)<\/a>/i';
        preg_match_all($cardRegex, $html, $matches, PREG_SET_ORDER);

        if (empty($matches)) {
            // Alternative regex for absolute URLs
            $cardRegexAlt = '/<a\s+href=["\'](https?:\/\/[^\/]+\/articles\/([^"\']+))["\'][\s\S]*?class=["\'][^"\']*mix\s+([^"\']+)["\']>([\s\S]*?)<\/a>/i';
            preg_match_all($cardRegexAlt, $html, $matches, PREG_SET_ORDER);
        }

        $itemsToProcess = [];
        foreach ($matches as $match) {
            $slugRaw = count($match) >= 5 ? $match[2] : $match[1];
            $catClass = count($match) >= 5 ? $match[3] : $match[2];
            $cardHtml = count($match) >= 5 ? $match[4] : $match[3];

            $slug = urldecode($slugRaw);

            // Card Image
            $cardImg = null;
            if (preg_match('/src=["\']([^"\']+)["\']/i', $cardHtml, $imgM)) {
                $cardImg = $imgM[1];
            }

            // Card Title
            $cardTitle = null;
            if (preg_match('/<h[1-6][^>]*>(.*?)<\/h[1-6]>/is', $cardHtml, $tM)) {
                $cardTitle = trim(strip_tags($tM[1]));
            }

            $itemsToProcess[$slug] = [
                'slug' => $slug,
                'categoryClass' => $catClass,
                'cardImg' => $cardImg,
                'cardTitle' => $cardTitle,
            ];
        }

        $totalFound = count($itemsToProcess);
        $this->info("Found {$totalFound} articles on server. Fetching details and images...");

        $targetDir = storage_path('app/public/articles');
        if (!File::isDirectory($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        $publicArticlesDir = public_path('storage/articles');
        if (!File::isDirectory($publicArticlesDir)) {
            File::makeDirectory($publicArticlesDir, 0755, true);
        }

        $serverSlugs = [];
        $syncedArticles = [];
        $bar = $this->output->createProgressBar($totalFound);
        $bar->start();

        foreach ($itemsToProcess as $item) {
            $encodedSlug = implode('/', array_map('rawurlencode', explode('/', $item['slug'])));
            $detailUrl = "{$baseUrl}/articles/{$encodedSlug}";

            try {
                $resDetail = Http::withOptions(['verify' => false, 'timeout' => 30])->get($detailUrl);
                if (!$resDetail->successful()) {
                    $bar->advance();
                    continue;
                }
                $detailHtml = $resDetail->body();
            } catch (\Throwable $e) {
                $bar->advance();
                continue;
            }

            // Extract Title
            $title = $item['cardTitle'] ?: $item['slug'];
            if (preg_match('/<h1[^>]*style=["\'][^"\']*#174EA6[^"\']*["\'][^>]*>(.*?)<\/h1>/is', $detailHtml, $tM) ||
                preg_match('/<h1[^>]*>(.*?)<\/h1>/is', $detailHtml, $tM)) {
                $title = trim(strip_tags($tM[1]));
            }

            // Extract Date
            $rawDate = '';
            if (preg_match('/<p[^>]*style=["\'][^"\']*#797676[^"\']*["\'][^>]*>(.*?)<\/p>/is', $detailHtml, $dM)) {
                $rawDate = trim(strip_tags($dM[1]));
            }

            try {
                $date = !empty($rawDate) ? Carbon::parse($rawDate)->format('Y-m-d') : Carbon::now()->format('Y-m-d');
            } catch (\Throwable $e) {
                $date = Carbon::now()->format('Y-m-d');
            }

            // Extract Author & Editor
            $author = 'House Ilmu';
            if (preg_match('/<p[^>]*>\s*Penulis\s*:\s*(.*?)<\/p>/i', $detailHtml, $aM)) {
                $author = trim(strip_tags($aM[1]));
            }

            $editor = 'House Ilmu';
            if (preg_match('/<p[^>]*>\s*Editor\s*:\s*(.*?)<\/p>/i', $detailHtml, $eM)) {
                $editor = trim(strip_tags($eM[1]));
            }

            // Extract Image
            $imgUrl = $item['cardImg'];
            if (preg_match('/<img[^>]*class=["\'][^"\']*rounded-4[^"\']*["\'][^>]*src=["\']([^"\']+)["\']/i', $detailHtml, $iM)) {
                $imgUrl = $iM[1];
            }

            $storedImgPath = null;
            if (!empty($imgUrl)) {
                if (str_starts_with($imgUrl, '/')) {
                    $imgUrl = $baseUrl . $imgUrl;
                }

                $filename = basename(parse_url($imgUrl, PHP_URL_PATH));
                $localFilePath = "{$targetDir}/{$filename}";
                $publicFilePath = "{$publicArticlesDir}/{$filename}";

                if (!File::exists($localFilePath) || filesize($localFilePath) === 0) {
                    try {
                        $imgContent = Http::withOptions(['verify' => false, 'timeout' => 45])->get($imgUrl)->body();
                        if (!empty($imgContent)) {
                            File::put($localFilePath, $imgContent);
                            File::put($publicFilePath, $imgContent);
                        }
                    } catch (\Throwable $e) {
                        // ignore image download failure
                    }
                } else if (!File::exists($publicFilePath)) {
                    @copy($localFilePath, $publicFilePath);
                }

                $storedImgPath = 'articles/' . $filename;
            }

            // Extract Body Text
            $text = '';
            if (preg_match('/<div class=["\']article-text[^"\']*["\'][^>]*>([\s\S]*?)<\/div>\s*<!-- End article text section -->/i', $detailHtml, $bodyM) ||
                preg_match('/<div class=["\']article-text[^"\']*["\'][^>]*>([\s\S]*?)<\/div>/i', $detailHtml, $bodyM)) {
                $text = trim($bodyM[1]);
            }

            // Category Formatting
            $catClass = strtolower($item['categoryClass']);
            $category = 'Skill Development';
            if (str_contains($catClass, 'career-development') || str_contains($catClass, 'career')) {
                $category = 'Career Development';
            } elseif (str_contains($catClass, 'entrepreneur') || str_contains($catClass, 'wirausaha')) {
                $category = 'Entrepreneur';
            }

            // Save to DB
            Article::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'title' => $title,
                    'text' => $text,
                    'img' => $storedImgPath,
                    'author' => $author,
                    'editor' => $editor,
                    'date' => $date,
                    'category' => $category,
                ]
            );

            $serverSlugs[] = $item['slug'];
            $syncedArticles[] = [
                'id' => Article::where('slug', $item['slug'])->value('id'),
                'title' => $title,
                'slug' => $item['slug'],
                'category' => $category,
                'date' => $date,
                'author' => $author,
            ];

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        // Remove dummy articles
        if (!empty($serverSlugs)) {
            $removed = Article::whereNotIn('slug', $serverSlugs)->delete();
            if ($removed > 0) {
                $this->warn("Removed {$removed} dummy article(s) that are not on the server.");
            }
        }

        $this->table(
            ['ID', 'Date', 'Category', 'Author', 'Title'],
            array_map(function($a) {
                return [
                    $a['id'],
                    $a['date'],
                    $a['category'],
                    $a['author'],
                    \Illuminate\Support\Str::limit($a['title'], 45),
                ];
            }, $syncedArticles)
        );

        $this->info("Successfully synchronized " . count($syncedArticles) . " articles from server!");
        return self::SUCCESS;
    }
}
