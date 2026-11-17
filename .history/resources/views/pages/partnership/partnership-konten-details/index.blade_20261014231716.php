@extends('layout.app')

@section('title', 'Partnership Media | House Ilmu Indonesia')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="partnership-page-wrapper py-10 md:py-16 px-4 md:px-8">
    <div class="max-w-6xl mx-auto">
        
        <!-- Back Link -->
        <div class="mb-6" data-aos="fade-right">
            <a href="{{ url('/partnership#partnership-types') }}" class="inline-flex items-center text-sm font-semibold text-[#0c2b5e] hover:text-[#FF731D] transition-colors duration-150 text-decoration-none">
                <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Kolaborasi Komunitas
            </a>
        </div>

        <!-- Section Title & Description -->
        <div class="text-center" data-aos="fade-up">
            <h1 class="partnership-serif-title text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#FF731D] uppercase tracking-wide">
                MITRA MEDIA
            </h1>
            <div class="partnership-title-underline"></div>
            <p class="mt-6 text-[#475569] text-sm sm:text-base leading-relaxed max-w-3xl mx-auto">
                Mitra Media adalah kolaborasi untuk mempromosikan dan memperluas jangkauan program atau event House Ilmu Indonesia melalui kanal komunikasi media partner yang saling menguntungkan.
            </p>
        </div>

        <!-- 3 Information Columns -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto mt-10" data-aos="fade-up" data-aos-delay="100">
            
            <!-- Column 1: UNTUK SIAPA & PROSES KOLABORASI -->
            <div class="partnership-card-blue-outline p-6">
                <div>
                    <h3 class="text-[#FF731D] font-bold text-center text-sm sm:text-base uppercase tracking-wide">
                        UNTUK SIAPA
                    </h3>
                    <p class="text-[#475569] text-xs sm:text-sm mt-3 leading-relaxed text-center">
                        Media kampus, platform informasi event, portal media online, dan komunitas kreatif.
                    </p>

                    <h3 class="text-[#FF731D] font-bold text-center text-sm sm:text-base uppercase tracking-wide mt-6">
                        PROSES KOLABORASI
                    </h3>
                    <ul class="text-[#475569] text-xs sm:text-sm mt-3 space-y-2 list-none p-0 leading-relaxed">
                        <li>• Kirimkan permohonan media partner.</li>
                        <li>• Sepakati penempatan logo dan materi promosi.</li>
                        <li>• Publikasikan materi dan laporkan pencapaian.</li>
                    </ul>
                </div>
            </div>

            <!-- Column 2: AKTIVITAS -->
            <div class="partnership-card-blue-outline p-6">
                <div>
                    <h3 class="text-[#FF731D] font-bold text-center text-sm sm:text-base uppercase tracking-wide">
                        AKTIVITAS
                    </h3>
                    <ul class="text-[#475569] text-xs sm:text-sm mt-3 space-y-2 list-none p-0 leading-relaxed">
                        <li>• Publikasi poster di feed dan story Instagram</li>
                        <li>• Penyebaran info di broadcast group</li>
                        <li>• Pemasangan logo di flyer dan materi acara</li>
                        <li>• Liputan acara atau artikel publikasi</li>
                        <li>• Mendukung amplifikasi kampanye edukatif</li>
                    </ul>
                </div>
            </div>

            <!-- Column 3: MANFAAT -->
            <div class="partnership-card-blue-outline p-6">
                <div>
                    <h3 class="text-[#FF731D] font-bold text-center text-sm sm:text-base uppercase tracking-wide">
                        MANFAAT
                    </h3>
                    <ul class="text-[#475569] text-xs sm:text-sm mt-3 space-y-2 list-none p-0 leading-relaxed">
                        <li>• Meningkatkan eksposur dan jangkauan media</li>
                        <li>• Portofolio kemitraan resmi event nasional</li>
                        <li>• Akses partisipasi gratis bagi perwakilan media</li>
                        <li>• Membangun relasi antar komunitas muda</li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Full-width: CONTOH KOLABORASI -->
        <div class="max-w-5xl mx-auto mt-6 partnership-card-blue-outline p-6 md:p-8" data-aos="fade-up" data-aos-delay="150">
            <h3 class="partnership-serif-title font-bold text-[#0c2b5e] text-base md:text-lg mb-2">
                CONTOH KOLABORASI
            </h3>
            <p class="text-[#475569] text-xs sm:text-sm leading-relaxed m-0">
                Publikasi bersama event HITCC, penyebaran info beasiswa dan mentoring, atau liputan kegiatan pengembangan karir pemuda.
            </p>
        </div>

        <!-- Section: COLLABORATION DOCUMENTATION -->
        <div class="mt-16 md:mt-20 text-center" data-aos="fade-up">
            <h2 class="partnership-serif-title text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#FF731D] uppercase tracking-wide">
                COLLABORATION DOCUMENTATION
            </h2>
            <div class="partnership-title-underline"></div>

            <div class="partnership-doc-slider-wrap mt-8">
                <div class="partnership-doc-grid">
                    <div class="partnership-doc-card">
                        <img src="{{ asset('img/partnership/doc-1.png') }}" alt="Dokumentasi Kolaborasi 1">
                    </div>
                    <div class="partnership-doc-card">
                        <img src="{{ asset('img/partnership/doc-2.png') }}" alt="Dokumentasi Kolaborasi 2">
                    </div>
                    <div class="partnership-doc-card">
                        <img src="{{ asset('img/partnership/doc-3.png') }}" alt="Dokumentasi Kolaborasi 3">
                    </div>
                </div>

                <!-- Pagination Dots -->
                <div class="partnership-slider-dots">
                    <span class="partnership-slider-dot active"></span>
                    <span class="partnership-slider-dot"></span>
                    <span class="partnership-slider-dot"></span>
                    <span class="partnership-slider-dot"></span>
                    <span class="partnership-slider-dot"></span>
                </div>
            </div>
        </div>

        <!-- Section: MARI MENCIPTAKAN DAMPAK BERMAKNA BERSAMA (CTA) -->
        <div class="max-w-3xl mx-auto mt-14 partnership-card-blue-outline p-8 text-center" data-aos="fade-up">
            <h2 class="partnership-serif-title font-bold text-[#FF731D] text-lg sm:text-xl md:text-2xl uppercase tracking-wide mb-5">
                MARI MENCIPTAKAN DAMPAK BERMAKNA BERSAMA
            </h2>
            <a href="https://bit.ly/PartnershipHouseilmu" target="_blank" class="partnership-btn-orange mx-auto">
                <span>Mari Berkolaborasi</span>
                <span class="text-xs">&#8599;</span>
            </a>
        </div>

        <!-- Section: WHO WORK WITH US? -->
        <div class="partner my-5 py-4" data-aos="fade-up">
            <h1 class="col-12 text-center fw-bold pt-5 mt-2" style="color: #083d77">
                Who work with us?
            </h1>
            <div id="partnerSplide" class="splide mt-4">
                <div class="splide__track">
                    <ul class="splide__list flex items-center">
                        <li class="splide__slide">
                            <img src="{{ asset('img/homepage/logo-cakap.png') }}" class="w-56 mx-auto d-block" alt="logo partner cakap">
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/homepage/logo-indorelawan.png') }}" class="w-56 mx-auto d-block" alt="logo partner indorelawan">
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/homepage/logo-pemimpinid.jpg') }}" class="w-56 mx-auto d-block" alt="logo partner pemimpinid">
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/homepage/logo-institut-id.png') }}" class="w-56 mx-auto d-block" alt="logo partner institut id">
                        </li>
                        <li class="splide__slide">
                            <img src="{{ asset('img/homepage/logo-phillip-sekuritas.png') }}" class="w-56 mx-auto d-block" alt="logo partner phillip sekuritas">
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section: GET TO KNOW MORE ABOUT HI (FAQ) -->
        <div class="mt-20 max-w-4xl mx-auto" data-aos="fade-up">
            <div class="text-center">
                <h2 class="partnership-serif-title text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#FF731D] tracking-wider uppercase">
                    GET TO KNOW MORE ABOUT HI
                </h2>
                <div class="partnership-title-underline"></div>
                <p class="text-[#475569] text-sm sm:text-base mt-3">
                    Kenali House Ilmu Indonesia melalui beberapa pertanyaan singkat.
                </p>
            </div>

            <div class="partnership-faq-list mt-10">
                <div class="partnership-faq-item open">
                    <button type="button" class="partnership-faq-header" aria-expanded="true">
                        <span>Apa itu House Ilmu Indonesia?</span>
                        <span class="partnership-faq-icon">-</span>
                    </button>
                    <div class="partnership-faq-body">
                        House Ilmu Indonesia adalah ruang belajar dan pengembangan karier bagi generasi muda Indonesia.
                    </div>
                </div>

                <div class="partnership-faq-item">
                    <button type="button" class="partnership-faq-header" aria-expanded="false">
                        <span>Siapa yang bisa mengikuti program HI?</span>
                        <span class="partnership-faq-icon">+</span>
                    </button>
                    <div class="partnership-faq-body">
                        Seluruh anak muda, mahasiswa, fresh graduate, dan siapa saja yang ingin mengembangkan potensi, karier, dan keterampilannya dapat mengikuti program-program di House Ilmu Indonesia.
                    </div>
                </div>

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

    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const faqHeaders = document.querySelectorAll('.partnership-faq-header');
        faqHeaders.forEach(header => {
            header.addEventListener('click', function () {
                const item = this.closest('.partnership-faq-item');
                const isOpen = item.classList.contains('open');
                const icon = this.querySelector('.partnership-faq-icon');

                document.querySelectorAll('.partnership-faq-item').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('open');
                        const otherHeader = otherItem.querySelector('.partnership-faq-header');
                        const otherIcon = otherItem.querySelector('.partnership-faq-icon');
                        if (otherHeader) otherHeader.setAttribute('aria-expanded', 'false');
                        if (otherIcon) otherIcon.textContent = '+';
                    }
                });

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

        // Initialize Partner Splide
        if (typeof Splide !== 'undefined') {
            const partnerEl = document.querySelector("#partnerSplide");
            if (partnerEl && !partnerEl.classList.contains('is-active')) {
                new Splide(partnerEl, {
                    type: "loop",
                    perPage: 3,
                    perMove: 1,
                    gap: "1rem",
                    autoplay: true,
                    pauseOnHover: true,
                    arrows: true,
                    pagination: true,
                    breakpoints: {
                        1960: { perPage: 4 },
                        1440: { perPage: 3 },
                        768: { perPage: 2 },
                        500: { perPage: 1 },
                    },
                }).mount();
            }
        }
    });
</script>
@endsection
