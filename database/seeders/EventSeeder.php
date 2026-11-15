<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'BoM Talks: Generation Accelerate',
                'tagline' => 'Accelerate Your Career with Industry Leaders',
                'description' => '<p>BoM Talks merupakan webinar eksklusif persembahan House Ilmu Indonesia untuk mempersiapkan talenta muda memasuki dunia kerja profesional dengan strategi terarah dan mentorship langsung.</p>',
                'registration_link' => 'https://forms.gle/houseilmu',
                'images' => ['events/BoMTalks-GerAce.webp'],
                'src' => 'img/homepage/BoMTalks-GerAce.webp',
                'is_active' => true,
            ],
            [
                'title' => 'HITCC: Opportunities Fair',
                'tagline' => 'Temukan Peluang Magang, Beasiswa, & Kompetisi Terbaik',
                'description' => '<p>Jelajahi ratusan kesempatan magang, beasiswa, dan program exchange berskala nasional maupun internasional yang telah dikurasi oleh tim House Ilmu Indonesia.</p>',
                'registration_link' => 'https://forms.gle/hitcc-fair',
                'images' => ['events/poster-HITCC.webp'],
                'src' => 'img/homepage/poster-HITCC.webp',
                'is_active' => true,
            ],
        ];

        foreach ($events as $event) {
            foreach ($event['images'] as $img) {
                if (! Storage::disk('public')->exists($img) && file_exists(public_path($event['src']))) {
                    Storage::disk('public')->put($img, file_get_contents(public_path($event['src'])));
                }
            }

            Event::updateOrCreate(
                ['title' => $event['title']],
                [
                    'title' => $event['title'],
                    'tagline' => $event['tagline'],
                    'description' => $event['description'],
                    'registration_link' => $event['registration_link'],
                    'images' => $event['images'],
                    'is_active' => $event['is_active'],
                ]
            );
        }
    }
}
