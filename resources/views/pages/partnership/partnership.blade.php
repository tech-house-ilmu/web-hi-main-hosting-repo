@extends('layout.app')

@section('title', 'Community Collaboration | House Ilmu Indonesia')
@section('meta_description', 'Kolaborasi Komunitas bersama House Ilmu Indonesia. Membuka lebih banyak kesempatan belajar dan berkembang bagi generasi muda Indonesia.')

@section('hide_comments', true)

@section('content')
    {{-- =========================================================================
         1. HERO SECTION
         ========================================================================= --}}
    <section class="relative bg-[#FFF9F0] py-12 sm:py-16 lg:py-20 overflow-hidden">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
                
                <!-- Left Text Column -->
                <div class="lg:col-span-6 flex flex-col justify-center text-left" data-aos="fade-right">
                    <h1 class="partnership-hero-title font-serif text-[#092C5B] text-3xl sm:text-4xl lg:text-[44px] font-bold leading-[1.2] tracking-tight">
                        Kolaborasi Komunitas<br class="hidden sm:inline"> bersama House Ilmu<br class="hidden sm:inline"> Indonesia
                    </h1>
                    <p class="font-sans text-[#5A6A80] text-base sm:text-lg leading-relaxed mt-5 max-w-xl">
                        Mari berkolaborasi untuk membuka lebih banyak kesempatan belajar dan berkembang bersama House Ilmu Indonesia.
                    </p>
                </div>

                <!-- Right Slider Column -->
                <div class="lg:col-span-6" data-aos="fade-left">
                    <div x-data="{
                        activeSlide: 0,
                        slides: [
                            { img: '{{ asset('img/partnership-hero-zoom.webp') }}', alt: 'Zoom Meeting Kolaborasi Komunitas House Ilmu Indonesia' },
                            { img: '{{ asset('img/event-history/gb-circle-meetup-session.png') }}', alt: 'Girls Beyond Circle Meetup Session' },
                            { img: '{{ asset('img/homepage/BoMTalks-GerAce.webp') }}', alt: 'BoM Talks Session' },
                            { img: '{{ asset('img/homepage/poster-HITCC.webp') }}', alt: 'HITCC Opportunities Fair' },
                            { img: '{{ asset('img/homepage/banner-cindy2.webp') }}', alt: 'House Ilmu Indonesia Program' }
                        ],
                        timer: null,
                        startAutoplay() {
                            this.timer = setInterval(() => {
                                this.next();
                            }, 5000);
                        },
                        stopAutoplay() {
                            if (this.timer) clearInterval(this.timer);
                        },
                        next() {
                            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                        },
                        prev() {
                            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                        }
                    }"
                    x-init="startAutoplay()"
                    @mouseenter="stopAutoplay()"
                    @mouseleave="startAutoplay()"
                    class="relative w-full max-w-[560px] mx-auto lg:ml-auto">
                        
                        <!-- Slider Screen Frame -->
                        <div class="relative w-full aspect-[16/10] bg-[#111827] rounded-2xl overflow-hidden shadow-[0_12px_36px_rgba(0,0,0,0.18)] border border-gray-800">
                            <template x-for="(slide, index) in slides" :key="index">
                                <div x-show="activeSlide === index"
                                     x-transition:enter="transition ease-out duration-400"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-300"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute inset-0 w-full h-full">
                                    <img :src="slide.img"
                                         :alt="slide.alt"
                                         class="w-full h-full object-cover select-none" />
                                </div>
                            </template>

                            <!-- Prev Button -->
                            <button type="button"
                                    @click="prev()"
                                    class="absolute left-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-black/60 hover:bg-black/85 text-white flex items-center justify-center transition-colors z-10 focus:outline-none cursor-pointer border-none"
                                    aria-label="Previous Slide">
                                <i class="fa-solid fa-chevron-left text-xs"></i>
                            </button>

                            <!-- Next Button -->
                            <button type="button"
                                    @click="next()"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-black/60 hover:bg-black/85 text-white flex items-center justify-center transition-colors z-10 focus:outline-none cursor-pointer border-none"
                                    aria-label="Next Slide">
                                <i class="fa-solid fa-chevron-right text-xs"></i>
                            </button>
                        </div>

                        <!-- Pagination Dots -->
                        <div class="flex items-center justify-center gap-2 mt-4">
                            <template x-for="(slide, index) in slides" :key="index">
                                <button type="button"
                                        @click="activeSlide = index"
                                        class="h-2.5 rounded-full transition-all duration-300 focus:outline-none cursor-pointer border-none p-0"
                                        :class="activeSlide === index ? 'w-6 bg-[#FF8A16]' : 'w-2.5 bg-gray-300 hover:bg-gray-400'"
                                        :aria-label="'Go to slide ' + (index + 1)">
                                </button>
                            </template>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- =========================================================================
         2. WHY COLLABORATE WITH US? SECTION
         ========================================================================= --}}
    <section class="bg-[#205DB6] py-16 sm:py-20 text-white">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-4xl mx-auto" data-aos="fade-up">
                <h2 class="partnership-section-title font-serif text-2xl sm:text-3xl lg:text-[34px] font-bold text-white uppercase tracking-wide">
                    WHY COLLABORATE WITH US?
                </h2>
                <div class="w-14 h-[3px] bg-[#FF8A16] rounded-full mx-auto mt-3 mb-6"></div>
                
                <div class="space-y-4 text-white/95 text-sm sm:text-base leading-relaxed font-sans">
                    <p>
                        House Ilmu Indonesia adalah platform edusociopreneur yang bergerak memberikan konten-konten edukasi career development dan program-program soft skill serta life skill yang berkontribusi langsung membantu para Kawaners (muda-mudi Indonesia) House Ilmu Indonesia untuk berkembang dan berprestasi.
                    </p>
                    <p>
                        Kami berdedikasi untuk memberikan dampak positif melalui berbagai inovasi program yang kami jalankan. Dengan pengalaman dan jaringan luas yang kami miliki, kami menawarkan kesempatan kolaborasi yang dapat memberikan manfaat besar bagi mitra kami.
                    </p>
                    <p class="font-medium pt-1">
                        Beberapa alasan mengapa Anda harus memilih kami sebagai mitra:
                    </p>
                </div>
            </div>

            <!-- 2x2 Grid of Benefit Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto mt-12" data-aos="fade-up" data-aos-delay="100">
                <!-- Card 01 -->
                <div class="bg-white rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl transition-all duration-300 text-left" style="background-color: #ffffff !important;">
                    <span class="text-[#FF8A16] font-semibold text-xs tracking-wider block mb-3 font-sans">01</span>
                    <h3 class="font-sans font-bold text-[#092C5B] text-lg sm:text-xl mb-2.5">
                        Reputasi dan Kredibilitas
                    </h3>
                    <p class="font-sans text-[#5A6A80] text-sm sm:text-[15px] leading-relaxed">
                        Kami memiliki track record yang solid dalam menjalankan berbagai program dan acara yang sukses.
                    </p>
                </div>

                <!-- Card 02 -->
                <div class="bg-white rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl transition-all duration-300 text-left" style="background-color: #ffffff !important;">
                    <span class="text-[#FF8A16] font-semibold text-xs tracking-wider block mb-3 font-sans">02</span>
                    <h3 class="font-sans font-bold text-[#092C5B] text-lg sm:text-xl mb-2.5">
                        Jaringan Luas
                    </h3>
                    <p class="font-sans text-[#5A6A80] text-sm sm:text-[15px] leading-relaxed">
                        Kami memiliki koneksi dengan berbagai pihak yang relevan dan berpengaruh di industri.
                    </p>
                </div>

                <!-- Card 03 -->
                <div class="bg-white rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl transition-all duration-300 text-left" style="background-color: #ffffff !important;">
                    <span class="text-[#FF8A16] font-semibold text-xs tracking-wider block mb-3 font-sans">03</span>
                    <h3 class="font-sans font-bold text-[#092C5B] text-lg sm:text-xl mb-2.5">
                        Tim Profesional
                    </h3>
                    <p class="font-sans text-[#5A6A80] text-sm sm:text-[15px] leading-relaxed">
                        Tim kami terdiri dari individu-individu yang berkompeten dan berpengalaman di bidangnya.
                    </p>
                </div>

                <!-- Card 04 -->
                <div class="bg-white rounded-2xl p-7 sm:p-8 shadow-md hover:shadow-xl transition-all duration-300 text-left" style="background-color: #ffffff !important;">
                    <span class="text-[#FF8A16] font-semibold text-xs tracking-wider block mb-3 font-sans">04</span>
                    <h3 class="font-sans font-bold text-[#092C5B] text-lg sm:text-xl mb-2.5">
                        Peluang Publikasi
                    </h3>
                    <p class="font-sans text-[#5A6A80] text-sm sm:text-[15px] leading-relaxed">
                        Kolaborasi dengan kami akan meningkatkan eksposur dan publikasi brand Anda melalui berbagai kanal media kami.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         3. COLLABORATION TYPES SECTION
         ========================================================================= --}}
    <section id="collaboration-types" class="bg-[#FFF9F0] py-16 sm:py-20">
        <div id="partnership-list" class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-4xl mx-auto mb-10" data-aos="fade-up">
                <h2 class="partnership-section-title font-serif text-[#FF8A16] text-2xl sm:text-3xl lg:text-[34px] font-bold uppercase tracking-wide">
                    COLLABORATION TYPES
                </h2>
                <div class="w-14 h-[3px] bg-[#FF8A16] rounded-full mx-auto mt-3 mb-4"></div>
            </div>

            <!-- 2x2 Grid of Collaboration Type Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                <!-- Card 1: Kolaborasi Komunitas -->
                <div class="bg-white border border-[#205DB6] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between" style="background-color: #ffffff !important;">
                    <div>
                        <h3 class="font-sans font-bold text-[#FF8A16] text-base sm:text-lg tracking-wide uppercase mb-2.5">
                            KOLABORASI KOMUNITAS
                        </h3>
                        <p class="font-sans text-[#334155] text-sm sm:text-[15px] leading-relaxed mb-6">
                            Kolaborasi bersama komunitas atau organisasi dengan tujuan yang selaras.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('partnership.details') }}"
                           class="inline-flex items-center gap-1.5 bg-[#FF8A16] hover:bg-[#E67808] text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow-xs transition-all duration-200 group">
                            <span>Selengkapnya</span>
                            <span class="transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5">&#x2197;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Affiliate -->
                <div class="bg-white border border-[#205DB6] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between" style="background-color: #ffffff !important;">
                    <div>
                        <h3 class="font-sans font-bold text-[#FF8A16] text-base sm:text-lg tracking-wide uppercase mb-2.5">
                            AFFILIATE
                        </h3>
                        <p class="font-sans text-[#334155] text-sm sm:text-[15px] leading-relaxed mb-6">
                            Membantu memperkenalkan program dan peluang HI kepada audiens yang lebih luas.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('partnership.affiliate') }}"
                           class="inline-flex items-center gap-1.5 bg-[#FF8A16] hover:bg-[#E67808] text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow-xs transition-all duration-200 group">
                            <span>Selengkapnya</span>
                            <span class="transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5">&#x2197;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Kolaborasi Acara -->
                <div class="bg-white border border-[#205DB6] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between" style="background-color: #ffffff !important;">
                    <div>
                        <h3 class="font-sans font-bold text-[#FF8A16] text-base sm:text-lg tracking-wide uppercase mb-2.5">
                            KOLABORASI ACARA
                        </h3>
                        <p class="font-sans text-[#334155] text-sm sm:text-[15px] leading-relaxed mb-6">
                            Menciptakan atau mendukung kegiatan edukatif dan pengembangan karier bersama.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('partnership.event') }}"
                           class="inline-flex items-center gap-1.5 bg-[#FF8A16] hover:bg-[#E67808] text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow-xs transition-all duration-200 group">
                            <span>Selengkapnya</span>
                            <span class="transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5">&#x2197;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 4: Mitra Media -->
                <div class="bg-white border border-[#205DB6] rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between" style="background-color: #ffffff !important;">
                    <div>
                        <h3 class="font-sans font-bold text-[#FF8A16] text-base sm:text-lg tracking-wide uppercase mb-2.5">
                            MITRA MEDIA
                        </h3>
                        <p class="font-sans text-[#334155] text-sm sm:text-[15px] leading-relaxed mb-6">
                            Mempromosikan dan memperluas jangkauan program atau event HI melalui kanal komunikasi.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('partnership.konten') }}"
                           class="inline-flex items-center gap-1.5 bg-[#FF8A16] hover:bg-[#E67808] text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow-xs transition-all duration-200 group">
                            <span>Selengkapnya</span>
                            <span class="transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5">&#x2197;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         4. OUR PARTNER & COLLABORATION SECTION
         ========================================================================= --}}
    <section class="bg-[#205DB6] py-16 sm:py-20 text-white">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-4xl mx-auto mb-8" data-aos="fade-up">
                <h2 class="partnership-section-title font-serif text-2xl sm:text-3xl lg:text-[34px] font-bold text-white uppercase tracking-wide">
                    OUR PARTNER & COLLABORATION
                </h2>
                <div class="w-14 h-[3px] bg-[#FF8A16] rounded-full mx-auto mt-3 mb-3"></div>
                <p class="font-sans text-white/90 text-sm sm:text-base">
                    Ruang kolaborasi yang tumbuh bersama House Ilmu Indonesia.
                </p>
            </div>

            <!-- Frame Box with Translucent Border -->
            <div class="max-w-4xl mx-auto border border-white/20 rounded-2xl p-6 sm:p-10 bg-white/5 backdrop-blur-xs" data-aos="fade-up" data-aos-delay="100">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8 items-center justify-items-center">
                    
                    <!-- Girls Beyond -->
                    <div class="w-full max-w-[200px] h-28 bg-white rounded-xl shadow-md flex flex-col items-center justify-center p-4 transition-transform duration-200 hover:scale-105" style="background-color: #ffffff !important;">
                        <span class="font-sans font-black text-sm tracking-[0.15em] text-[#111827]">GIRLS</span>
                        <span class="font-sans font-black text-sm tracking-[0.15em] text-[#111827] mt-0.5">BEYOND</span>
                    </div>

                    <!-- ideal -->
                    <div class="w-full max-w-[200px] h-28 bg-white rounded-xl shadow-md flex items-center justify-center p-4 transition-transform duration-200 hover:scale-105" style="background-color: #ffffff !important;">
                        @if(file_exists(public_path('img/homepage/partners/logo-ideal.png')))
                            <img src="{{ asset('img/homepage/partners/logo-ideal.png') }}"
                                 alt="IDEAL"
                                 class="max-h-12 max-w-[130px] object-contain" />
                        @else
                            <span class="font-sans font-bold text-2xl text-[#1E5FA8] tracking-tight">ideal</span>
                        @endif
                    </div>

                    <!-- pemimpin.id -->
                    <div class="w-full max-w-[200px] h-28 bg-[#09497E] rounded-xl shadow-md flex flex-col items-center justify-center p-4 transition-transform duration-200 hover:scale-105">
                        <span class="font-sans font-bold text-sm text-white leading-tight">pe</span>
                        <span class="font-sans font-bold text-sm text-white leading-tight">mimpin</span>
                        <span class="font-sans font-bold text-sm text-[#FF8A16] leading-tight">.id</span>
                    </div>

                    <!-- Phillip Sekuritas Indonesia -->
                    <div class="w-full max-w-[200px] h-28 bg-white rounded-xl shadow-md flex items-center justify-center p-4 transition-transform duration-200 hover:scale-105" style="background-color: #ffffff !important;">
                        @if(file_exists(public_path('img/homepage/logo-phillip-sekuritas.webp')))
                            <img src="{{ asset('img/homepage/logo-phillip-sekuritas.webp') }}"
                                 alt="Phillip Sekuritas Indonesia"
                                 class="max-h-14 max-w-[160px] object-contain" />
                        @else
                            <span class="font-sans font-bold text-xs text-[#0B2247] text-center">Phillip Sekuritas Indonesia</span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         5. GET TO KNOW MORE ABOUT HI (FAQ) SECTION
         ========================================================================= --}}
    <section class="bg-[#FFF9F0] py-16 sm:py-20">
        <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-4xl mx-auto mb-10" data-aos="fade-up">
                <h2 class="partnership-section-title font-serif text-[#FF8A16] text-2xl sm:text-3xl lg:text-[34px] font-bold uppercase tracking-wide">
                    GET TO KNOW MORE ABOUT HI
                </h2>
                <div class="w-14 h-[3px] bg-[#FF8A16] rounded-full mx-auto mt-3 mb-3"></div>
                <p class="font-sans text-[#5A6A80] text-sm sm:text-base">
                    Kenali House Ilmu Indonesia melalui beberapa pertanyaan singkat.
                </p>
            </div>

            @php
                $displayFaqs = config('homepage.faqs', [
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
                ]);
            @endphp

            <!-- Accordion Container -->
            <div class="max-w-4xl mx-auto space-y-3.5" x-data="{ openItem: 1 }" data-aos="fade-up" data-aos-delay="100">
                @foreach($displayFaqs as $faq)
                    @php
                        $id = $faq['id'] ?? $loop->iteration;
                    @endphp
                    <div class="partnership-faq-card bg-white rounded-xl shadow-[0_2px_8px_rgba(0,0,0,0.03)] border border-gray-100/80 overflow-hidden transition-all duration-200" style="background-color: #ffffff !important; background: #ffffff !important;">
                        <button type="button"
                                @click="openItem = openItem === {{ $id }} ? null : {{ $id }}"
                                class="partnership-faq-btn w-full px-6 py-4 flex items-center justify-between text-left font-sans font-semibold text-[#092C5B] text-sm sm:text-base hover:text-[#FF8A16] bg-white transition-colors focus:outline-none cursor-pointer border-none"
                                style="background-color: #ffffff !important; background: #ffffff !important;"
                                :aria-expanded="openItem === {{ $id }} ? 'true' : 'false'">
                            <span class="text-[#092C5B]">{{ $faq['question'] }}</span>
                            <span class="text-[#FF8A16] text-xl font-bold ml-4 flex-shrink-0" aria-hidden="true">
                                <span x-show="openItem === {{ $id }}">&minus;</span>
                                <span x-show="openItem !== {{ $id }}">&#43;</span>
                            </span>
                        </button>

                        <div x-show="openItem === {{ $id }}"
                             x-collapse
                             class="partnership-faq-content px-6 pb-5 pt-1 text-[#5A6A80] text-sm sm:text-[15px] leading-relaxed border-t border-gray-100 bg-white"
                             style="background-color: #ffffff !important; background: #ffffff !important;">
                            <p>{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
