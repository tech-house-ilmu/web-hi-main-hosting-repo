@extends('layout.app')

@section('title', 'HI Programmes | House Ilmu Indonesia')
@section('hide_comments', true)

@section('content')
@php
    $programmes = [
        [
            'id' => 'review-cv',
            'title' => 'Review CV',
            'category' => 'Career Preparation',
            'category_badge' => 'Career Prep',
            'mode' => 'Hybrid',
            'rating' => '5.0',
            'image' => 'img/homepage/programme/review-cv.webp',
            'provider' => 'House Ilmu Indonesia • 1-on-1 Mentoring',
            'has_counter' => true,
            'counter_id' => 'counter1',
            'counter_val' => 74,
            'counter_label' => '+ Peserta Terbimbing',
            'benefit' => 'Evaluasi Format ATS & Portfolio',
            'schedule' => 'Batch Dibuka Setiap Minggu',
            'detail_anchor' => '#review',
            'filter_group' => 'review-cv',
            'order_featured' => 1,
            'short_desc' => 'Hybrid event yang membahas tentang career preparation secara menyeluruh dari tiap tahapan recruitment.',
        ],
        [
            'id' => 'sudut-karir',
            'title' => 'Sudut Karir',
            'category' => 'Career Coaching',
            'category_badge' => 'Soft & Life Skill',
            'mode' => 'Offline & Hybrid',
            'rating' => '5.0',
            'image' => 'img/homepage/programme/sudut-karir2.webp',
            'provider' => 'House Ilmu Indonesia • Expert Session',
            'has_counter' => true,
            'counter_id' => 'counter2',
            'counter_val' => 48,
            'counter_label' => '+ Alumni & Peserta Aktif',
            'benefit' => 'Simulasi Interview & Diskusi Expert',
            'schedule' => 'Sesi Terjadwal Tiap Bulan',
            'detail_anchor' => '#sudutkarir',
            'filter_group' => 'sudut-karir',
            'order_featured' => 2,
            'short_desc' => 'Program diskusi santai dan bimbingan mendalam untuk mengembangkan soft skill serta life skill bersama expert.',
        ],
    ];
@endphp

<!-- Hero / Header Section -->
<section class="bg-[#1053D4] pt-12 pb-10 px-4 sm:px-6 lg:px-8 text-white relative overflow-hidden">
    <div class="max-w-5xl mx-auto text-center relative z-10">
        <!-- Title -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-white text-center mb-3 tracking-tight">
            HI <span class="text-[#FF731D]">Programmes</span>
        </h1>

        <!-- Subtitle -->
        <p class="text-white/90 text-xs sm:text-sm text-center max-w-2xl mx-auto mb-8 font-normal leading-relaxed">
            Pilih program bimbingan dan pelatihan yang sesuai dengan kebutuhan dan tujuan karirmu. Dirancang khusus untuk membantu mempersiapkan karirmu bersama para ahli dan mentor berpengalaman.
        </p>

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-6">
            <form id="search-form" class="relative flex items-center bg-white rounded-full p-1.5 pl-5 shadow-lg">
                <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm mr-2 shrink-0"></i>
                <input 
                    type="text" 
                    id="search-input" 
                    placeholder="Cari program (Review CV atau Sudut Karir)..." 
                    class="w-full text-xs sm:text-sm text-gray-800 placeholder-gray-400 focus:outline-none bg-transparent pr-2" 
                    autocomplete="off"
                >
                <button 
                    type="submit" 
                    class="bg-[#FF731D] hover:bg-[#E8620D] text-white text-xs sm:text-sm font-bold px-6 py-2.5 rounded-full transition cursor-pointer shrink-0 shadow-sm"
                >
                    Cari Program
                </button>
            </form>
        </div>

        <!-- Filter Categories (Pills) -->
        <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-6" id="category-pills">
            <button 
                type="button" 
                data-category="all" 
                class="category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition cursor-pointer bg-white text-[#FF731D] border-2 border-[#FF731D] shadow-sm"
            >
                Semua
            </button>
            <button 
                type="button" 
                data-category="review-cv" 
                class="category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition cursor-pointer bg-white text-[#152A5E] hover:text-[#FF731D] border border-transparent shadow-xs"
            >
                Review CV
            </button>
            <button 
                type="button" 
                data-category="sudut-karir" 
                class="category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition cursor-pointer bg-white text-[#152A5E] hover:text-[#FF731D] border border-transparent shadow-xs"
            >
                Sudut Karir
            </button>
        </div>

        <!-- Verification Notice -->
        <div class="flex items-center justify-center gap-2 text-[11px] sm:text-xs text-emerald-300 font-medium text-center">
            <i class="fa-regular fa-circle-check text-emerald-400 text-sm"></i>
            <span>Menampilkan program resmi yang sudah terverifikasi dan dibimbing mentor House Ilmu Indonesia</span>
        </div>
    </div>
</section>

<!-- Content Body Section -->
<section class="bg-[#FFF9F2] py-8 sm:py-12 px-4 sm:px-6 lg:px-8 min-h-[600px]">
    <div class="max-w-7xl mx-auto" id="programmes-section">
        
        <!-- Meta bar: Counts & Sort -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
            <div class="flex flex-wrap items-center gap-2 text-xs sm:text-sm font-medium text-gray-800">
                <span>Menampilkan <span class="text-[#FF731D] font-bold" id="visible-count">{{ count($programmes) }}</span> dari <span class="font-bold text-gray-900" id="total-count">{{ count($programmes) }}</span> Program Pilihan</span>
                <span class="px-2.5 py-0.5 rounded-full bg-[#FFE8D6] text-[#FF731D] text-[11px] font-bold tracking-wide">Pendaftaran Terbuka</span>
            </div>

            <div class="relative w-full sm:w-auto">
                <select id="sort-select" class="w-full sm:w-auto appearance-none bg-white border border-gray-200 text-gray-700 text-xs sm:text-sm font-semibold py-2 pl-4 pr-9 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF731D]/20 shadow-xs cursor-pointer">
                    <option value="featured">Urutkan: Program Unggulan</option>
                    <option value="rating">Urutkan: Rating Tertinggi</option>
                    <option value="alphabetical">Urutkan: Nama (A-Z)</option>
                </select>
                <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
            </div>
        </div>

        <!-- Programmes Cards Grid -->
        <div id="counter" class="grid grid-cols-1 md:grid-cols-2 max-w-5xl mx-auto gap-6 lg:gap-8">
            @foreach($programmes as $prog)
                <div 
                    class="programme-card bg-white border-[3px] border-[#0A192F] rounded-[24px] p-5 sm:p-6 flex flex-col justify-between shadow-xs transition-transform duration-300 hover:-translate-y-1"
                    data-title="{{ strtolower($prog['title']) }}"
                    data-category="{{ strtolower($prog['category']) }}"
                    data-group="{{ $prog['filter_group'] }}"
                    data-rating="{{ $prog['rating'] }}"
                    data-featured="{{ $prog['order_featured'] }}"
                >
                    <div>
                        <!-- Top Tags -->
                        <div class="flex items-center justify-between text-xs text-[#8C6D46] font-semibold mb-3">
                            <span>{{ $prog['category_badge'] }} • {{ $prog['mode'] }}</span>
                            <span class="flex items-center gap-1.5 font-bold text-amber-500">
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <span>{{ $prog['rating'] }}</span>
                            </span>
                        </div>

                        <!-- Poster Image -->
                        <div class="w-full aspect-[4/3] rounded-[16px] overflow-hidden bg-gray-50 mb-3.5 border border-gray-100 flex items-center justify-center">
                            <img 
                                src="{{ asset($prog['image']) }}" 
                                alt="{{ $prog['title'] }}" 
                                class="w-full h-full object-cover object-top hover:scale-105 transition duration-500" 
                                loading="lazy" 
                                decoding="async"
                            >
                        </div>

                        <!-- Title -->
                        <h3 class="font-extrabold text-[#0A192F] text-base sm:text-lg leading-snug line-clamp-2 mb-2 min-h-[46px]">
                            {{ $prog['title'] }}
                        </h3>

                        <!-- Provider Summary -->
                        <div class="flex items-center gap-1.5 text-xs text-gray-500 font-medium mb-3.5">
                            <i class="fa-regular fa-building text-gray-400 shrink-0"></i>
                            <span class="truncate">{{ $prog['provider'] }}</span>
                        </div>

                        <!-- Detail Information Box -->
                        <div class="bg-[#FFF9F2] border border-[#FFE7D0] rounded-[16px] p-3.5 flex flex-col gap-2.5 mb-5">
                            <div class="flex items-center gap-2 text-xs text-[#4A3B32]">
                                <i class="fa-solid fa-users text-[#FF731D] w-4 text-center shrink-0"></i>
                                <span class="truncate font-semibold">
                                    <span id="{{ $prog['counter_id'] }}" data-target="{{ $prog['counter_val'] }}">0</span>{{ $prog['counter_label'] }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-[#4A3B32]">
                                <i class="fa-solid fa-briefcase text-[#FF731D] w-4 text-center shrink-0"></i>
                                <span class="truncate font-semibold">{{ $prog['benefit'] }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-[#4A3B32]">
                                <i class="fa-regular fa-calendar-check text-[#FF731D] w-4 text-center shrink-0"></i>
                                <span class="truncate font-semibold">{{ $prog['schedule'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div>
                        <a 
                            href="{{ $prog['detail_anchor'] }}" 
                            class="w-full py-2.5 px-4 rounded-full bg-[#FF731D] hover:bg-[#E8620D] text-black font-black text-xs sm:text-sm tracking-wider uppercase text-center border-2 border-[#0A192F] transition duration-200 block shadow-xs"
                        >
                            PELAJARI DETAIL
                        </a>
                    </div>
                </div>
            @endforeach

            <!-- Empty State -->
            <div id="no-results" class="col-span-full py-16 text-center hidden">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-orange-100 flex items-center justify-center text-[#FF731D] text-2xl">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <h4 class="font-bold text-gray-800 text-lg mb-1">Program tidak ditemukan</h4>
                <p class="text-sm text-gray-500">Coba ubah kata kunci pencarian atau pilih kategori yang lain.</p>
            </div>
        </div>

        <!-- Detailed Program Breakdowns Section -->
        <div class="mt-16 sm:mt-20 pt-10 border-t-2 border-[#0A192F]/10">
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-4 mb-8 sm:mb-10">
                <div>
                    <span class="px-3.5 py-1 rounded-full bg-[#FFE8D6] text-[#FF731D] text-xs font-black uppercase tracking-wider">
                        DETAIL & KURIKULUM
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#0A192F] tracking-tight mt-3">
                        Pelajari Program Pilihan Kami
                    </h2>
                </div>
                <p class="text-xs sm:text-sm text-gray-600 max-w-md font-normal leading-relaxed">
                    Informasi lengkap mengenai tujuan, materi bimbingan, dan manfaat yang akan kamu dapatkan di setiap program House Ilmu Indonesia.
                </p>
            </div>

            <!-- Detail 1: Review CV -->
            <div id="review" class="bg-white border-[3px] border-[#0A192F] rounded-[24px] p-6 sm:p-8 lg:p-10 shadow-xs mb-10 transition duration-300 scroll-mt-24">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                    <!-- Left: Poster & Action -->
                    <div class="lg:col-span-5 flex flex-col gap-4">
                        <div class="relative w-full aspect-[4/3] rounded-[20px] overflow-hidden border-2 border-[#0A192F] shadow-sm bg-gray-100">
                            <img 
                                src="{{ asset('img/homepage/programme/review-cv.webp') }}" 
                                alt="Review CV House Ilmu" 
                                class="w-full h-full object-cover object-top hover:scale-105 transition duration-500"
                                loading="lazy"
                                decoding="async"
                            >
                            <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-xs text-[#0A192F] border-2 border-[#0A192F] px-3 py-1 rounded-full font-black text-xs flex items-center gap-1.5 shadow-sm">
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <span>5.0 Rating</span>
                            </div>
                        </div>

                        <!-- Stats Highlights -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-[#FFF9F2] border border-[#FFE7D0] rounded-[16px] p-3 text-center">
                                <span class="block text-xl font-black text-[#FF731D]"><span id="detail-counter1" data-target="74">0</span>+</span>
                                <span class="text-[11px] font-semibold text-gray-600">Peserta Terbantu</span>
                            </div>
                            <div class="bg-[#FFF9F2] border border-[#FFE7D0] rounded-[16px] p-3 text-center">
                                <span class="block text-xl font-black text-[#1053D4]">1-on-1</span>
                                <span class="text-[11px] font-semibold text-gray-600">Feedback Personal</span>
                            </div>
                        </div>

                        <a 
                            href="https://www.instagram.com/houseilmu.id" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-full py-3 px-5 rounded-full bg-[#FF731D] hover:bg-[#E8620D] text-black font-black text-xs sm:text-sm tracking-wider uppercase text-center border-2 border-[#0A192F] transition duration-200 block shadow-xs"
                        >
                            DAFTAR SEKARANG
                        </a>
                    </div>

                    <!-- Right: Info Details -->
                    <div class="lg:col-span-7 flex flex-col gap-5">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="px-3 py-1 rounded-full bg-[#1053D4] text-white text-[11px] font-bold tracking-wider uppercase">
                                    Career Preparation
                                </span>
                                <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-bold tracking-wider uppercase">
                                    Hybrid Event
                                </span>
                            </div>
                            <h3 class="text-2xl sm:text-3xl font-black text-[#0A192F] tracking-tight mb-2">
                                Review CV
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-normal">
                                Hybrid event yang membahas tentang career preparation secara menyeluruh dari tiap tahapan recruitment. Dapatkan bimbingan intensif agar CV milikmu lolos uji sistem ATS dan memikat hati HRD di industri impianmu.
                            </p>
                        </div>

                        <!-- Goals Box -->
                        <div class="bg-[#FFF9F2] border border-[#FFE7D0] rounded-[20px] p-5 sm:p-6">
                            <h4 class="font-black text-[#0A192F] text-sm sm:text-base mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-bullseye text-[#FF731D] text-base"></i>
                                <span>Goals</span>
                            </h4>
                            <ul class="space-y-2.5 text-xs sm:text-sm text-[#4A3B32]">
                                <li class="flex items-start gap-2.5">
                                    <i class="fa-solid fa-circle-check text-emerald-600 text-sm mt-0.5 shrink-0"></i>
                                    <span class="font-medium">Customer CV Review dapat membuat CV yang sesuai dengan latar belakang pendidikan dan didukung oleh pengalamannya.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <i class="fa-solid fa-circle-check text-emerald-600 text-sm mt-0.5 shrink-0"></i>
                                    <span class="font-medium">Customer CV Review mendapatkan feedback tentang CV-nya secara menyeluruh dan terarah.</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Why Box -->
                        <div class="bg-white border-2 border-[#E5E9F0] rounded-[20px] p-5 sm:p-6">
                            <h4 class="font-black text-[#0A192F] text-sm sm:text-base mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-lightbulb text-[#1053D4] text-base"></i>
                                <span>Why</span>
                            </h4>
                            <p class="text-xs sm:text-sm text-gray-700 leading-relaxed font-normal">
                                Kebutuhan generasi muda akan platform review CV yang mudah dijangkau terutama dari segi harga. Product CV Review House Ilmu Indonesia dapat membantu kawaners HI yang ingin mempersiapkan karirnya. Kawaners HI akan mendapatkan saran dan review dari pembuatan CV-nya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail 2: Sudut Karir -->
            <div id="sudutkarir" class="bg-white border-[3px] border-[#0A192F] rounded-[24px] p-6 sm:p-8 lg:p-10 shadow-xs mb-10 transition duration-300 scroll-mt-24">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                    <!-- Left: Poster & Action -->
                    <div class="lg:col-span-5 flex flex-col gap-4">
                        <div class="relative w-full aspect-[4/3] rounded-[20px] overflow-hidden border-2 border-[#0A192F] shadow-sm bg-gray-100">
                            <img 
                                src="{{ asset('img/homepage/programme/sudut-karir2.webp') }}" 
                                alt="Sudut Karir House Ilmu" 
                                class="w-full h-full object-cover object-top hover:scale-105 transition duration-500"
                                loading="lazy"
                                decoding="async"
                            >
                            <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-xs text-[#0A192F] border-2 border-[#0A192F] px-3 py-1 rounded-full font-black text-xs flex items-center gap-1.5 shadow-sm">
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <span>5.0 Rating</span>
                            </div>
                        </div>

                        <!-- Stats Highlights -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-[#FFF9F2] border border-[#FFE7D0] rounded-[16px] p-3 text-center">
                                <span class="block text-xl font-black text-[#FF731D]"><span id="detail-counter2" data-target="48">0</span>+</span>
                                <span class="text-[11px] font-semibold text-gray-600">Alumni Aktif</span>
                            </div>
                            <div class="bg-[#FFF9F2] border border-[#FFE7D0] rounded-[16px] p-3 text-center">
                                <span class="block text-xl font-black text-[#1053D4]">Mentoring</span>
                                <span class="text-[11px] font-semibold text-gray-600">Diskusi Expert</span>
                            </div>
                        </div>

                        <a 
                            href="https://www.instagram.com/houseilmu.id" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-full py-3 px-5 rounded-full bg-[#FF731D] hover:bg-[#E8620D] text-black font-black text-xs sm:text-sm tracking-wider uppercase text-center border-2 border-[#0A192F] transition duration-200 block shadow-xs"
                        >
                            DAFTAR SEKARANG
                        </a>
                    </div>

                    <!-- Right: Info Details -->
                    <div class="lg:col-span-7 flex flex-col gap-5">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="px-3 py-1 rounded-full bg-[#1053D4] text-white text-[11px] font-bold tracking-wider uppercase">
                                    Career Coaching
                                </span>
                                <span class="px-3 py-1 rounded-full bg-orange-100 text-[#FF731D] text-[11px] font-bold tracking-wider uppercase">
                                    Offline & Hybrid
                                </span>
                            </div>
                            <h3 class="text-2xl sm:text-3xl font-black text-[#0A192F] tracking-tight mb-2">
                                Sudut Karir
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed font-normal">
                                Program diskusi santai untuk mengembangkan soft skill dan life skill bersama expert. Membantu mempersiapkan mental, komunikasi profesional, dan strategi interview kerja.
                            </p>
                        </div>

                        <!-- Goals Box -->
                        <div class="bg-[#FFF9F2] border border-[#FFE7D0] rounded-[20px] p-5 sm:p-6">
                            <h4 class="font-black text-[#0A192F] text-sm sm:text-base mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-bullseye text-[#FF731D] text-base"></i>
                                <span>Goals</span>
                            </h4>
                            <p class="text-xs sm:text-sm text-[#4A3B32] font-medium leading-relaxed">
                                House Ilmu Indonesia sebagai wadah pelatihan persiapan karir bagi generasi muda. House Ilmu Indonesia mempersiapkan beberapa kegiatan pelatihan tentang persiapan karir yang dapat di akses di kota-kota di Indonesia.
                            </p>
                        </div>

                        <!-- Why Box -->
                        <div class="bg-white border-2 border-[#E5E9F0] rounded-[20px] p-5 sm:p-6">
                            <h4 class="font-black text-[#0A192F] text-sm sm:text-base mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-lightbulb text-[#1053D4] text-base"></i>
                                <span>Why</span>
                            </h4>
                            <p class="text-xs sm:text-sm text-gray-700 leading-relaxed font-normal">
                                Sudut Karir House Ilmu Indonesia perlu diadakan untuk memfasilitasi pengembangan dan perencanaan karir kamu secara terstruktur melalui beberapa kegiatan pelatihan dan eksplorasi peluang karir. Dengan ini, House Ilmu sebagai wadah yang memberikan panduan bagi kamu dalam merencanakan karir selaras dengan pengalaman dan latar belakang pendidikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const cards = Array.from(document.querySelectorAll('.programme-card'));
    const categoryButtons = document.querySelectorAll('.category-btn');
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search-input');
    const sortSelect = document.getElementById('sort-select');
    const visibleCountEl = document.getElementById('visible-count');
    const noResultsEl = document.getElementById('no-results');
    const grid = document.getElementById('counter');

    let currentCategory = 'all';
    let searchQuery = '';

    function filterAndSortCards() {
        let visibleCards = cards.filter(card => {
            const title = card.dataset.title || '';
            const category = card.dataset.category || '';
            const group = card.dataset.group || '';

            const matchesCategory = currentCategory === 'all' || group === currentCategory;
            const matchesSearch = !searchQuery || title.includes(searchQuery) || category.includes(searchQuery);

            return matchesCategory && matchesSearch;
        });

        // Sorting
        const sortMode = sortSelect ? sortSelect.value : 'featured';
        visibleCards.sort((a, b) => {
            if (sortMode === 'rating') {
                return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
            } else if (sortMode === 'alphabetical') {
                return (a.dataset.title || '').localeCompare(b.dataset.title || '');
            } else {
                return parseInt(a.dataset.featured || 99) - parseInt(b.dataset.featured || 99);
            }
        });

        // Hide all cards first
        cards.forEach(card => card.classList.add('hidden'));

        // Append sorted visible cards
        visibleCards.forEach(card => {
            card.classList.remove('hidden');
            grid.appendChild(card);
        });

        // Update count
        if (visibleCountEl) {
            visibleCountEl.textContent = visibleCards.length;
        }

        // Empty state
        if (noResultsEl) {
            if (visibleCards.length === 0) {
                noResultsEl.classList.remove('hidden');
                grid.appendChild(noResultsEl);
            } else {
                noResultsEl.classList.add('hidden');
            }
        }
    }

    // Category Buttons
    categoryButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            currentCategory = this.dataset.category;

            categoryButtons.forEach(b => {
                b.className = 'category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition cursor-pointer bg-white text-[#152A5E] hover:text-[#FF731D] border border-transparent shadow-xs';
            });
            this.className = 'category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition cursor-pointer bg-white text-[#FF731D] border-2 border-[#FF731D] shadow-sm';

            filterAndSortCards();
        });
    });

    // Search Form & Input
    searchForm.addEventListener('submit', function (e) {
        e.preventDefault();
        searchQuery = searchInput.value.trim().toLowerCase();
        filterAndSortCards();
    });

    searchInput.addEventListener('input', function () {
        searchQuery = this.value.trim().toLowerCase();
        filterAndSortCards();
    });

    // Sort Select
    if (sortSelect) {
        sortSelect.addEventListener('change', function () {
            filterAndSortCards();
        });
    }

    // Counter Animation
    function animateCounter(el, target, duration = 1500) {
        if (!el || el.dataset.animated === 'true') return;
        el.dataset.animated = 'true';
        let start = 0;
        const totalSteps = 40;
        const stepTime = Math.max(Math.floor(duration / totalSteps), 20);
        const increment = target / totalSteps;

        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                el.textContent = target;
                clearInterval(timer);
            } else {
                el.textContent = Math.floor(start);
            }
        }, stepTime);
    }

    const counterElements = [
        document.getElementById('counter1'),
        document.getElementById('counter2'),
        document.getElementById('detail-counter1'),
        document.getElementById('detail-counter2')
    ].filter(Boolean);

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(({ isIntersecting, target }) => {
            if (!isIntersecting) return;
            counterElements.forEach(el => {
                const targetVal = parseInt(el.dataset.target || 0, 10);
                if (targetVal > 0) {
                    animateCounter(el, targetVal, 1500);
                }
            });
            obs.unobserve(target);
        });
    }, { threshold: 0.2 });

    const counterContainer = document.getElementById('counter');
    if (counterContainer) {
        observer.observe(counterContainer);
    }
});
</script>
@endsection
