@extends('layout.app')

@section('title', 'HI Programmes | House Ilmu Indonesia')
@section('meta_description', 'Temukan program yang bisa membantumu belajar, berkembang, dan mempersiapkan langkah karirmu bersama House Ilmu Indonesia.')
@section('hide_comments', true)

@section('head')
<!-- Google Fonts: Editorial Serif and Clean Display -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    .font-editorial {
        font-family: 'Playfair Display', Georgia, serif;
    }
    .font-sans-clean {
        font-family: 'Plus Jakarta Sans', var(--font-sans), sans-serif;
    }

    /* Carousel 3D perspective & smooth slide */
    .hero-carousel-container {
        perspective: 1200px;
    }

    .carousel-slide-item {
        transition: transform 0.45s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.45s cubic-bezier(0.25, 1, 0.5, 1);
        will-change: transform, opacity;
    }

    .carousel-slide-item.active {
        transform: translateX(0) scale(1);
        opacity: 1;
        z-index: 20;
        pointer-events: auto;
    }

    .carousel-slide-item.prev {
        transform: translateX(-70%) scale(0.88);
        opacity: 0.45;
        z-index: 10;
        pointer-events: auto;
    }

    .carousel-slide-item.next {
        transform: translateX(70%) scale(0.88);
        opacity: 0.45;
        z-index: 10;
        pointer-events: auto;
    }

    .carousel-slide-item.hidden-slide {
        transform: translateX(0) scale(0.7);
        opacity: 0;
        z-index: 1;
        pointer-events: none;
    }

    /* Card pulse on anchor jump */
    @keyframes cardPulse {
        0%, 100% { box-shadow: 0 4px 20px rgba(0,0,0,0.03); }
        50% { box-shadow: 0 0 0 3px rgba(245, 130, 31, 0.5), 0 8px 30px rgba(245, 130, 31, 0.2); }
    }

    .card-highlight {
        animation: cardPulse 1.8s ease-in-out;
    }
</style>
@endsection

@section('content')
@php
    $heroItems = [
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
            'id' => 'chill-ups',
            'title' => 'Chill-Ups',
            'type' => 'Program Luring',
            'badge' => 'Chill-Ups',
            'image' => 'img/programmes/poster-chill-ups.webp',
            'desc' => 'Sesi ngobrol santai bersama profesional dengan sistem open question.',
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

    $onlinePrograms = [
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

    $offlinePrograms = [
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

    $upcomingEvents = [
        [
            'id' => 'event-webskill',
            'slug' => 'webskill',
            'badge' => 'Webskill',
            'title' => 'Webskill: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'image' => 'img/programmes/poster-webskill.webp',
            'desc' => 'Webinar interaktif bersama para praktisi dan mentor industri untuk membekali kamu dengan skill praktis dan wawasan karir terkini.',
        ],
        [
            'id' => 'event-workskill',
            'slug' => 'workskill',
            'badge' => 'Workskill',
            'title' => 'Workskill: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'image' => 'img/programmes/poster-workskill.webp',
            'desc' => 'Workshop hands-on intensif yang berfokus pada pengerjaan real project untuk portofolio siap kerja serta persiapan seleksi beasiswa.',
        ],
        [
            'id' => 'event-opportunity',
            'slug' => 'opportunity-corners',
            'badge' => 'Opportunity Corners',
            'title' => 'Opportunity Corners: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'image' => 'img/programmes/poster-opportunity.webp',
            'desc' => 'Wadah eksklusif untuk mendapatkan tips lolos magang bergengsi, program exchange, beasiswa, dan panduan meniti karir impian.',
        ],
        [
            'id' => 'event-sudutkarir',
            'slug' => 'sudut-karir',
            'badge' => 'Sudut Karir',
            'title' => 'Sudut Karir: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'image' => 'img/programmes/poster-sudut-karir.webp',
            'desc' => 'Sesi coaching karir offline dengan simulasi interview, personal branding makeover, serta review CV langsung bersama HR profesional.',
        ],
        [
            'id' => 'event-chillups',
            'slug' => 'chill-ups',
            'badge' => 'Chill-Ups',
            'title' => 'Chill-Ups: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'image' => 'img/programmes/poster-chill-ups.webp',
            'desc' => 'Meetup santai di ruang terbuka dengan konsep diskusi terbuka, networking kawaners HI, dan sharing pengalaman dunia kerja nyata.',
        ],
        [
            'id' => 'event-mainkekantor',
            'slug' => 'main-ke-kantor',
            'badge' => '#MainkeKantor',
            'title' => '#MainkeKantor: Belajar dan Bertumbuh Bersama',
            'status' => 'Segera diumumkan',
            'status_note' => 'Jadwal terbaru akan segera diumumkan.',
            'image' => 'img/programmes/poster-main-ke-kantor.webp',
            'desc' => 'Company visit eksklusif ke kantor-kantor perusahaan terkemuka untuk merasakan atmosfer kerja, budaya organisasi, dan berjejaring langsung.',
        ],
    ];
@endphp

<!-- =========================================================================
     HERO SECTION
     ========================================================================= -->
<section class="bg-[#1856C9] text-white pt-14 sm:pt-20 pb-16 sm:pb-20 px-4 sm:px-6 lg:px-12 relative overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center">
        
        <!-- Left Column: Headline & CTA -->
        <div class="lg:col-span-6 flex flex-col items-start z-10">
            <span class="text-xs sm:text-[13px] font-semibold tracking-widest uppercase text-white/90 mb-3 sm:mb-4 inline-block font-sans-clean">
                HI PROGRAM
            </span>
            
            <h1 class="font-editorial text-4xl sm:text-5xl md:text-6xl lg:text-[64px] font-bold text-white leading-[1.12] tracking-tight mb-4 sm:mb-5">
                Learn, Grow,<br>
                and Get<br>
                Achievement<br>
                Together
            </h1>

            <p class="text-white/85 text-xs sm:text-sm md:text-base font-normal max-w-lg mb-7 sm:mb-8 leading-relaxed font-sans-clean">
                Temukan program yang bisa membantumu belajar, berkembang, dan mempersiapkan langkah berikutnya.
            </p>

            <a 
                href="#explore-programmes" 
                class="inline-flex items-center gap-2.5 px-6 sm:px-7 py-3 rounded-xl bg-[#FF731D] hover:bg-[#E8620D] text-white text-xs sm:text-sm font-bold tracking-wide transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer transform hover:-translate-y-0.5"
            >
                <span>Jelajahi Semua Program</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Right Column: Interactive 3D Card Carousel -->
        <div class="lg:col-span-6 flex flex-col items-center justify-center relative w-full pt-4 lg:pt-0">
            
            <!-- Cards Stage Container -->
            <div class="relative w-full max-w-[500px] h-[340px] sm:h-[400px] flex items-center justify-center hero-carousel-container select-none">
                
                @foreach($heroItems as $index => $item)
                    <div 
                        class="carousel-slide-item absolute w-[190px] sm:w-[230px] md:w-[250px] aspect-[3/4] rounded-2xl overflow-hidden shadow-2xl cursor-pointer bg-white"
                        data-index="{{ $index }}"
                        data-title="{{ $item['title'] }}"
                        data-type="{{ $item['type'] }}"
                    >
                        <img 
                            src="{{ asset($item['image']) }}" 
                            alt="{{ $item['title'] }}"
                            class="w-full h-full object-cover object-top"
                            loading="eager"
                        >

                        <!-- Subtle dark gradient on bottom for depth -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-transparent pointer-events-none"></div>
                    </div>
                @endforeach

                <!-- Prev Button (Left Chevron) -->
                <button 
                    id="carousel-prev-btn"
                    type="button"
                    class="absolute left-2 sm:left-6 z-30 w-8 h-8 rounded-lg bg-black/50 hover:bg-black/75 text-white flex items-center justify-center transition cursor-pointer backdrop-blur-xs border border-white/20 shadow-md"
                    aria-label="Previous Program"
                >
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </button>

                <!-- Next Button (Right Chevron) -->
                <button 
                    id="carousel-next-btn"
                    type="button"
                    class="absolute right-2 sm:right-6 z-30 w-8 h-8 rounded-lg bg-black/50 hover:bg-black/75 text-white flex items-center justify-center transition cursor-pointer backdrop-blur-xs border border-white/20 shadow-md"
                    aria-label="Next Program"
                >
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </div>

            <!-- Carousel Status & Indicators Bar -->
            <div class="w-full max-w-[360px] sm:max-w-[400px] px-2 sm:px-4 mt-2">
                <div class="flex items-center justify-between text-white mb-2 font-sans-clean">
                    <div>
                        <h4 id="carousel-active-title" class="font-bold text-base sm:text-lg text-white leading-tight">
                            Workskill
                        </h4>
                        <p id="carousel-active-type" class="text-xs text-white/75 font-normal">
                            Program Daring
                        </p>
                    </div>
                    <div>
                        <span id="carousel-active-counter" class="text-xs font-semibold tracking-wider text-white/80">
                            03 / 06
                        </span>
                    </div>
                </div>

                <!-- 6 Dash Progress Indicators -->
                <div class="flex items-center gap-1.5" id="carousel-dots-container">
                    @for($i = 0; $i < count($heroItems); $i++)
                        <button 
                            type="button" 
                            class="carousel-dot h-1.5 rounded-full transition-all duration-300 cursor-pointer {{ $i === 2 ? 'w-6 bg-[#FF731D]' : 'w-3 bg-white/40 hover:bg-white/70' }}" 
                            data-dot-index="{{ $i }}"
                            aria-label="Go to slide {{ $i + 1 }}"
                        ></button>
                    @endfor
                </div>
            </div>

        </div>

    </div>
</section>

<!-- =========================================================================
     EXPLORE OUR PROGRAMMES SECTION
     ========================================================================= -->
<section id="explore-programmes" class="bg-[#FFF9EF] pt-14 sm:pt-16 pb-12 sm:pb-16 px-4 sm:px-6 lg:px-8 border-b border-black/5">
    <div class="max-w-5xl mx-auto">
        
        <!-- Section Title & Subtitle -->
        <div class="text-center mb-10 sm:mb-12">
            <h2 class="font-editorial text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#FF731D] tracking-wide uppercase">
                EXPLORE OUR PROGRAMMES
            </h2>
            <div class="w-12 h-1 bg-[#FF731D] mx-auto mt-2.5 mb-3 rounded-full"></div>
            <p class="text-xs sm:text-sm text-gray-600 font-normal max-w-2xl mx-auto font-sans-clean">
                Temukan program untuk belajar, terhubung, dan bertumbuh bersama.
            </p>
        </div>

        <!-- 1. ONLINE PROGRAMMES -->
        <div class="mb-10 sm:mb-12">
            <h3 class="font-editorial text-sm sm:text-base font-extrabold text-[#152A5E] tracking-wider uppercase mb-4">
                ONLINE PROGRAMMES
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach($onlinePrograms as $prog)
                    <div class="bg-white rounded-[20px] p-6 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 flex flex-col justify-between hover:shadow-md hover:-translate-y-1 transition duration-300 min-h-[170px]">
                        <div>
                            <h4 class="font-editorial font-bold text-lg sm:text-xl text-[#152A5E] mb-2">
                                {{ $prog['title'] }}
                            </h4>
                            <p class="text-xs sm:text-[13px] text-gray-500 leading-relaxed font-sans-clean">
                                {{ $prog['desc'] }}
                            </p>
                        </div>
                        <div class="mt-5">
                            <a 
                                href="#{{ $prog['target'] }}" 
                                class="explore-program-link inline-flex items-center gap-1.5 text-xs font-bold text-[#FF731D] hover:text-[#E8620D] transition-colors group cursor-pointer"
                                data-target="{{ $prog['target'] }}"
                            >
                                <span>Selengkapnya</span>
                                <span class="transform transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5">↗</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 2. OFFLINE PROGRAMMES -->
        <div>
            <h3 class="font-editorial text-sm sm:text-base font-extrabold text-[#152A5E] tracking-wider uppercase mb-4">
                OFFLINE PROGRAMMES
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach($offlinePrograms as $prog)
                    <div class="bg-white rounded-[20px] p-6 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 flex flex-col justify-between hover:shadow-md hover:-translate-y-1 transition duration-300 min-h-[170px]">
                        <div>
                            <h4 class="font-editorial font-bold text-lg sm:text-xl text-[#152A5E] mb-2">
                                {{ $prog['title'] }}
                            </h4>
                            <p class="text-xs sm:text-[13px] text-gray-500 leading-relaxed font-sans-clean">
                                {{ $prog['desc'] }}
                            </p>
                        </div>
                        <div class="mt-5">
                            <a 
                                href="#{{ $prog['target'] }}" 
                                class="explore-program-link inline-flex items-center gap-1.5 text-xs font-bold text-[#FF731D] hover:text-[#E8620D] transition-colors group cursor-pointer"
                                data-target="{{ $prog['target'] }}"
                            >
                                <span>Selengkapnya</span>
                                <span class="transform transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5">↗</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<!-- =========================================================================
     UPCOMING EVENT SECTION
     ========================================================================= -->
<section id="upcoming-events" class="bg-[#FFF9EF] pt-12 sm:pt-16 pb-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-[820px] mx-auto">
        
        <!-- Section Header -->
        <div class="text-center mb-8 sm:mb-10">
            <h2 class="font-editorial text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#FF731D] tracking-wide uppercase">
                UPCOMING EVENT
            </h2>
            <div class="w-12 h-1 bg-[#FF731D] mx-auto mt-2.5 mb-3 rounded-full"></div>
            <p class="text-xs sm:text-sm text-gray-600 font-normal max-w-2xl mx-auto font-sans-clean">
                Pantau agenda belajar dan ruang kolaborasi terbaru dari House Ilmu Indonesia.
            </p>
        </div>

        <!-- Events List -->
        <div class="space-y-4 sm:space-y-5">
            @foreach($upcomingEvents as $event)
                <div 
                    id="{{ $event['id'] }}" 
                    class="event-card bg-white rounded-[20px] p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 flex flex-col sm:flex-row items-center sm:items-stretch gap-4 sm:gap-6 hover:shadow-md transition duration-300 scroll-mt-24"
                >
                    <!-- Left: Poster Image -->
                    <div class="w-full sm:w-[175px] aspect-[4/5] sm:aspect-[175/222] shrink-0 rounded-xl overflow-hidden bg-gray-50 border border-gray-100 flex items-center justify-center">
                        <img 
                            src="{{ asset($event['image']) }}" 
                            alt="{{ $event['title'] }}" 
                            class="w-full h-full object-cover object-top hover:scale-105 transition duration-500" 
                            loading="lazy" 
                            decoding="async"
                        >
                    </div>

                    <!-- Right: Info Details -->
                    <div class="flex-1 flex flex-col justify-between py-1 w-full text-left font-sans-clean">
                        <div>
                            <!-- Header Row: Category Pill & Status Tag -->
                            <div class="flex items-center justify-between gap-2 mb-2">
                                <span class="px-3 py-0.5 rounded-full text-[11px] font-semibold text-[#1856C9] bg-[#EBF3FF] inline-block tracking-wide">
                                    {{ $event['badge'] }}
                                </span>
                                <span class="text-xs font-semibold text-[#FF731D]">
                                    Akan datang
                                </span>
                            </div>

                            <!-- Title -->
                            <h3 class="font-editorial text-lg sm:text-xl font-bold text-[#152A5E] leading-snug mb-2">
                                {{ $event['title'] }}
                            </h3>

                            <!-- Schedule & Announcement Note -->
                            <div class="space-y-0.5 mb-3 font-sans-clean">
                                <p class="text-xs sm:text-sm font-bold text-[#FF731D]">
                                    {{ $event['status'] }}
                                </p>
                                <p class="text-xs text-gray-500 font-normal">
                                    {{ $event['status_note'] }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Link -->
                        <div class="pt-2">
                            <a 
                                href="{{ route('programme.programmes.detail', ['slug' => $event['slug']]) }}" 
                                class="text-xs sm:text-sm font-semibold text-[#FF731D] hover:text-[#E8620D] inline-flex items-center gap-1.5 transition-colors cursor-pointer group"
                            >
                                <span>Lihat Detail</span>
                                <span class="transform transition-transform group-hover:translate-x-1">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Controls -->
        <div class="flex items-center justify-center gap-2 mt-8 sm:mt-10">
            <button 
                type="button" 
                class="w-7 h-7 rounded-md border border-gray-200 bg-white text-gray-400 flex items-center justify-center text-xs cursor-default"
                disabled
                aria-label="Previous Page"
            >
                <i class="fa-solid fa-chevron-left text-[10px]"></i>
            </button>
            <button 
                type="button" 
                class="w-7 h-7 rounded-md bg-[#0A192F] text-white font-bold flex items-center justify-center text-xs shadow-xs"
                aria-label="Page 1"
            >
                1
            </button>
            <button 
                type="button" 
                class="w-7 h-7 rounded-md border border-gray-200 bg-white text-gray-400 flex items-center justify-center text-xs cursor-default"
                disabled
                aria-label="Next Page"
            >
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
            </button>
        </div>

        <!-- History Action Button -->
        <div class="text-center mt-6">
            <a 
                href="https://www.instagram.com/houseilmu.id" 
                target="_blank" 
                rel="noopener noreferrer"
                class="inline-block px-8 py-3 rounded-xl bg-[#FF731D] hover:bg-[#E8620D] text-white text-xs sm:text-sm font-bold tracking-wide transition duration-200 shadow-md hover:shadow-lg cursor-pointer transform hover:-translate-y-0.5"
            >
                Lihat Riwayat Kegiatan
            </a>
        </div>

    </div>
</section>

<!-- =========================================================================
     MODAL DETAIL EVENT (Interactive Modal)
     ========================================================================= -->
<div 
    id="event-detail-modal" 
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs opacity-0 pointer-events-none transition-opacity duration-300"
    role="dialog"
    aria-modal="true"
>
    <div 
        id="modal-card" 
        class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-7 shadow-2xl transform scale-95 transition-transform duration-300 relative max-h-[90vh] overflow-y-auto"
    >
        <!-- Close Button -->
        <button 
            id="close-modal-btn" 
            type="button" 
            class="absolute top-4 right-4 w-9 h-9 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 flex items-center justify-center text-sm transition cursor-pointer"
            aria-label="Tutup Modal"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="flex flex-col sm:flex-row gap-5 items-start mt-2">
            <div class="w-full sm:w-[150px] aspect-[3/4] rounded-xl overflow-hidden bg-gray-100 shrink-0 border border-gray-100 shadow-sm">
                <img id="modal-img" src="" alt="Poster Event" class="w-full h-full object-cover object-top">
            </div>

            <div class="flex-1 font-sans-clean">
                <span id="modal-badge" class="px-3 py-1 rounded-full text-[11px] font-semibold text-[#1856C9] bg-[#EBF3FF] inline-block mb-2">
                    Badge
                </span>
                <h3 id="modal-title" class="font-editorial text-lg sm:text-xl font-bold text-[#152A5E] leading-snug mb-2">
                    Title
                </h3>
                <div class="mb-3">
                    <span id="modal-status" class="text-xs font-bold text-[#FF731D] block">
                        Segera diumumkan
                    </span>
                    <span class="text-xs text-gray-400">Jadwal resmi akan diinfokan di Instagram</span>
                </div>
                <p id="modal-desc" class="text-xs text-gray-600 leading-relaxed font-sans-clean">
                    Description
                </p>
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-end gap-3 font-sans-clean">
            <button 
                id="modal-cancel-btn"
                type="button"
                class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 text-xs font-semibold transition cursor-pointer"
            >
                Tutup
            </button>
            <a 
                href="https://www.instagram.com/houseilmu.id" 
                target="_blank" 
                rel="noopener noreferrer"
                class="px-5 py-2.5 rounded-xl bg-[#FF731D] hover:bg-[#E8620D] text-white text-xs font-bold transition shadow-sm inline-flex items-center gap-1.5 cursor-pointer"
            >
                <i class="fa-brands fa-instagram"></i>
                <span>Follow IG House Ilmu</span>
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ==========================================
    // 1. HERO 3D CARD CAROUSEL LOGIC
    // ==========================================
    const slides = Array.from(document.querySelectorAll('.carousel-slide-item'));
    const prevBtn = document.getElementById('carousel-prev-btn');
    const nextBtn = document.getElementById('carousel-next-btn');
    const titleEl = document.getElementById('carousel-active-title');
    const typeEl = document.getElementById('carousel-active-type');
    const counterEl = document.getElementById('carousel-active-counter');
    const dots = Array.from(document.querySelectorAll('.carousel-dot'));

    // Start on slide index 2 (Opportunity Corners / Workskill matching screenshot 03 / 06)
    let currentIndex = 2;
    const totalSlides = slides.length;
    let autoplayTimer = null;

    function updateCarousel() {
        slides.forEach((slide, idx) => {
            slide.classList.remove('active', 'prev', 'next', 'hidden-slide');

            if (idx === currentIndex) {
                slide.classList.add('active');
            } else if (idx === (currentIndex - 1 + totalSlides) % totalSlides) {
                slide.classList.add('prev');
            } else if (idx === (currentIndex + 1) % totalSlides) {
                slide.classList.add('next');
            } else {
                slide.classList.add('hidden-slide');
            }
        });

        // Update info panel
        const activeSlide = slides[currentIndex];
        if (activeSlide) {
            const title = activeSlide.dataset.title || '';
            const type = activeSlide.dataset.type || '';
            if (titleEl) titleEl.textContent = title;
            if (typeEl) typeEl.textContent = type;
            if (counterEl) {
                const formattedNum = String(currentIndex + 1).padStart(2, '0');
                const formattedTotal = String(totalSlides).padStart(2, '0');
                counterEl.textContent = `${formattedNum} / ${formattedTotal}`;
            }
        }

        // Update dot bars
        dots.forEach((dot, idx) => {
            if (idx === currentIndex) {
                dot.className = 'carousel-dot h-1.5 rounded-full transition-all duration-300 cursor-pointer w-6 bg-[#FF731D]';
            } else {
                dot.className = 'carousel-dot h-1.5 rounded-full transition-all duration-300 cursor-pointer w-3 bg-white/40 hover:bg-white/70';
            }
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }

    function goToSlide(idx) {
        currentIndex = idx;
        updateCarousel();
    }

    if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); restartAutoplay(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); restartAutoplay(); });

    dots.forEach(dot => {
        dot.addEventListener('click', function () {
            const idx = parseInt(this.dataset.dotIndex, 10);
            if (!isNaN(idx)) {
                goToSlide(idx);
                restartAutoplay();
            }
        });
    });

    // Clicking prev/next visible card in carousel
    slides.forEach(slide => {
        slide.addEventListener('click', function () {
            const idx = parseInt(this.dataset.index, 10);
            if (!isNaN(idx) && idx !== currentIndex) {
                goToSlide(idx);
                restartAutoplay();
            }
        });
    });

    // Autoplay functionality
    function startAutoplay() {
        autoplayTimer = setInterval(nextSlide, 5000);
    }

    function stopAutoplay() {
        if (autoplayTimer) {
            clearInterval(autoplayTimer);
            autoplayTimer = null;
        }
    }

    function restartAutoplay() {
        stopAutoplay();
        startAutoplay();
    }

    const container = document.querySelector('.hero-carousel-container');
    if (container) {
        container.addEventListener('mouseenter', stopAutoplay);
        container.addEventListener('mouseleave', startAutoplay);

        // Simple touch swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;
        container.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        container.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) {
                nextSlide();
                restartAutoplay();
            } else if (touchEndX - touchStartX > 50) {
                prevSlide();
                restartAutoplay();
            }
        }, { passive: true });
    }

    // Initialize carousel on page load
    updateCarousel();
    startAutoplay();

    // ==========================================
    // 2. EXPLORE PROGRAMMES SMOOTH LINK & HIGHLIGHT
    // ==========================================
    const exploreLinks = document.querySelectorAll('.explore-program-link');
    exploreLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.dataset.target;
            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                targetEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                targetEl.classList.remove('card-highlight');
                void targetEl.offsetWidth;
                targetEl.classList.add('card-highlight');
            }
        });
    });

    // ==========================================
    // 3. INTERACTIVE DETAIL MODAL
    // ==========================================
    const modal = document.getElementById('event-detail-modal');
    const modalCard = document.getElementById('modal-card');
    const closeModalBtn = document.getElementById('close-modal-btn');
    const modalCancelBtn = document.getElementById('modal-cancel-btn');
    const openDetailBtns = document.querySelectorAll('.open-detail-btn');

    const modalImg = document.getElementById('modal-img');
    const modalBadge = document.getElementById('modal-badge');
    const modalTitle = document.getElementById('modal-title');
    const modalStatus = document.getElementById('modal-status');
    const modalDesc = document.getElementById('modal-desc');

    function openModal(data) {
        if (!modal) return;
        if (modalImg) modalImg.src = data.image || '';
        if (modalBadge) modalBadge.textContent = data.badge || '';
        if (modalTitle) modalTitle.textContent = data.title || '';
        if (modalStatus) modalStatus.textContent = data.status || '';
        if (modalDesc) modalDesc.textContent = data.desc || '';

        modal.classList.remove('opacity-0', 'pointer-events-none');
        modalCard.classList.remove('scale-95');
        modalCard.classList.add('scale-100');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.add('opacity-0', 'pointer-events-none');
        modalCard.classList.remove('scale-100');
        modalCard.classList.add('scale-95');
        document.body.style.overflow = '';
    }

    openDetailBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            openModal({
                image: this.dataset.image,
                badge: this.dataset.badge,
                title: this.dataset.title,
                status: this.dataset.status,
                desc: this.dataset.desc,
            });
        });
    });

    if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
    if (modalCancelBtn) modalCancelBtn.addEventListener('click', closeModal);

    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal && !modal.classList.contains('pointer-events-none')) {
            closeModal();
        }
    });
});
</script>
@endsection
