<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class SimpleCaptcha
{
    const SESSION_KEY = 'comment_captcha_code';

    private const CHARSET = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    private const COLORS = ['#38BDF8', '#34D399', '#FBBF24', '#F472B6', '#A78BFA', '#60A5FA'];

    public static function generate(): string
    {
        $code = '';
        for ($i = 0; $i < 5; $i++) {
            $code .= self::CHARSET[random_int(0, strlen(self::CHARSET) - 1)];
        }

        Session::put(self::SESSION_KEY, $code);
        return $code;
    }

    public static function regenerate(): string
    {
        $code = self::generate();
        return self::generateSvg($code);
    }

    public static function verify(string $input): bool
    {
        $storedCode = Session::get(self::SESSION_KEY);

        if (!$storedCode) {
            return false;
        }

        $valid = strtoupper($storedCode) === strtoupper($input);
        Session::forget(self::SESSION_KEY);

        return $valid;
    }

    public static function getImage(): string
    {
        $code = Session::get(self::SESSION_KEY);

        if (!$code) {
            $code = self::generate();
        }

        return self::generateSvg($code);
    }

    private static function generateSvg(string $text): string
    {
        $width = 160;
        $height = 46;

        $wavyLines = [];
        for ($i = 0; $i < 8; $i++) {
            $y = random_int(5, $height - 5);
            $amplitude = random_int(3, 8);
            $path = "M 0 {$y}";
            for ($x = 0; $x <= $width; $x += 10) {
                $yOffset = $y + random_int(-$amplitude, $amplitude);
                $path .= " L {$x} {$yOffset}";
            }
            $stroke = self::COLORS[array_rand(self::COLORS)];
            $wavyLines[] = "<path d=\"{$path}\" fill=\"none\" stroke=\"{$stroke}\" stroke-width=\"1.5\" opacity=\"0.5\"/>";
        }

        $straightLines = [];
        for ($i = 0; $i < 6; $i++) {
            $x1 = random_int(0, $width);
            $y1 = random_int(0, $height);
            $x2 = random_int(0, $width);
            $y2 = random_int(0, $height);
            $stroke = self::COLORS[array_rand(self::COLORS)];
            $straightLines[] = "<line x1=\"{$x1}\" y1=\"{$y1}\" x2=\"{$x2}\" y2=\"{$y2}\" stroke=\"{$stroke}\" stroke-width=\"0.8\" opacity=\"0.6\"/>";
        }

        $dots = [];
        for ($i = 0; $i < 60; $i++) {
            $cx = random_int(0, $width);
            $cy = random_int(0, $height);
            $r = random_int(1, 2);
            $opacity = random_int(2, 5) / 10;
            $dots[] = "<circle cx=\"{$cx}\" cy=\"{$cy}\" r=\"{$r}\" fill=\"#FFFFFF\" opacity=\"{$opacity}\"/>";
        }

        $smallNoise = [];
        for ($i = 0; $i < 30; $i++) {
            $cx = random_int(0, $width);
            $cy = random_int(0, $height);
            $smallNoise[] = "<circle cx=\"{$cx}\" cy=\"{$cy}\" r=\"0.5\" fill=\"#000000\" opacity=\"0.3\"/>";
        }

        $charsSvg = [];
        $charSpacing = $width / (strlen($text) + 1.2);
        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            $x = floor(($i + 0.8) * $charSpacing);
            $y = 30 + (random_int(0, 8) - 4);
            $angle = random_int(-20, 20);
            $fontSize = random_int(22, 28);
            $color = self::COLORS[$i % count(self::COLORS)];
            $charsSvg[] = "<text x=\"{$x}\" y=\"{$y}\" fill=\"{$color}\" font-family=\"-apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif\" font-size=\"{$fontSize}\" font-weight=\"bold\" transform=\"rotate({$angle} {$x} {$y})\" style=\"filter: blur(0.3px);\">{$char}</text>";
        }

        $filterDef = '<defs><filter id="blur"><feGaussianBlur stdDeviation="0.3"/></filter></defs>';

        return "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"{$width}\" height=\"{$height}\" viewBox=\"0 0 {$width} {$height}\" style=\"background: linear-gradient(135deg, #080C14, #141D2E); border-radius: 6px; user-select: none;\">{$filterDef}" . implode('', $wavyLines) . implode('', $straightLines) . implode('', $dots) . implode('', $smallNoise) . implode('', $charsSvg) . "</svg>";
    }
}
