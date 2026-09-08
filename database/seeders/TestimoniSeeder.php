<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonis = [
            [
                'testimoni_name' => 'Dhini Pratiwi',
                'testimoni_position' => 'Alumni Sudut Karir',
                'testimoni_img' => 'testimonis/dhini.webp',
                'src' => 'img/homepage/about/Dhini.webp',
                'testimoni_description' => 'Program Sudut Karir sangat membantu aku dalam mempersiapkan CV dan interview kerja. Materinya komprehensif dan dimentori langsung oleh para expert di industri!',
            ],
            [
                'testimoni_name' => 'Dwi Puji Lestari',
                'testimoni_position' => 'Peserta Review CV',
                'testimoni_img' => 'testimonis/dwi.webp',
                'src' => 'img/homepage/about/DWI_PUJI_LESTARI- VP Marketing.webp',
                'testimoni_description' => 'Setelah ikut sesi review CV di House Ilmu, saya jadi paham bagaimana membuat CV ATS yang baik dan tepat sasaran. Dalam 2 minggu langsung dapat panggilan interview!',
            ],
            [
                'testimoni_name' => 'Naila Nariswari',
                'testimoni_position' => 'Mentee House Ilmu',
                'testimoni_img' => 'testimonis/naila.webp',
                'src' => 'img/homepage/about/Naila_Nariswari_HP_VP Human Capital.webp',
                'testimoni_description' => 'Pengalaman belajar dan mentoring di House Ilmu membuka wawasan baru tentang persiapan karir profesional sejak masih di bangku kuliah.',
            ],
        ];

        foreach ($testimonis as $item) {
            if (! Storage::disk('public')->exists($item['testimoni_img']) && file_exists(public_path($item['src']))) {
                Storage::disk('public')->put($item['testimoni_img'], file_get_contents(public_path($item['src'])));
            }

            Testimoni::updateOrCreate(
                ['testimoni_name' => $item['testimoni_name']],
                [
                    'testimoni_name' => $item['testimoni_name'],
                    'testimoni_position' => $item['testimoni_position'],
                    'testimoni_img' => $item['testimoni_img'],
                    'testimoni_description' => $item['testimoni_description'],
                ]
            );
        }
    }
}
