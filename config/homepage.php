<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Our Impact Section Data
    |--------------------------------------------------------------------------
    */
    'impacts' => [
        [
            'tag' => 'PROGRAMS HELD',
            'value' => 'XX+',
            'label' => 'Programs Held',
        ],
        [
            'tag' => 'PARTICIPANTS REACHED',
            'value' => 'XX+',
            'label' => 'Participants Reached',
        ],
        [
            'tag' => 'AVAILABLE PROGRAMS',
            'value' => '6',
            'label' => 'Programs Available',
        ],
        [
            'tag' => 'PARTICIPANT REVIEWS',
            'value' => 'XX+',
            'label' => 'Participant Reviews',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Explore Our Programs Section Data
    |--------------------------------------------------------------------------
    */
    'online_programs' => [
        [
            'badge' => 'ONLINE',
            'category' => 'Webinar',
            'title' => 'A. Webskill',
            'subtitle' => null,
            'description' => 'Webinar interaktif bersama expert untuk mengenal berbagai career path dan skill yang relevan dengan dunia kerja.',
            'image' => 'img/homepage/programme/review-cv.webp',
            'route' => 'programme.programmes',
        ],
        [
            'badge' => 'ONLINE',
            'category' => 'Workshop',
            'title' => 'B. Workskill',
            'subtitle' => null,
            'description' => 'Workshop praktis untuk belajar skill secara hands-on dan menghasilkan karya yang dapat mendukung CV atau LinkedIn.',
            'image' => 'img/homepage/article/skill-development1.webp',
            'route' => 'programme.programmes',
        ],
        [
            'badge' => 'ONLINE',
            'category' => 'Opportunity',
            'title' => 'C. Opportunity Corners',
            'subtitle' => null,
            'description' => 'Sesi sharing tentang berbagai opportunity seperti internship, scholarship, dan program pengembangan untuk mahasiswa.',
            'image' => 'img/homepage/img-opp/semua.webp',
            'route' => 'programme.programmes',
        ],
    ],

    'offline_programs' => [
        [
            'badge' => 'OFFLINE',
            'category' => 'Career Prep',
            'title' => 'D. Sudut Karir',
            'subtitle' => null,
            'description' => 'Sesi offline yang membantu peserta mempersiapkan diri untuk apply job melalui coaching dan praktik bersama.',
            'image' => 'img/homepage/programme/sudut-karir2.webp',
            'route' => 'programme.programmes',
        ],
        [
            'badge' => 'OFFLINE',
            'category' => 'Open Talk',
            'title' => 'E. Chill-Ups',
            'subtitle' => 'Nge-Chill sambil Upgrade Career & Skills',
            'description' => 'Ngobrol santai bersama profesional dengan sistem open question untuk mendapatkan insight dan pengalaman nyata dari dunia kerja.',
            'image' => 'img/homepage/img-opp/internship.webp',
            'route' => 'programme.programmes',
        ],
        [
            'badge' => 'OFFLINE',
            'category' => 'Company Visit',
            'title' => 'F. #MainkeKantor',
            'subtitle' => null,
            'description' => 'Program company visit untuk melihat langsung budaya kerja, lingkungan, dan sistem kerja di dunia profesional.',
            'image' => 'img/homepage/img-opp/volunteer.webp',
            'route' => 'programme.programmes',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Partners Section Data
    |--------------------------------------------------------------------------
    */
    'partners' => [
        [
            'name' => 'Cakap',
            'logo' => 'img/homepage/logo-cakap.webp',
        ],
        [
            'name' => 'Indorelawan',
            'logo' => 'img/homepage/logo-indorelawan.webp',
        ],
        [
            'name' => 'Pemimpin.id',
            'logo' => 'img/homepage/logo-pemimpinid.webp',
        ],
        [
            'name' => 'Institut.id',
            'logo' => 'img/homepage/logo-institut-id.webp',
        ],
        [
            'name' => 'Phillip Sekuritas',
            'logo' => 'img/homepage/logo-phillip-sekuritas.webp',
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
            'question' => 'Apa itu house ilmu?',
            'answer' => 'House Ilmu adalah platform career development dengan impact sosial bagi generasi muda.',
        ],
        [
            'id' => 2,
            'question' => 'Apa saja layanan House Ilmu?',
            'answer' => 'Layanan bimbingan karir, review CV, dan sudut karir.',
        ],
        [
            'id' => 3,
            'question' => 'Bagaimana mendaftar program House Ilmu?',
            'answer' => 'Daftar lewat form website, nanti tim kami akan menghubungi ya!',
        ],
        [
            'id' => 4,
            'question' => 'Bagaimana menghubungi tim House Ilmu?',
            'answer' => 'Hubungi kami via email, telepon, atau form kontak di website ya!',
        ],
    ],
];
