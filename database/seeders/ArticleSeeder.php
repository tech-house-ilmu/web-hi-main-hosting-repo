<?php

namespace Database\Seeders;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seeds the real production articles from House Ilmu Indonesia.
     */
    public function run(): void
    {
        $jsonFile = storage_path('server_articles.json');
        if (file_exists($jsonFile)) {
            $articles = json_decode(file_get_contents($jsonFile), true);
        } else {
            $articles = [
                [
                    'title' => 'Kawaners, Yuk Ceritakan Pencapaian Kecil yang Paling Kamu Syukuri Bulan ini!',
                    'slug' => 'Ceritakan-Pencapaian-Kecil-yang-Paling-Kamu-Syukuri-Bulan-ini',
                    'date' => '2026-11-03',
                    'author' => 'Sri Deviana',
                    'editor' => 'Faruz',
                    'category' => 'Skill Development',
                    'img' => 'articles/01M6FFEEHRH3XSFVDSGDF0QAQ8.png',
                    'text' => '<p>Setiap orang punya proses dan waktunya masing-masing. Apa yang terlihat sederhana bagi orang lain, bisa jadi merupakan hal besar yang berhasil kita perjuangkan dengan susah payah.</p>',
                ],
                [
                    'title' => 'Main Character, Si Paling Sibuk, atau Si Santai? Kenali Versi Dirimu di Dunia Perkuliahan',
                    'slug' => 'Kenali-Versi-Dirimu-di-Dunia-Perkuliahan',
                    'date' => '2026-11-03',
                    'author' => 'Sri Deviana',
                    'editor' => 'Faruz',
                    'category' => 'Skill Development',
                    'img' => 'articles/01M6FDE3JSARG6G6Z95E4MMK67.png',
                    'text' => '<p>Dunia perkuliahan sering kali digambarkan sebagai masa-masa yang penuh warna, kebebasan, dan eksplorasi diri.</p>',
                ],
                [
                    'title' => 'Sering Kewalahan dengan Tugas? Ini Metode Time Management Biar Gak Mudah Burnout!',
                    'slug' => 'Metode-Time-Management-Biar-Gak-Mudah-Burnout',
                    'date' => '2026-10-22',
                    'author' => 'Sri Deviana',
                    'editor' => 'Faruz',
                    'category' => 'Skill Development',
                    'img' => 'articles/01M5H24T5N63D8G6S0N3EVD9BT.png',
                    'text' => '<p>Menjalani aktivitas sehari-hari sering kali terasa seperti perlombaan dengan waktu. Tugas kuliah yang terus berdatangan, urusan organisasi yang nggak ada habisnya, hingga tuntutan pekerjaan atau proyek sampingan bisa dengan mudah membuat energi kita terkuras.</p>',
                ],
                [
                    'title' => '3 Skills Yang Bikin Kawaners Ga Bakal Tergantikan Oleh AI di Tahun 2026',
                    'slug' => '3 Skills Yang Bikin Kawaners Ga Bakal-Tergantikan-Oleh-AI-di-Tahun-2026',
                    'date' => '2026-06-22',
                    'author' => 'Yusrina Rachma Fauziah',
                    'editor' => 'Tim Editorial HI',
                    'category' => 'Skill Development',
                    'img' => 'articles/01KVQS7NC710R777F0BQ2NQ8RX.png',
                    'text' => '<p>Perkembangan teknologi artificial intelligence (AI) berkembang dengan sangat cepat dan mempengaruhi berbagai aspek kehidupan kita.</p>',
                ],
                [
                    'title' => 'Digital Marketing Yang Sedang Tren di Tahun 2026',
                    'slug' => 'Digital-Marketing-Yang Sedang-Tren-di-Tahun-2026',
                    'date' => '2026-06-22',
                    'author' => 'Yusrina Rachma Fauziah',
                    'editor' => 'Tim Editorial HI',
                    'category' => 'Skill Development',
                    'img' => 'articles/01KVQRZEPPV5V2GB37AYY5C054.png',
                    'text' => '<p>Tren digital marketing terus bertransformasi seiring dengan perubahan teknologi dan kebiasaan konsumen di era modern.</p>',
                ],
                [
                    'title' => 'Tips Bangun Personal Branding Dari Nol. Langsung Bisa Kawaners Praktekkan!',
                    'slug' => 'Tips-Bangun-Personal-Branding-Dari-Nol',
                    'date' => '2026-06-22',
                    'author' => 'Yusrina Rachma Fauziah',
                    'editor' => 'Tim Editorial HI',
                    'category' => 'Career Development',
                    'img' => 'articles/01KVQRHA2MHD0NP5JCQZ7973J2.png',
                    'text' => '<p>Membangun citra diri atau personal branding yang profesional menjadi nilai tambah yang sangat penting dalam dunia karier saat ini.</p>',
                ],
                [
                    'title' => 'CV ATS atau CV Kreatif, Mana Yang Lebih Efektif Untuk Lamar Kerja?',
                    'slug' => 'cv-ats-atau-cv-kreatif-mana-yang-lebih-efektif-untuk-lamar-kerja',
                    'date' => '2026-05-17',
                    'author' => 'Yusrina',
                    'editor' => 'Tim Editorial HI',
                    'category' => 'Career Development',
                    'img' => 'articles/01KRRTRRN7JXW1HZ5G1RMM1AGW.png',
                    'text' => '<p>Perdebatan antara penggunaan CV format ATS friendly dan CV kreatif kerap membingungkan para pencari kerja.</p>',
                ],
                [
                    'title' => 'Banyak Freshgraduate Masih Bingung Soal Karier? Kenapa Ya?',
                    'slug' => 'banyak-freshgraduate-masih-bingung-soal-karier-kenapa-ya',
                    'date' => '2026-05-17',
                    'author' => 'Yusrina',
                    'editor' => 'Tim Editorial HI',
                    'category' => 'Career Development',
                    'img' => 'articles/01KRRTPX973KVVPCS0A85WGYRZ.png',
                    'text' => '<p>Transisi dari bangku perkuliahan menuju dunia profesional seringkali menimbulkan rasa cemas dan kebingungan bagi lulusan baru.</p>',
                ],
                [
                    'title' => 'Bootcamp GRATIS Untuk Kamu Yang Ingin Mulai Karir Di Bidang Digital Marketing',
                    'slug' => 'bootcamp-gratis-untuk-pemula-yang-ingin-belajar-digital-marketing',
                    'date' => '2026-05-17',
                    'author' => 'Yusrina',
                    'editor' => 'Tim Editorial HI',
                    'category' => 'Career Development',
                    'img' => 'articles/01KRRTK4W9ZVY27GD5369NSHZP.jpg',
                    'text' => '<p>Memulai karier baru di ranah digital kini semakin mudah dengan beragam pilihan pelatihan dan bootcamp tanpa biaya.</p>',
                ],
                [
                    'title' => 'INFO! Rekomendasi Paid Internship di Beberapa Perusahaan Terkenal Indonesia',
                    'slug' => 'rekomendasi-paid-internship-di-beberapa-perusahaan-terkenal-indonesia',
                    'date' => '2026-05-17',
                    'author' => 'Yusrina',
                    'editor' => 'Tim Editorial HI',
                    'category' => 'Career Development',
                    'img' => 'articles/01KRRTGWM1A6TY0WMCTG931CKS.png',
                    'text' => '<p>Informasi program magang berbayar di berbagai perusahaan terkemuka yang dapat menjadi batu loncatan kariermu.</p>',
                ],
                [
                    'title' => 'Julukan Gen Z Di Dunia Kerja : Generasi Melek Teknologi dan Penjujung Tinggi Work Life Balance',
                    'slug' => 'julukan-gen-z-di-dunia-kerja-generasi-melek-teknologi-dan-penjujung-tinggi-work-life-balance',
                    'date' => '2026-05-17',
                    'author' => 'Yusrina',
                    'editor' => 'Tim Editorial HI',
                    'category' => 'Career Development',
                    'img' => 'articles/01KRRT9WXD4W11AQKR1A67ZHC9.png',
                    'text' => '<p>Mengenal karakter, kebiasaan kerja, dan nilai-nilai yang dibawa oleh generasi Z ke dalam lingkungan kerja masa kini.</p>',
                ],
                [
                    'title' => 'Bagaimana Penelitian Memperkuat Perkembangan Pribadi?',
                    'slug' => 'bagaimana-penelitian-memperkuat-perkembangan-pribadi',
                    'date' => '2025-05-16',
                    'author' => 'admin',
                    'editor' => 'Tim Editorial HI',
                    'category' => 'Skill Development',
                    'img' => 'articles/01KK73JSQN5049VVV4NVMBCDQ0.jpg',
                    'text' => '<p>Penelitian bukan hanya sekadar aktivitas akademis, melainkan juga proses refleksi dan pengembangan kemampuan berpikir kritis.</p>',
                ],
            ];
        }

        foreach ($articles as $item) {
            $slug = $item['slug'];
            $img = isset($item['imgUrl']) ? 'articles/' . basename($item['imgUrl']) : ($item['img'] ?? null);

            try {
                $date = Carbon::parse($item['date'])->format('Y-m-d');
            } catch (\Throwable $e) {
                $date = Carbon::now()->format('Y-m-d');
            }

            // Normalisasi kategori ke 5 kategori resmi: promotional, education, entertainment, engagement, inspiration
            $rawCat = strtolower(trim((string)($item['category'] ?? '')));
            $titleLower = strtolower(trim((string)$item['title']));

            if (str_contains($rawCat, 'promo') || str_contains($titleLower, 'bootcamp') || str_contains($titleLower, 'internship di beberapa')) {
                $category = 'promotional';
            } elseif (str_contains($rawCat, 'entertain') || str_contains($titleLower, 'main character') || str_contains($titleLower, 'julukan gen z')) {
                $category = 'entertainment';
            } elseif (str_contains($rawCat, 'engage') || str_contains($titleLower, 'ceritakan pencapaian') || str_contains($titleLower, 'syukuri')) {
                $category = 'engagement';
            } elseif (str_contains($rawCat, 'inspira') || str_contains($titleLower, 'personal branding') || str_contains($titleLower, 'freshgraduate masih bingung')) {
                $category = 'inspiration';
            } else {
                $category = 'education';
            }

            Article::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $item['title'],
                    'text' => $item['text'],
                    'img' => $img,
                    'author' => $item['author'] ?? 'House Ilmu',
                    'editor' => $item['editor'] ?? 'House Ilmu',
                    'date' => $date,
                    'category' => $category,
                ]
            );
        }
    }
}
