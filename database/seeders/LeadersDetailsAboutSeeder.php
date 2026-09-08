<?php

namespace Database\Seeders;

use App\Models\LeadersDetailsAbout;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LeadersDetailsAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaders = [
            [
                'leaders_details_name' => 'Lutfia Rahmannisa',
                'leaders_details_position' => 'CEO',
                'leaders_details_position_division' => null,
                'leaders_details_img' => 'leaders/ceo.webp',
                'src' => 'img/homepage/Lutfia Rahmannisa_CEO.webp',
                'leaders_details_linkedin' => 'https://www.linkedin.com',
                'leaders_details_email' => 'lutfia@houseilmu.id',
            ],
            [
                'leaders_details_name' => 'Faiza Kurniawati',
                'leaders_details_position' => 'VP',
                'leaders_details_position_division' => 'Technology',
                'leaders_details_img' => 'leaders/faiza.webp',
                'src' => 'img/homepage/about/Faiza Kurniawati_VP Technology.webp',
                'leaders_details_linkedin' => 'https://www.linkedin.com',
                'leaders_details_email' => 'faiza@houseilmu.id',
            ],
            [
                'leaders_details_name' => 'Alfianti Yanuar Mega',
                'leaders_details_position' => 'VP',
                'leaders_details_position_division' => 'Product Development',
                'leaders_details_img' => 'leaders/alfianti.webp',
                'src' => 'img/homepage/about/Alfianti Yanuar Mega_VP Prodev.webp',
                'leaders_details_linkedin' => 'https://www.linkedin.com',
                'leaders_details_email' => 'alfianti@houseilmu.id',
            ],
            [
                'leaders_details_name' => 'Dwi Puji Lestari',
                'leaders_details_position' => 'VP',
                'leaders_details_position_division' => 'Marketing',
                'leaders_details_img' => 'leaders/dwi.webp',
                'src' => 'img/homepage/about/DWI_PUJI_LESTARI- VP Marketing.webp',
                'leaders_details_linkedin' => 'https://www.linkedin.com',
                'leaders_details_email' => 'dwi@houseilmu.id',
            ],
            [
                'leaders_details_name' => 'Jesline Tania Indah Pardosi',
                'leaders_details_position' => 'VP',
                'leaders_details_position_division' => 'Business Development',
                'leaders_details_img' => 'leaders/jesline.webp',
                'src' => 'img/homepage/about/Jesline_Tania_Indah_Pardosi_VP_Bussiness Development.webp',
                'leaders_details_linkedin' => 'https://www.linkedin.com',
                'leaders_details_email' => 'jesline@houseilmu.id',
            ],
            [
                'leaders_details_name' => 'Naila Nariswari',
                'leaders_details_position' => 'VP',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_img' => 'leaders/naila.webp',
                'src' => 'img/homepage/about/Naila_Nariswari_HP_VP Human Capital.webp',
                'leaders_details_linkedin' => 'https://www.linkedin.com',
                'leaders_details_email' => 'naila@houseilmu.id',
            ],
        ];

        foreach ($leaders as $leader) {
            if (! Storage::disk('public')->exists($leader['leaders_details_img']) && file_exists(public_path($leader['src']))) {
                Storage::disk('public')->put($leader['leaders_details_img'], file_get_contents(public_path($leader['src'])));
            }

            LeadersDetailsAbout::updateOrCreate(
                ['leaders_details_name' => $leader['leaders_details_name']],
                [
                    'leaders_details_name' => $leader['leaders_details_name'],
                    'leaders_details_position' => $leader['leaders_details_position'],
                    'leaders_details_position_division' => $leader['leaders_details_position_division'],
                    'leaders_details_img' => $leader['leaders_details_img'],
                    'leaders_details_linkedin' => $leader['leaders_details_linkedin'],
                    'leaders_details_email' => $leader['leaders_details_email'],
                ]
            );
        }
    }
}
