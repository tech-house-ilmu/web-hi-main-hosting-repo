@extends('layout.app')

@section('title', 'Partnership | House Ilmu Indonesia')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="partnership-page-wrapper">

    <!-- ==========================================
         HERO SECTION
         ========================================== -->
    <section class="py-12 md:py-20 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left Column: Title & Intro -->
                <div class="lg:col-span-6" data-aos="fade-right">
                    <h1 class="partnership-serif-title text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#0c2b5e] leading-[1.18]">
                        Kolaborasi Komunitas bersama House Ilmu Indonesia
                    </h1>
                    <p class="mt-6 text-[#475569] text-base md:text-lg leading-relaxed max-w-lg">
                        Mari berkolaborasi untuk membuka lebih banyak kesempatan belajar dan berkembang bersama House Ilmu Indonesia.
                    </p>
                </div>

                <!-- Right Column: Hero Zoom Slider -->
                <div class="lg:col-span-6" data-aos="fade-left">
                    <div class="partnership-hero-slider-wrap" id="partnershipHeroSlider">
                        <div class="partnership-hero-slider-viewport">
                            <div class="partnership-hero-slide active">
                                <img src="{{ asset('img/partnership/hero-zoom.png') }}" alt="Kolaborasi Zoom House Ilmu Indonesia">
                            </div>
                            <div class="partnership-hero-slide">
                                <img src="{{ asset('img/partnership/doc-1.png') }}" alt="Sesi Kolaborasi 1">
                            </div>
                            <div class="partnership-hero-slide">
                                <img src="{{ asset('img/partnership/doc-2.png') }}" alt="Sesi Kolaborasi 2">
                            </div>
                            <div class="partnership-hero-slide">
                                <img src="{{ asset('img/partnership/doc-3.png') }}" alt="Sesi Kolaborasi 3">
                            </div>
                            <div class="partnership-hero-slide">
                                <img src="{{ asset('img/career/hero-zoom.png') }}" alt="Zoom Meeting House Ilmu">
                            </div>

                            <!-- Navigation Chevron Buttons -->
                            <button type="button" class="partnership-slider-nav-btn prev" id="heroPrevBtn" aria-label="Slide sebelumnya">
                                <i class="fa-solid fa-chevron-left text-sm"></i>
                            </button>
                            <button type="button" class="partnership-slider-nav-btn next" id="heroNextBtn" aria-label="Slide berikutnya">
                                <i class="fa-solid fa-chevron-right text-sm"></i>
                            </button>
                        </div>

                        <!-- 5 Pagination Dots -->
                        <div class="partnership-slider-dots" id="heroDots">
                            <button type="button" class="partnership-slider-dot active" data-slide="0" aria-label="Slide 1"></button>
                            <button type="button" class="partnership-slider-dot" data-slide="1" aria-label="Slide 2"></button>
                            <button type="button" class="partnership-slider-dot" data-slide="2" aria-label="Slide 3"></button>
                            <button type="button" class="partnership-slider-dot" data-slide="3" aria-label="Slide 4"></button>
                            <button type="button" class="partnership-slider-dot" data-slide="4" aria-label="Slide 5"></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION: WHY COLLABORATE WITH US?
         ========================================== -->
    <section class="partnership-why-section py-16 md:py-24 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            
            <!-- Section Title -->
            <div class="text-center" data-aos="fade-up">
                <h2 class="partnership-serif-title text-2xl sm:text-3xl md:text-4xl font-extrabold text-white tracking-wider uppercase">
                    WHY COLLABORATE WITH US?
                </h2>
                <div class="partnership-title-underline"></div>
            </div>

            <!-- Descriptive Paragraphs -->
            <div class="mt-8 text-center text-white/90 text-sm sm:text-base leading-relaxed max-w-4xl mx-auto space-y-4" data-aos="fade-up" data-aos-delay="100">
                <p>
                    House Ilmu Indonesia adalah platform edusociopreneur yang bergerak memberikan konten-konten edukasi career development dan program-program soft skill serta life skill yang berkontribusi langsung membantu para Kawaners (muda-mudi Indonesia) House Ilmu Indonesia untuk berkembang dan berprestasi.
                </p>
                <p>
                    Kami berdedikasi untuk memberikan dampak positif melalui berbagai inovasi program yang kami jalankan. Dengan pengalaman dan jaringan luas yang kami miliki, kami menawarkan kesempatan kolaborasi yang dapat memberikan manfaat besar bagi mitra kami.
                </p>
                <p class="font-medium pt-2">
                    Beberapa alasan mengapa Anda harus memilih kami sebagai mitra:
                </p>
            </div>

            <!-- 4 Reasons Grid (2x2) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto mt-12" data-aos="fade-up" data-aos-delay="200">
                
                <!-- Card 01 -->
                <div class="partnership-card-white">
                    <span class="text-[#FF731D] font-bold text-sm tracking-wide">01</span>
                    <h3 class="partnership-serif-title text-xl font-bold text-[#0c2b5e] mt-2 mb-3">
                        Reputasi dan Kredibilitas
                    </h3>
                    <p class="text-[#475569] text-sm leading-relaxed">
                        Kami memiliki track record yang solid dalam menjalankan berbagai program dan acara yang sukses.
                    </p>
                </div>

                <!-- Card 02 -->
                <div class="partnership-card-white">
                    <span class="text-[#FF731D] font-bold text-sm tracking-wide">02</span>
                    <h3 class="partnership-serif-title text-xl font-bold text-[#0c2b5e] mt-2 mb-3">
                        Jaringan Luas
                    </h3>
                    <p class="text-[#475569] text-sm leading-relaxed">
                        Kami memiliki koneksi dengan berbagai pihak yang relevan dan berpengaruh di industri.
                    </p>
                </div>

                <!-- Card 03 -->
                <div class="partnership-card-white">
                    <span class="text-[#FF731D] font-bold text-sm tracking-wide">03</span>
                    <h3 class="partnership-serif-title text-xl font-bold text-[#0c2b5e] mt-2 mb-3">
                        Tim Profesional
                    </h3>
                    <p class="text-[#475569] text-sm leading-relaxed">
                        Tim kami terdiri dari individu-individu yang berkompeten dan berpengalaman di bidangnya.
                    </p>
                </div>

                <!-- Card 04 -->
                <div class="partnership-card-white">
                    <span class="text-[#FF731D] font-bold text-sm tracking-wide">04</span>
                    <h3 class="partnership-serif-title text-xl font-bold text-[#0c2b5e] mt-2 mb-3">
                        Peluang Publikasi
                    </h3>
                    <p class="text-[#475569] text-sm leading-relaxed">
                        Kolaborasi dengan kami akan meningkatkan eksposur dan publikasi brand Anda melalui berbagai kanal media kami.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- ==========================================
         SECTION: COLLABORATION TYPES
         ========================================== -->
    <section id="partnership-types" class="py-16 md:py-24 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            
            <!-- Section Title -->
            <div class="text-center" data-aos="fade-up">
                <h2 class="partnership-serif-title text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#FF731D] tracking-wider uppercase">
                    COLLABORATION TYPES
                </h2>
                <div class="partnership-title-underline"></div>
            </div>

            <!-- 4 Cards Grid (2x2) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto mt-12" data-aos="fade-up" data-aos-delay="150">
                
                <!-- Card 1: Kolaborasi Komunitas -->
                <div class="partnership-card-blue-outline">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-[#FF731D] uppercase tracking-wide">
                            KOLABORASI KOMUNITAS
                        </h3>
                        <p class="text-[#475569] text-sm mt-3 mb-6 leading-relaxed">
                            Kolaborasi bersama komunitas atau organisasi dengan tujuan yang selaras.
                        </p>
                    </div>
                    <div>
                        <a href="{{ url('/partnership/partnership-details') }}" class="partnership-btn-orange">
                            <span>Selengkapnya</span>
                            <span class="text-xs">&#8599;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Affiliate -->
                <div class="partnership-card-blue-outline">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-[#FF731D] uppercase tracking-wide">
                            AFFILIATE
                        </h3>
                        <p class="text-[#475569] text-sm mt-3 mb-6 leading-relaxed">
                            Membantu memperkenalkan program dan peluang HI kepada audiens yang lebih luas.
                        </p>
                    </div>
                    <div>
                        <a href="{{ url('/partnership/partnership-affiliate-details') }}" class="partnership-btn-orange">
                            <span>Selengkapnya</span>
                            <span class="text-xs">&#8599;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Kolaborasi Acara -->
                <div class="partnership-card-blue-outline">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-[#FF731D] uppercase tracking-wide">
                            KOLABORASI ACARA
                        </h3>
                        <p class="text-[#475569] text-sm mt-3 mb-6 leading-relaxed">
                            Menciptakan atau mendukung kegiatan edukatif dan pengembangan karier bersama.
                        </p>
                    </div>
                    <div>
                        <a href="{{ url('/partnership/partnership-event-details') }}" class="partnership-btn-orange">
                            <span>Selengkapnya</span>
                            <span class="text-xs">&#8599;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 4: Mitra Media -->
                <div class="partnership-card-blue-outline">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-[#FF731D] uppercase tracking-wide">
                            MITRA MEDIA
                        </h3>
                        <p class="text-[#475569] text-sm mt-3 mb-6 leading-relaxed">
                            Mempromosikan dan memperluas jangkauan program atau event HI melalui kanal komunikasi.
                        </p>
                    </div>
                    <div>
                        <a href="{{ url('/partnership/partnership-konten-details') }}" class="partnership-btn-orange">
                            <span>Selengkapnya</span>
                            <span class="text-xs">&#8599;</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ==========================================
         SECTION: OUR PARTNER & COLLABORATION
         ========================================== -->
    <section class="partnership-why-section py-16 md:py-24 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            
            <!-- Section Title -->
            <div class="text-center" data-aos="fade-up">
                <h2 class="partnership-serif-title text-2xl sm:text-3xl md:text-4xl font-extrabold text-white tracking-wider uppercase">
                    OUR PARTNER & COLLABORATION
                </h2>
                <div class="partnership-title-underline"></div>
                <p class="text-white/90 text-sm sm:text-base mt-3">
                    Ruang kolaborasi yang tumbuh bersama House Ilmu Indonesia.
                </p>
            </div>

            <!-- Partner Logos Container -->
            <div class="mt-10 p-6 md:p-10 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="150">
                <div class="partnership-partner-grid">
                    
                    <!-- Partner 1: Girls Beyond -->
                    <div class="partnership-partner-item">
                        <img src="{{ asset('img/partnership/partner-girls-beyond.png') }}" alt="Logo Girls Beyond">
                    </div>

                    <!-- Partner 2: ideal -->
                    <div class="partnership-partner-item">
                        <img src="{{ asset('img/partnership/partner-ideal.png') }}" alt="Logo ideal">
                    </div>

                    <!-- Partner 3: pemimpin.id -->
                    <div class="partnership-partner-item item-pemimpin">
                        <img src="{{ asset('img/partnership/partner-pemimpin.png') }}" alt="Logo pemimpin.id">
                    </div>

                    <!-- Partner 4: Phillip Sekuritas Indonesia -->
                    <div class="partnership-partner-item">
                        <img src="{{ asset('img/partnership/partner-phillip.png') }}" alt="Logo Phillip Sekuritas Indonesia">
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- ==========================================
         SECTION: GET TO KNOW MORE ABOUT HI (FAQ)
         ========================================== -->
    <section class="py-16 md:py-24 px-4 md:px-8">
        <div class="max-w-4xl mx-auto">
            
            <!-- Section Title -->
            <div class="text-center" data-aos="fade-up">
                <h2 class="partnership-serif-title text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#FF731D] tracking-wider uppercase">
                    GET TO KNOW MORE ABOUT HI
                </h2>
                <div class="partnership-title-underline"></div>
                <p class="text-[#475569] text-sm sm:text-base mt-3">
                    Kenali House Ilmu Indonesia melalui beberapa pertanyaan singkat.
                </p>
            </div>

            <!-- Accordion List -->
            <div class="partnership-faq-list mt-10" data-aos="fade-up" data-aos-delay="150">
                
                <!-- FAQ Item 1 (Expanded by Default) -->
                <div class="partnership-faq-item open">
                    <button type="button" class="partnership-faq-header" aria-expanded="true">
                        <span>Apa itu House Ilmu Indonesia?</span>
                        <span class="partnership-faq-icon">-</span>
                    </button>
                    <div class="partnership-faq-body">
                        House Ilmu Indonesia adalah ruang belajar dan pengembangan karier bagi generasi muda Indonesia.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="partnership-faq-item">
                    <button type="button" class="partnership-faq-header" aria-expanded="false">
                        <span>Siapa yang bisa mengikuti program HI?</span>
                        <span class="partnership-faq-icon">+</span>
                    </button>
                    <div class="partnership-faq-body">
                        Seluruh anak muda, mahasiswa, fresh graduate, dan siapa saja yang ingin mengembangkan potensi, karier, dan keterampilannya dapat mengikuti program-program di House Ilmu Indonesia.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="partnership-faq-item">
                    <button type="button" class="partnership-faq-header" aria-expanded="false">
                        <span>Apa saja kegiatan yang dilakukan House Ilmu?</span>
                        <span class="partnership-faq-icon">+</span>
                    </button>
                    <div class="partnership-faq-body">
                        House Ilmu Indonesia menyelenggarakan berbagai program mulai dari webinar, mentoring karir, review CV, program pengembangan kepemimpinan, hingga kolaborasi komunitas dan event edukatif lainnya.
                    </div>
                </div>

            </div>

        </div>
    </section>

</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hero Slider
        const slider = document.getElementById('partnershipHeroSlider');
        if (slider) {
            const slides = slider.querySelectorAll('.partnership-hero-slide');
            const dots = slider.querySelectorAll('.partnership-slider-dot');
            const prevBtn = document.getElementById('heroPrevBtn');
            const nextBtn = document.getElementById('heroNextBtn');
            let current = 0;
            let autoTimer = null;

            function goTo(index) {
                if (!slides.length) return;
                current = (index + slides.length) % slides.length;
                slides.forEach((s, i) => s.classList.toggle('active', i === current));
                dots.forEach((d, i) => d.classList.toggle('active', i === current));
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    goTo(current - 1);
                    resetTimer();
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    goTo(current + 1);
                    resetTimer();
                });
            }
            dots.forEach(dot => {
                dot.addEventListener('click', function () {
                    const idx = parseInt(this.getAttribute('data-slide'), 10);
                    goTo(idx);
                    resetTimer();
                });
            });

            function startTimer() {
                autoTimer = setInterval(() => {
                    goTo(current + 1);
                }, 4000);
            }
            function resetTimer() {
                clearInterval(autoTimer);
                startTimer();
            }
            startTimer();
        }

        // FAQ Accordion
        const faqHeaders = document.querySelectorAll('.partnership-faq-header');
        faqHeaders.forEach(header => {
            header.addEventListener('click', function () {
                const item = this.closest('.partnership-faq-item');
                const isOpen = item.classList.contains('open');
                const icon = this.querySelector('.partnership-faq-icon');

                // Close other items
                document.querySelectorAll('.partnership-faq-item').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('open');
                        const otherHeader = otherItem.querySelector('.partnership-faq-header');
                        const otherIcon = otherItem.querySelector('.partnership-faq-icon');
                        if (otherHeader) otherHeader.setAttribute('aria-expanded', 'false');
                        if (otherIcon) otherIcon.textContent = '+';
                    }
                });

                // Toggle current item
                if (isOpen) {
                    item.classList.remove('open');
                    this.setAttribute('aria-expanded', 'false');
                    if (icon) icon.textContent = '+';
                } else {
                    item.classList.add('open');
                    this.setAttribute('aria-expanded', 'true');
                    if (icon) icon.textContent = '-';
                }
            });
        });
    });
</script>
@endsection
