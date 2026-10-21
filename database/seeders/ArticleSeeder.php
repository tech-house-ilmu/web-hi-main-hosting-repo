<?php

namespace Database\Seeders;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Panduan Lengkap Menembus Magang Idaman di Perusahaan Top Tier untuk Fresh Graduate 2025',
                'text' => '<p>Panduan untuk mempersiapkan langkah awal menuju kesempatan magang. Mempersiapkan CV yang relevan, portofolio yang memikat, serta strategi menghadapi wawancara teknis dan behavioral.</p>',
                'img' => 'articles/career1.webp',
                'src' => 'img/homepage/article/skill-development1.webp',
                'author' => 'Tim Editorial HI',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(1),
                'slug' => 'panduan-lengkap-menembus-magang-idaman-di-perusahaan-top-tier-untuk-fresh-graduate-2025',
                'category' => 'Career Development',
            ],
            [
                'title' => 'Membangun Ide Bisnis yang Relevan untuk Generasi Muda',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia mengenai validasi ide bisnis, riset pasar praktis, dan eksekusi model bisnis berkelanjutan.</p>',
                'img' => 'articles/business1.webp',
                'src' => 'img/homepage/article/education1.webp',
                'author' => 'Lutfia Rahmannisa',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(3),
                'slug' => 'membangun-ide-bisnis-yang-relevan-untuk-generasi-muda',
                'category' => 'Entrepreneur',
            ],
            [
                'title' => 'Skill Praktis untuk Menunjang Karier Masa Kini',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia seputar kemampuan digital, komunikasi profesional, dan adaptasi di era kerja modern.</p>',
                'img' => 'articles/skill1.webp',
                'src' => 'img/homepage/article/research1.webp',
                'author' => 'Faiza Kurniawati',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(4),
                'slug' => 'skill-praktis-untuk-menunjang-karier-masa-kini',
                'category' => 'Skill Development',
            ],
            [
                'title' => 'Mempersiapkan Langkah Awal Menuju Dunia Kerja',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia untuk membangun kesiapan mental, profesionalisme, serta jejaring kerja.</p>',
                'img' => 'articles/career2.webp',
                'src' => 'img/homepage/article/skill-development1.webp',
                'author' => 'Naila Nariswari',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(5),
                'slug' => 'mempersiapkan-langkah-awal-menuju-dunia-kerja',
                'category' => 'Career Development',
            ],
            [
                'title' => 'Dari Ide Menjadi Aksi: Memulai Project Pertamamu',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia tentang cara mengeksekusi proyek pertama dengan sumber daya minimal.</p>',
                'img' => 'articles/business2.webp',
                'src' => 'img/homepage/article/education1.webp',
                'author' => 'Tim Redaksi HI',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(6),
                'slug' => 'dari-ide-menjadi-aksi-memulai-project-pertamamu',
                'category' => 'Entrepreneur',
            ],
            [
                'title' => 'Cara Belajar Skill Baru dengan Lebih Terarah',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia untuk memetakan kurikulum belajar mandiri dan teknik retensi materi efektif.</p>',
                'img' => 'articles/skill2.webp',
                'src' => 'img/homepage/article/research1.webp',
                'author' => 'Tim Editorial HI',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(7),
                'slug' => 'cara-belajar-skill-baru-dengan-lebih-terarah',
                'category' => 'Skill Development',
            ],
        ];

        foreach ($articles as $article) {
            if (! Storage::disk('public')->exists($article['img']) && file_exists(public_path($article['src']))) {
                Storage::disk('public')->put($article['img'], file_get_contents(public_path($article['src'])));
            }

            Article::updateOrCreate(
                ['slug' => $article['slug']],
                [
                    'title' => $article['title'],
                    'text' => $article['text'],
                    'img' => $article['img'],
                    'author' => $article['author'],
                    'editor' => $article['editor'],
                    'date' => $article['date'],
                    'slug' => $article['slug'],
                    'category' => $article['category'],
                ]
            );
        }
    }
}
