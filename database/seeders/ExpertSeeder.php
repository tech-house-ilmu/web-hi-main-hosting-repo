<?php

namespace Database\Seeders;

use App\Models\Expert;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ExpertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experts = [
            [
                'name' => 'Lutfia Rahmannisa',
                'position' => 'CEO of House Ilmu',
                'image' => 'experts/lutfia.webp',
                'src' => 'img/homepage/Lutfia Rahmannisa_CEO.webp',
                'skills' => ['Leadership', 'Innovation Management', 'Project Management'],
                'is_active' => true,
            ],
            [
                'name' => 'Faiza Kurniawati',
                'position' => 'VP of Technology',
                'image' => 'experts/faiza.webp',
                'src' => 'img/homepage/about/Faiza Kurniawati_VP Technology.webp',
                'skills' => ['Fullstack Dev', 'Cloud Computing', 'System Architecture'],
                'is_active' => true,
            ],
            [
                'name' => 'Alfianti Yanuar Mega',
                'position' => 'VP of Product Development',
                'image' => 'experts/alfianti.webp',
                'src' => 'img/homepage/about/Alfianti Yanuar Mega_VP Prodev.webp',
                'skills' => ['Product Strategy', 'UI/UX Design', 'User Research'],
                'is_active' => true,
            ],
            [
                'name' => 'Jesline Tania Indah Pardosi',
                'position' => 'VP of Business Development',
                'image' => 'experts/jesline.webp',
                'src' => 'img/homepage/about/Jesline_Tania_Indah_Pardosi_VP_Bussiness Development.webp',
                'skills' => ['Partnership', 'Market Analysis', 'Strategic Planning'],
                'is_active' => true,
            ],
        ];

        foreach ($experts as $expert) {
            if (! Storage::disk('public')->exists($expert['image']) && file_exists(public_path($expert['src']))) {
                Storage::disk('public')->put($expert['image'], file_get_contents(public_path($expert['src'])));
            }

            Expert::updateOrCreate(
                ['name' => $expert['name']],
                [
                    'name' => $expert['name'],
                    'position' => $expert['position'],
                    'image' => $expert['image'],
                    'skills' => $expert['skills'],
                    'is_active' => $expert['is_active'],
                ]
            );
        }
    }
}
