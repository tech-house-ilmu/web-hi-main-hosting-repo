<?php

namespace App\Repositories;

class HIProgrammeRepository
{
    /**
     * Get carousel hero program items.
     */
    public static function getHeroItems(): array
    {
        return [
            [
                'id' => 'chill-ups',
                'title' => 'Chill-Ups',
                'type' => 'Program Luring',
                'badge' => 'Chill-Ups',
                'image' => 'img/programmes/poster-chill-ups.webp',
                'desc' => 'Sesi ngobrol santai bersama profesional dengan sistem open question.',
            ],
            [
                'id' => 'webskill',
                'title' => 'Webskill',
                'type' => 'Program Daring',
                'badge' => 'Webskill',
                'image' => 'img/programmes/poster-webskill.webp',
                'desc' => 'Webinar interaktif bersama expert untuk mengenal berbagai career path dan skill relevan dengan dunia kerja.',
            ],
            [
                'id' => 'workskill',
                'title' => 'Workskill',
                'type' => 'Program Daring',
                'badge' => 'Workskill',
                'image' => 'img/programmes/poster-workskill.webp',
                'desc' => 'Workshop praktis untuk belajar skill secara hands-on dan menghasilkan karya portofolio.',
            ],
            [
                'id' => 'opportunity-corners',
                'title' => 'Opportunity Corners',
                'type' => 'Program Daring',
                'badge' => 'Opportunity Corners',
                'image' => 'img/programmes/poster-opportunity.webp',
                'desc' => 'Sesi sharing mengenai berbagai opportunity untuk mahasiswa seperti internship, scholarship, dan program pengembangan lainnya.',
            ],
            [
                'id' => 'sudut-karir',
                'title' => 'Sudut Karir',
                'type' => 'Program Luring',
                'badge' => 'Sudut Karir',
                'image' => 'img/programmes/poster-sudut-karir.webp',
                'desc' => 'Sesi offline yang menemani peserta mempersiapkan diri untuk apply job melalui coaching dan praktik bersama.',
            ],
            [
                'id' => 'main-ke-kantor',
                'title' => '#MainkeKantor',
                'type' => 'Program Luring',
                'badge' => '#MainkeKantor',
                'image' => 'img/programmes/poster-main-ke-kantor.webp',
                'desc' => 'Program company visit untuk melihat langsung budaya kerja, lingkungan kerja, dan sistem kerja di dunia profesional.',
            ],
        ];
    }

    /**
     * Get online category programmes for explore section.
     */
    public static function getOnlineProgrammes(): array
    {
        return [
            [
                'target' => 'event-webskill',
                'title' => 'Webskill',
                'desc' => 'Webinar interaktif bersama expert untuk mengenal berbagai career path dan skill relevan dengan dunia kerja.',
            ],
            [
                'target' => 'event-workskill',
                'title' => 'Workskill',
                'desc' => 'Workshop praktis untuk belajar skill secara hands-on dan menghasilkan karya portofolio.',
            ],
            [
                'target' => 'event-opportunity',
                'title' => 'Opportunity Corners',
                'desc' => 'Sesi sharing mengenai berbagai opportunity untuk mahasiswa seperti internship, scholarship, dan program pengembangan lainnya.',
            ],
        ];
    }

    /**
     * Get offline category programmes for explore section.
     */
    public static function getOfflineProgrammes(): array
    {
        return [
            [
                'target' => 'event-sudutkarir',
                'title' => 'Sudut Karir',
                'desc' => 'Sesi offline yang menemani peserta mempersiapkan diri untuk apply job melalui coaching dan praktik bersama.',
            ],
            [
                'target' => 'event-chillups',
                'title' => 'Chill-Ups',
                'desc' => 'Sesi ngobrol santai bersama profesional dengan sistem open question.',
            ],
            [
                'target' => 'event-mainkekantor',
                'title' => '#MainkeKantor',
                'desc' => 'Program company visit untuk melihat langsung budaya kerja, lingkungan kerja, dan sistem kerja di dunia profesional.',
            ],
        ];
    }

    /**
     * Get upcoming events list.
     */
    public static function getUpcomingEvents(): array
    {
        return [
            [
                'id' => 'event-webskill',
                'slug' => 'webskill',
                'badge' => 'Webskill',
                'title' => 'Webskill: Belajar dan Bertumbuh Bersama',
                'status' => 'Segera diumumkan',
                'status_note' => 'Jadwal terbaru akan segera diumumkan.',
                'image' => 'img/programmes/poster-webskill.webp',
                'desc' => 'Webinar interaktif bersama expert untuk mengenal berbagai career path dan skill relevan dengan dunia kerja.',
            ],
            [
                'id' => 'event-workskill',
                'slug' => 'workskill',
                'badge' => 'Workskill',
                'title' => 'Workskill: Belajar dan Bertumbuh Bersama',
                'status' => 'Segera diumumkan',
                'status_note' => 'Jadwal terbaru akan segera diumumkan.',
                'image' => 'img/programmes/poster-workskill.webp',
                'desc' => 'Workshop praktis untuk belajar skill secara hands-on dan menghasilkan karya portofolio.',
            ],
            [
                'id' => 'event-opportunity',
                'slug' => 'opportunity-corners',
                'badge' => 'Opportunity Corners',
                'title' => 'Opportunity Corners: Belajar dan Bertumbuh Bersama',
                'status' => 'Segera diumumkan',
                'status_note' => 'Jadwal terbaru akan segera diumumkan.',
                'image' => 'img/programmes/poster-opportunity.webp',
                'desc' => 'Sesi sharing mengenai berbagai opportunity untuk mahasiswa seperti internship, scholarship, dan program pengembangan lainnya.',
            ],
            [
                'id' => 'event-sudutkarir',
                'slug' => 'sudut-karir',
                'badge' => 'Sudut Karir',
                'title' => 'Sudut Karir: Belajar dan Bertumbuh Bersama',
                'status' => 'Segera diumumkan',
                'status_note' => 'Jadwal terbaru akan segera diumumkan.',
                'image' => 'img/programmes/poster-sudut-karir.webp',
                'desc' => 'Sesi offline yang menemani peserta mempersiapkan diri untuk apply job melalui coaching dan praktik bersama.',
            ],
            [
                'id' => 'event-chillups',
                'slug' => 'chill-ups',
                'badge' => 'Chill-Ups',
                'title' => 'Chill-Ups: Belajar dan Bertumbuh Bersama',
                'status' => 'Segera diumumkan',
                'status_note' => 'Jadwal terbaru akan segera diumumkan.',
                'image' => 'img/programmes/poster-chill-ups.webp',
                'desc' => 'Sesi ngobrol santai bersama profesional dengan sistem open question.',
            ],
            [
                'id' => 'event-mainkekantor',
                'slug' => 'main-ke-kantor',
                'badge' => '#MainkeKantor',
                'title' => '#MainkeKantor: Belajar dan Bertumbuh Bersama',
                'status' => 'Segera diumumkan',
                'status_note' => 'Jadwal terbaru akan segera diumumkan.',
                'image' => 'img/programmes/poster-main-ke-kantor.webp',
                'desc' => 'Program company visit untuk melihat langsung budaya kerja, lingkungan kerja, dan sistem kerja di dunia profesional.',
            ],
        ];
    }
}
