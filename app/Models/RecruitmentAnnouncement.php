<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentAnnouncement extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'batch_label',
        'announcement_date',
        'open_badge',
        'open_title',
        'open_description',
        'open_button_text',
        'open_button_url',
        'stay_tuned_badge',
        'stay_tuned_title',
        'stay_tuned_description',
        'stay_tuned_button_text',
        'stay_tuned_button_url',
        'closed_badge',
        'closed_title',
        'closed_description',
        'closed_button_text',
        'closed_button_url',
        'page_heading',
        'page_subheading',
        'closing_title',
        'closing_description',
        'divisions',
    ];

    protected $casts = [
        'divisions' => 'array',
    ];

    /**
     * Default divisions structure.
     */
    public static function defaultDivisions(): array
    {
        return [
            [
                'name' => 'Chief Executive Officer',
                'position' => 'Posisi: Staf / Relawan',
                'is_active' => true,
                'names' => [
                    'Eddy Putra Saragih – Staff Finance',
                ],
            ],
            [
                'name' => 'Business Development',
                'position' => 'Posisi: Staf / Relawan',
                'is_active' => true,
                'names' => [
                    'Dewi Susilowati – Staff Partnership',
                ],
            ],
            [
                'name' => 'Human Capital',
                'position' => 'Posisi: Staf / Relawan',
                'is_active' => true,
                'names' => [
                    'Nasywa Eka Widyaningrum – Staff TA Sosmed',
                    'Alya Zia Daviana Putri – Staff HCO',
                ],
            ],
            [
                'name' => 'Marketing',
                'position' => 'Posisi: Staf / Relawan',
                'is_active' => true,
                'names' => [
                    'Ester Sihombing – Staff Copywriting',
                    'Dafin Aflah – Staff Artikel Writer',
                    'Muhammad Ilyas Ridwan – Staff Sosmed Marketing',
                ],
            ],
            [
                'name' => 'Product Development',
                'position' => 'Posisi: Staf / Relawan',
                'is_active' => true,
                'names' => [
                    'Rosa Diga Putri – HO Education Counselor',
                    'Dien Amalia Ilma – Staff Product Development',
                    'Daffa\' Dzaky Muttaqiin – Staff Education Counselor',
                    'Julia Oliviana – Staff Education Counselor',
                ],
            ],
            [
                'name' => 'Technology',
                'position' => 'Posisi: Staf / Relawan',
                'is_active' => false,
                'names' => [],
            ],
        ];
    }

    /**
     * Retrieve the active/first announcement, or generate default instance.
     */
    public static function current(): self
    {
        $announcement = self::first();

        if (! $announcement) {
            $announcement = self::create([
                'status' => 'selesai',
                'batch_label' => 'Batch 6 Urgent Hiring – Official Announcement',
                'announcement_date' => 'Tanggal pengumuman belum tersedia',
                'open_badge' => 'PENDAFTARAN DIBUKA',
                'open_title' => 'Pendaftaran Relawan Batch 6 Telah Dibuka!',
                'open_description' => 'Ayo bergabung bersama keluarga besar House Ilmu Indonesia. Pilih divisi yang sesuai dengan potensimu sekarang.',
                'open_button_text' => 'Jelajahi Lowongan',
                'open_button_url' => '#career-info',
                'stay_tuned_badge' => 'STAY TUNED',
                'stay_tuned_title' => 'Proses Seleksi Sedang Berlangsung',
                'stay_tuned_description' => 'Terima kasih atas antusiasme Kawaners yang telah mendaftar. Tim kami sedang meninjau berkas pendaftaran. Pantau terus informasi selanjutnya di sini!',
                'stay_tuned_button_text' => 'Pantau Instagram',
                'stay_tuned_button_url' => 'https://www.instagram.com/houseilmu.id',
                'closed_badge' => 'REKRUTMEN SELESAI',
                'closed_title' => 'Pengumuman Hasil Seleksi Rekrutmen',
                'closed_description' => 'Terima kasih kepada seluruh Kawaners yang telah mengikuti seluruh rangkaian seleksi. Yuk periksa daftar nama yang lolos ke tahap onboarding.',
                'closed_button_text' => 'Lihat Pengumuman',
                'closed_button_url' => '/career/announcement',
                'page_heading' => 'Selamat kepada Kawaners yang telah lolos!',
                'page_subheading' => 'Terima kasih telah membawa semangat dan keberanian untuk berproses bersama House Ilmu Indonesia.',
                'closing_title' => 'Terima kasih sudah berproses bersama kami',
                'closing_description' => 'Terima kasih sudah menjadi bagian dari proses seleksi House Ilmu Indonesia. Tetap semangat dan jangan berhenti berkembang. Kesempatan lain masih terbuka!',
                'divisions' => self::defaultDivisions(),
            ]);
        }

        return $announcement;
    }
}

