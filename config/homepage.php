<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Hero Section Carousel Images
    |--------------------------------------------------------------------------
    */
    'hero_slides' => [
        [
            'title' => 'House Ilmu Mentoring & Graduation',
            'image' => 'img/homepage/banner-cindy2.webp',
        ],
        [
            'title' => 'Review CV & Career Coaching',
            'image' => 'img/homepage/programme/review-cv.webp',
        ],
        [
            'title' => 'Sudut Karir Hands-on Prep',
            'image' => 'img/homepage/programme/sudut-karir2.webp',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Upcoming Events Section Data
    |--------------------------------------------------------------------------
    */
    'upcoming_events' => [
        [
            'category' => 'Webskill',
            'status' => 'Akan datang',
            'title' => 'Webskill: Belajar dan Bertumbuh Bersama',
            'schedule_badge' => 'Segera diumumkan',
            'schedule_text' => 'Jadwal terbaru akan segera diumumkan.',
            'image' => 'img/homepage/BoMTalks-GerAce.webp',
            'link' => '/programme/HI-programmes',
        ],
        [
            'category' => 'Workskill',
            'status' => 'Akan datang',
            'title' => 'Workskill: Belajar dan Bertumbuh Bersama',
            'schedule_badge' => 'Segera diumumkan',
            'schedule_text' => 'Jadwal terbaru akan segera diumumkan.',
            'image' => 'img/homepage/poster-HITCC.webp',
            'link' => '/programme/HI-programmes',
        ],
        [
            'category' => 'Opportunity Corners',
            'status' => 'Akan datang',
            'title' => 'Opportunity Corners: Belajar dan Bertumbuh Bersama',
            'schedule_badge' => 'Segera diumumkan',
            'schedule_text' => 'Jadwal terbaru akan segera diumumkan.',
            'image' => 'img/homepage/programme/review-cv.webp',
            'link' => '/programme/HI-programmes',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Our Programme Section Data (6 Compact Cards)
    |--------------------------------------------------------------------------
    */
    'programs' => [
        [
            'title' => 'Webskill',
            'description' => 'Webinar interaktif bersama expert untuk mengenal berbagai career path dan skill relevan dengan dunia kerja.',
            'route' => 'programme.programmes',
        ],
        [
            'title' => 'Workskill',
            'description' => 'Workshop praktis untuk belajar skill secara hands-on dan menghasilkan karya portofolio.',
            'route' => 'programme.programmes',
        ],
        [
            'title' => 'Opportunity Corners',
            'description' => 'Sesi sharing mengenai berbagai opportunity untuk mahasiswa seperti internship, scholarship, dan program pengembangan lainnya.',
            'route' => 'programme.programmes',
        ],
        [
            'title' => 'Sudut Karir',
            'description' => 'Sesi offline yang menemani peserta mempersiapkan diri untuk apply job melalui coaching dan praktik bersama.',
            'route' => 'programme.programmes',
        ],
        [
            'title' => 'Chill-Ups',
            'description' => 'Sesi ngobrol santai bersama profesional dengan sistem open question.',
            'route' => 'programme.programmes',
        ],
        [
            'title' => '#MainkeKantor',
            'description' => 'Program company visit untuk melihat langsung budaya kerja, lingkungan kerja, dan sistem kerja di dunia profesional.',
            'route' => 'programme.programmes',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Our Impact Section Data
    |--------------------------------------------------------------------------
    */
    'impacts' => [
        [
            'tag' => 'PROGRAM',
            'value' => '65+',
            'label' => 'Program',
        ],
        [
            'tag' => 'BATCH',
            'value' => '6',
            'label' => 'Batch',
        ],
        [
            'tag' => 'KOLABORASI',
            'value' => '9+',
            'label' => 'Kolaborasi',
        ],
        [
            'tag' => 'RELAWAN',
            'value' => '126+',
            'label' => 'Relawan',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Our Partner & Collaborator Section Data
    |--------------------------------------------------------------------------
    */
    'partners' => [
        [
            'name' => 'Girls Beyond',
            'logo' => null,
            'type' => 'text_badge',
            'badge_title' => 'GIRLS',
            'badge_sub' => 'BEYOND',
        ],
        [
            'name' => 'IDEAL',
            'logo' => null,
            'type' => 'text_badge',
            'badge_title' => 'ideal',
            'badge_sub' => null,
        ],
        [
            'name' => 'Pemimpin.id',
            'logo' => 'img/homepage/logo-pemimpinid.webp',
            'type' => 'brand_card',
            'badge_title' => 'pemimpin.id',
            'badge_sub' => null,
        ],
        [
            'name' => 'Phillip Sekuritas Indonesia',
            'logo' => 'img/homepage/logo-phillip-sekuritas.webp',
            'type' => 'logo_card',
            'badge_title' => null,
            'badge_sub' => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | What They Say About HI (Testimonials) Data
    |--------------------------------------------------------------------------
    */
    'testimonials' => [
        [
            'quote' => 'Serunya di House Ilmu keren banget. Aku jadi punya insight dan wawasan baru. Bagian yang aku paling suka adalah mentoring. Jangan lupa daftar acara selanjutnya ya!',
            'name' => 'Oktavia',
            'role' => 'Peserta Risyk',
            'initial' => 'O',
        ],
        [
            'quote' => 'Merasa impactful banget karena diajarin bagaimana bangun team building, management dan mindset kepemimpinan.',
            'name' => 'Melinda',
            'role' => 'Peserta Risyk',
            'initial' => 'M',
        ],
        [
            'quote' => 'House Ilmu bukan cuma tempat untuk belajar, tapi juga tempat untuk bertemu orang-orang hebat, menemukan kesempatan baru, dan terus berkembang bersama.',
            'name' => 'Aiko',
            'role' => 'Peserta/Relawan HI',
            'initial' => 'A',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Frequently Asked Questions Data
    |--------------------------------------------------------------------------
    */
    'faqs' => [
        [
            'id' => 1,
            'question' => 'Apa itu House Ilmu Indonesia?',
            'answer' => 'House Ilmu Indonesia adalah ruang belajar dan pengembangan karier bagi generasi muda Indonesia.',
        ],
        [
            'id' => 2,
            'question' => 'Siapa yang bisa mengikuti program HI?',
            'answer' => 'Pelajar, mahasiswa, lulusan baru, dan generasi muda yang ingin belajar serta berkembang dapat mengikuti program HI.',
        ],
        [
            'id' => 3,
            'question' => 'Apa saja kegiatan yang dilakukan House Ilmu?',
            'answer' => 'HI menghadirkan webinar, workshop, sesi karier, berbagi peluang, dan kunjungan ke lingkungan profesional.',
        ],
        [
            'id' => 4,
            'question' => 'Bagaimana cara mengikuti program HI?',
            'answer' => 'Pilih program yang sesuai, lalu ikuti petunjuk pendaftaran pada halaman detail program.',
        ],
        [
            'id' => 5,
            'question' => 'Bagaimana cara menjadi relawan HI?',
            'answer' => 'Pantau halaman Career dan kanal resmi HI untuk informasi pembukaan relawan.',
        ],
        [
            'id' => 6,
            'question' => 'Apakah program HI berbayar?',
            'answer' => 'Sebagian besar program gratis. Informasi biaya, jika ada, selalu dicantumkan pada detail kegiatan.',
        ],
        [
            'id' => 7,
            'question' => 'Bagaimana cara berkolaborasi dengan HI?',
            'answer' => 'Pilih bentuk kolaborasi pada halaman Community Collaboration dan hubungi tim HI melalui kanal yang tersedia.',
        ],
    ],
];
