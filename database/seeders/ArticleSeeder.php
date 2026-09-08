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
                'title' => 'Tips Membangun Portofolio Tech untuk Fresh Graduate',
                'text' => '<p>Membangun portofolio teknologi yang menarik tidak hanya tentang kuantitas proyek, melainkan bagaimana Anda menyelesaikan masalah nyata dengan kode yang bersih dan terstruktur. Dokumentasikan setiap proyek di GitHub dengan README yang informatif dan sertakan demo link.</p>',
                'img' => 'articles/research1.webp',
                'src' => 'img/homepage/article/research1.webp',
                'author' => 'Faiza Kurniawati',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(2),
                'slug' => 'tips-membangun-portofolio-tech-fresh-graduate',
                'category' => 'Skill Development',
            ],
            [
                'title' => 'Langkah Awal Memulai Startup Digital dari Bangku Kuliah',
                'text' => '<p>Menjadi mahasiswa adalah waktu terbaik untuk bereksplorasi dan memulai usaha rintisan. Validasi ide sejak dini, temukan rekan tim yang saling melengkapi, dan pelajari cara menemukan Product-Market Fit melalui riset pengguna yang mendalam.</p>',
                'img' => 'articles/education1.webp',
                'src' => 'img/homepage/article/education1.webp',
                'author' => 'Lutfia Rahmannisa',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(5),
                'slug' => 'langkah-awal-memulai-startup-digital-dari-bangku-kuliah',
                'category' => 'Entrepreneur',
            ],
            [
                'title' => 'Strategi Sukses Lolos Seleksi Management Trainee',
                'text' => '<p>Program Management Trainee (MT) menjadi incaran banyak lulusan baru. Pelajari tahapan asesmen, Focus Group Discussion (FGD), serta cara menjawab interview berbasis behavioral menggunakan metode STAR (Situation, Task, Action, Result).</p>',
                'img' => 'articles/skill-development1.webp',
                'src' => 'img/homepage/article/skill-development1.webp',
                'author' => 'Naila Nariswari',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(8),
                'slug' => 'strategi-sukses-lolos-seleksi-management-trainee',
                'category' => 'Career Development',
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
