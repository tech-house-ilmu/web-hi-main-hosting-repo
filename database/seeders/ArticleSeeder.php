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
                'text' => '<p class="article-lead">Persiapan yang matang merupakan langkah penting untuk mencari kesempatan magang. Berikut topik yang dapat membantu Anda menyusun langkah selanjutnya.</p>

<h2 id="kenali-perusahaan-budaya-kerja-top-tier">1. Kenali Perusahaan & Budaya Kerja Top-Tier</h2>
<p>Bagian ini membahas kenali perusahaan & budaya kerja top-tier sebagai bagian dari persiapan menuju kesempatan magang. Konten lengkap akan ditampilkan sesuai artikel resmi.</p>
<div class="article-callout">
    <span class="callout-title">Catatan</span>
    <p>Periksa kembali informasi dan persyaratan dari perusahaan tujuan sebelum melamar.</p>
</div>

<h2 id="formula-menulis-cv-ats-berbasis-impact">2. Formula Menulis CV ATS Berbasis Impact</h2>
<p>Bagian ini membahas formula menulis cv ats berbasis impact sebagai bagian dari persiapan menuju kesempatan magang. Konten lengkap akan ditampilkan sesuai artikel resmi.</p>
<div class="article-callout">
    <span class="callout-title">Catatan</span>
    <p>Periksa kembali informasi dan persyaratan dari perusahaan tujuan sebelum melamar.</p>
</div>

<h2 id="portofolio-relevan-bukti-nyata-eksekusi">3. Portofolio Relevan & Bukti Nyata Eksekusi</h2>
<p>Bagian ini membahas portofolio relevan & bukti nyata eksekusi sebagai bagian dari persiapan menuju kesempatan magang. Konten lengkap akan ditampilkan sesuai artikel resmi.</p>
<div class="article-callout">
    <span class="callout-title">Catatan</span>
    <p>Periksa kembali informasi dan persyaratan dari perusahaan tujuan sebelum melamar.</p>
</div>

<h2 id="tips-wawancara-kompetensi">4. Tips Wawancara Kompetensi</h2>
<p>Bagian ini membahas tips wawancara kompetensi sebagai bagian dari persiapan menuju kesempatan magang. Konten lengkap akan ditampilkan sesuai artikel resmi.</p>
<div class="article-callout">
    <span class="callout-title">Catatan</span>
    <p>Periksa kembali informasi dan persyaratan dari perusahaan tujuan sebelum melamar.</p>
</div>

<h2 id="etika-follow-up-pasca-wawancara">5. Etika Follow-Up Pasca Wawancara</h2>
<p>Bagian ini membahas etika follow-up pasca wawancara sebagai bagian dari persiapan menuju kesempatan magang. Konten lengkap akan ditampilkan sesuai artikel resmi.</p>
<div class="article-callout">
    <span class="callout-title">Catatan</span>
    <p>Periksa kembali informasi dan persyaratan dari perusahaan tujuan sebelum melamar.</p>
</div>',
                'img' => null,
                'author' => 'Tim Editorial HI',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(1),
                'slug' => 'panduan-lengkap-menembus-magang-idaman-di-perusahaan-top-tier-untuk-fresh-graduate-2025',
                'category' => 'Career Development',
            ],
            [
                'title' => 'Membangun Ide Bisnis yang Relevan untuk Generasi Muda',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia mengenai validasi ide bisnis, riset pasar praktis, dan eksekusi model bisnis berkelanjutan.</p>',
                'img' => null,
                'author' => 'Lutfia Rahmannisa',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(3),
                'slug' => 'membangun-ide-bisnis-yang-relevan-untuk-generasi-muda',
                'category' => 'Entrepreneur',
            ],
            [
                'title' => 'Skill Praktis untuk Menunjang Karier Masa Kini',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia seputar kemampuan digital, komunikasi profesional, dan adaptasi di era kerja modern.</p>',
                'img' => null,
                'author' => 'Faiza Kurniawati',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(4),
                'slug' => 'skill-praktis-untuk-menunjang-karier-masa-kini',
                'category' => 'Skill Development',
            ],
            [
                'title' => 'Mempersiapkan Langkah Awal Menuju Dunia Kerja',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia untuk membangun kesiapan mental, profesionalisme, serta jejaring kerja.</p>',
                'img' => null,
                'author' => 'Naila Nariswari',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(5),
                'slug' => 'mempersiapkan-langkah-awal-menuju-dunia-kerja',
                'category' => 'Career Development',
            ],
            [
                'title' => 'Dari Ide Menjadi Aksi: Memulai Project Pertamamu',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia tentang cara mengeksekusi proyek pertama dengan sumber daya minimal.</p>',
                'img' => null,
                'author' => 'Tim Redaksi HI',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(6),
                'slug' => 'dari-ide-menjadi-aksi-memulai-project-pertamamu',
                'category' => 'Entrepreneur',
            ],
            [
                'title' => 'Cara Belajar Skill Baru dengan Lebih Terarah',
                'text' => '<p>Jelajahi informasi dan tips dari House Ilmu Indonesia untuk memetakan kurikulum belajar mandiri dan teknik retensi materi efektif.</p>',
                'img' => null,
                'author' => 'Tim Editorial HI',
                'editor' => 'Tim Editorial HI',
                'date' => Carbon::now()->subDays(7),
                'slug' => 'cara-belajar-skill-baru-dengan-lebih-terarah',
                'category' => 'Skill Development',
            ],
        ];

        foreach ($articles as $article) {
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
