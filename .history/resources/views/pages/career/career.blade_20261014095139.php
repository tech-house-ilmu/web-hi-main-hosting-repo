@extends('layout.app')

@section('title', 'Career | House Ilmu Indonesia')

@section('head')
<style>
    /* Career Hero Section */
    .career-hero-section {
        padding: 3.5rem 0 2.5rem;
    }
    .career-hero-eyebrow {
        color: #f57c00;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        margin-bottom: 0.75rem;
    }
    .career-hero-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        font-size: clamp(2.25rem, 4.2vw, 3.35rem);
        line-height: 1.12;
        color: #072146;
        margin-bottom: 1.5rem;
        letter-spacing: -0.01em;
    }
    .career-hero-desc {
        color: #4a5568;
        font-size: 0.95rem;
        line-height: 1.75;
        margin-bottom: 1.1rem;
    }
    .career-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 1.75rem;
    }
    .btn-career-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.45rem;
        background-color: #f57c00;
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        border: 1.5px solid #f57c00;
        box-shadow: 0 4px 0 #c55a00;
        transition: all 0.2s ease;
        text-decoration: none;
    }
    .btn-career-primary:hover {
        background-color: #e66e00;
        transform: translateY(1px);
        box-shadow: 0 3px 0 #c55a00;
    }
    .btn-career-outline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #ffffff;
        color: #e66e00 !important;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        border: 1.5px solid #f57c00;
        box-shadow: 0 4px 0 #e06d00;
        transition: all 0.2s ease;
        text-decoration: none;
    }
    .btn-career-outline:hover {
        background-color: #fff8f0;
        transform: translateY(1px);
        box-shadow: 0 3px 0 #e06d00;
    }

    /* Hero Slider */
    .career-hero-slider-wrap {
        position: relative;
        max-width: 560px;
        margin: 0 auto;
    }
    .career-hero-slider-Viewport {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        background-color: #1d1e20;
        box-shadow: 0 14px 32px rgba(7, 33, 70, 0.16);
        aspect-ratio: 16 / 9.5;
    }
    .career-hero-slide {
        display: none;
        width: 100%;
        height: 100%;
    }
    .career-hero-slide.active {
        display: block;
    }
    .career-hero-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .career-hero-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background-color: rgba(10, 37, 77, 0.85);
        border: 2px solid rgba(255, 255, 255, 0.85);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 5;
        transition: all 0.2s ease;
    }
    .career-hero-nav-btn:hover {
        background-color: #1746a2;
        transform: translateY(-50%) scale(1.05);
    }
    .career-hero-nav-btn.prev {
        left: 10px;
    }
    .career-hero-nav-btn.next {
        right: 10px;
    }
    .career-hero-dots {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 16px;
    }
    .career-hero-dot {
        height: 8px;
        width: 8px;
        border-radius: 999px;
        background-color: #8fa3bf;
        border: none;
        padding: 0;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    .career-hero-dot.active {
        width: 26px;
        background-color: #f57c00;
    }

    /* Recruitment Announcement Section */
    .recruitment-announcement-section {
        padding: 3rem 0 2rem;
    }
    .recruitment-announcement-title {
        color: #0d47a1;
        font-weight: 800;
        font-size: clamp(1.75rem, 3vw, 2.25rem);
        margin-bottom: 0.5rem;
    }
    .recruitment-announcement-subtitle {
        color: #64748b;
        font-size: 0.92rem;
        margin-bottom: 1.75rem;
    }
    .recruitment-status-tabs {
        display: inline-flex;
        align-items: center;
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 999px;
        padding: 5px;
        gap: 4px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        margin-bottom: 2rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    .recruitment-status-tab {
        border: none;
        background: transparent;
        color: #334155;
        font-size: 0.85rem;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .recruitment-status-tab.active {
        background-color: #f57c00;
        color: #ffffff;
        box-shadow: 0 2px 6px rgba(245, 124, 0, 0.3);
    }
    .recruitment-announcement-card {
        max-width: 820px;
        width: 100%;
        background-color: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        border-top: 4px solid #f57c00;
        padding: 28px 32px;
        box-shadow: 0 8px 24px rgba(8, 61, 119, 0.05);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
    }
    @media (max-width: 767px) {
        .recruitment-announcement-card {
            flex-direction: column;
            align-items: flex-start;
            padding: 22px 20px;
        }
    }
    .recruitment-badge-done {
        background-color: #fff3e0;
        color: #f57c00;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 999px;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }
    .recruitment-batch-label {
        color: #64748b;
        font-size: 0.82rem;
        font-weight: 500;
    }
    .recruitment-card-heading {
        color: #0d47a1;
        font-weight: 700;
        font-size: 1.35rem;
        margin: 0.5rem 0;
    }
    .recruitment-card-text {
        color: #64748b;
        font-size: 0.88rem;
        line-height: 1.6;
        margin: 0;
        max-width: 510px;
    }
    .btn-lihat-pengumuman {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background-color: #0d47a1;
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.85rem;
        padding: 0.75rem 1.4rem;
        border-radius: 999px;
        white-space: nowrap;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .btn-lihat-pengumuman:hover {
        background-color: #1746a2;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(13, 71, 161, 0.25);
    }
</style>
@endsection

@section('content')
    <!-- Start career hero section -->
    <section class="career-hero-section container-xl">
        <div class="row align-items-center g-4 g-lg-5 py-2">
            <!-- Left column -->
            <div class="col-12 col-lg-6" data-aos="fade-right">
                <p class="career-hero-eyebrow">JOIN HOUSE ILMU INDONESIA</p>
                <h1 class="career-hero-title">
                    BUILD YOUR<br>
                    CAREER WITH<br>
                    HOUSE ILMU
                </h1>
                <p class="career-hero-desc">
                    House Ilmu Indonesia itu rumah bagi generasi muda yang haus akan ilmu, tempat mereka bertumbuh, menemukan arah, dan mempersiapkan masa depannya. Melalui edukasi yang relevan dan perjalanan karier yang bermakna.
                </p>
                <p class="career-hero-desc">
                    House Ilmu hadir sebagai teman yang menemani setiap proses belajar dan berkembang, karena kami percaya bahwa setiap anak muda berhak memiliki kesempatan untuk membangun masa depan yang lebih baik dan memberikan dampak bagi sekitarnya.
                </p>
                <div class="career-hero-actions">
                    <a href="#career-info" class="btn-career-primary">
                        <span>Jelajahi Kesempatan</span>
                        <span style="font-size: 0.85rem; line-height: 1;">&#8599;</span>
                    </a>
                    <a href="#recruitment-announcement" class="btn-career-outline">
                        Lihat Pengumuman Rekrutmen
                    </a>
                </div>
            </div>

            <!-- Right column: Image Slider -->
            <div class="col-12 col-lg-6" data-aos="fade-left">
                <div class="career-hero-slider-wrap" id="careerHeroSlider">
                    <div class="career-hero-slider-Viewport">
                        <div class="career-hero-slide active">
                            <img src="{{ asset('img/career/hero-zoom.png') }}" alt="Zoom Meeting House Ilmu Indonesia">
                        </div>
                        <div class="career-hero-slide">
                            <img src="{{ asset('img/career/hero-zoom.png') }}" alt="House Ilmu Indonesia Team Session">
                        </div>
                        <div class="career-hero-slide">
                            <img src="{{ asset('img/career/hero-zoom.png') }}" alt="House Ilmu Indonesia Community">
                        </div>

                        <button type="button" class="career-hero-nav-btn prev" id="careerHeroPrev" aria-label="Slide sebelumnya">
                            <i class="fa-solid fa-chevron-left" style="font-size: 0.9rem;"></i>
                        </button>
                        <button type="button" class="career-hero-nav-btn next" id="careerHeroNext" aria-label="Slide berikutnya">
                            <i class="fa-solid fa-chevron-right" style="font-size: 0.9rem;"></i>
                        </button>
                    </div>

                    <div class="career-hero-dots" id="careerHeroDots">
                        <button type="button" class="career-hero-dot active" data-slide="0" aria-label="Slide 1"></button>
                        <button type="button" class="career-hero-dot" data-slide="1" aria-label="Slide 2"></button>
                        <button type="button" class="career-hero-dot" data-slide="2" aria-label="Slide 3"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End career hero section -->

        <!-- Start career page title section -->
    <section class="career-title container-xl mt-5">
        <div class="career-title-container d-flex flex-column align-items-start align-items-md-center" data-aos="fade">
            <h1 class="py-4 px-3 px-md-0" style="color: #1746A2;">Grow Together With Us</h1>
            <p class="fs-4 col-12 col-md-10 px-3 px-md-0">Jangan sia-siakan kesempatan ini! Ayo, bergabung dengan kami
                di House Ilmu. Jadilah bagian dari kami bersama tim yang seru dan penuh semangat!</p>
        </div>
    </section>
    <!-- End career page title section -->

    <!-- Start career culture section -->
    <section class="culture container-fluid mt-5" style="background-color: #FF9900;">
        <div class="culture-container container-xxl d-flex flex-column align-items-center">
            <h1 class="py-4 mt-4" style="color: #1746A2;" data-aos="fade-left">Our Culture</h1>
            <!-- Start culture icons -->
            <div class="culture-icons d-flex flex-wrap justify-content-center align-items-center mb-5" data-aos="fade-right">
                <div class="cultures d-flex flex-column align-items-center mx-2 mx-md-2 mx-lg-4 ">
                    <!-- <img class="py-3" src="../assets/img/logo.png" alt=""> -->
                    <i class="fa-regular fa-smile fs-1 py-3"></i>
                    <p class="fw-semibold text-light">Fun</p>
                </div>
                <div class="cultures d-flex flex-column align-items-center mx-2 mx-md-2 mx-lg-4 ">
                    <!-- <img class="py-3" src="../assets/img/logo.png" alt=""> -->
                    <i class="fa-solid fa-lightbulb fs-1 py-3"></i>
                    <p class="fw-semibold text-light">Innovative</p>
                </div>
                <div class="cultures d-flex flex-column align-items-center mx-2 mx-md-2 mx-lg-4 ">
                    <!-- <img class="py-3" src="../assets/img/logo.png" alt=""> -->
                    <i class="fa fa-balance-scale fs-1 py-3"></i>
                    <p class="fw-semibold text-light">Equitable</p>
                </div>
                <div class="cultures d-flex flex-column align-items-center mx-2 mx-md-2 mx-lg-4 ">
                    <!-- <img class="py-3" src="../assets/img/logo.png" alt=""> -->
                    <i class="fa fa-book fs-1 py-3"></i>
                    <p class="fw-semibold text-light">Learning</p>
                </div>
                <div class="cultures d-flex flex-column align-items-center mx-2 mx-md-2 mx-lg-4 ">
                    <!-- <img class="py-3" src="../assets/img/logo.png" alt=""> -->
                    <i class="fa-solid fa-clock fs-1 py-3"></i>
                    <p class="fw-semibold text-light">Discipline</p>
                </div>
                <div class="cultures d-flex flex-column align-items-center mx-2 mx-md-2 mx-lg-4 ">
                    <!-- <img class="py-3" src="../assets/img/logo.png" alt=""> -->
                    <i class="fa fa-heart fs-1 py-3"></i>
                    <p class="fw-semibold text-light">Caring</p>
                </div>
                <div class="cultures d-flex flex-column align-items-center mx-2 mx-md-2 mx-lg-4 ">
                    <!-- <img class="py-3" src="../assets/img/logo.png" alt=""> -->
                    <i class=" fa fa-comments fs-1 py-3"></i>
                    <p class="fw-semibold text-light">Communication</p>
                </div>
            </div>
            <!-- End culture icons -->
        </div>
    </section>
    <!-- End career culture section -->

    <!-- Start career alumni section -->
    <section class="alumni container-xl mt-5">
        <div class="alumni-container container-xl d-flex flex-column justify-content-center align-items-center">
            <h1 class="col-12 text-center fw-bold py-4 my-2" style="color: #083D77;" data-aos="fade-down">
                From the Alumni to You
            </h1>
            
            <!-- Start Splide alumni -->
            <div id="alumniSplide" class="splide my-4 w-100" data-aos="fade-up">
                <div class="splide__track">
                    <ul class="splide__list">
                        @forelse($testimoniAlumni as $alumni)
                            <li class="splide__slide p-4 rounded-lg" style="background: white; box-shadow: 0 8px 25px rgba(8, 61, 119, 0.15); border: 1px solid rgba(8, 61, 119, 0.1); min-height: 250px; display: flex; flex-direction: column;">
                                <!-- Profile section - Left aligned -->
                                <div class="alumni-profile-section d-flex align-items-start mb-3 pb-3" style="border-bottom: 2px solid #f8f9fa;">
                                    <div class="alumni-img me-3" style="flex-shrink: 0;">
                                        @if($alumni->testimoni_alumni_img)
                                            <img style="width: 65px; height: 65px; object-fit: cover; border: 3px solid #083D77; box-shadow: 0 4px 12px rgba(8, 61, 119, 0.3);" 
                                                src="{{ Storage::url($alumni->testimoni_alumni_img) }}" 
                                                alt="{{ $alumni->testimoni_alumni_name }}"
                                                class="rounded-circle">
                                        @else
                                            <img style="width: 65px; height: 65px; object-fit: cover; border: 3px solid #083D77; box-shadow: 0 4px 12px rgba(8, 61, 119, 0.3);" 
                                                src="{{ asset('img/logo.png') }}" 
                                                alt="logo house ilmu"
                                                class="rounded-circle">
                                        @endif
                                    </div>
                                    <div class="alumni-details text-start" style="flex-grow: 1;">
                                        <p class="alumni-name mb-1" style="font-size: 1.1rem; font-weight: 700; color: #083D77; margin: 0;">{{ $alumni->testimoni_alumni_name }}</p>
                                        <p class="alumni-position" style="font-size: 0.9rem; color: #6c757d; margin: 0; font-weight: 500; font-style: italic;">{{ $alumni->testimoni_alumni_position }}</p>
                                    </div>
                                </div>
                                
                                <!-- Testimonial text - Centered -->
                                <div class="testimonial-content d-flex align-items-center justify-content-center text-center" style="flex-grow: 1; position: relative;">
                                    <p style="font-size: 1rem; line-height: 1.6; color: #495057; font-weight: 600; font-style: italic; white-space: normal; word-break: break-word; overflow-wrap: break-word; width: 100%; margin: 0;">
                                        "{{ $alumni->testimoni_alumni_description }}"
                                    </p>
                                </div>
                            </li>
                        @empty
                            <!-- Fallback jika tidak ada data -->
                            <li class="splide__slide p-4 rounded-lg" style="background: white; box-shadow: 0 8px 25px rgba(8, 61, 119, 0.15); border: 1px solid rgba(8, 61, 119, 0.1); min-height: 250px; display: flex; flex-direction: column;">
                                <!-- Profile section - Left aligned -->
                                <div class="alumni-profile-section d-flex align-items-start mb-3 pb-3" style="border-bottom: 2px solid #f8f9fa;">
                                    <div class="alumni-img me-3" style="flex-shrink: 0;">
                                        <img style="width: 65px; height: 65px; object-fit: cover; border: 3px solid #083D77; box-shadow: 0 4px 12px rgba(8, 61, 119, 0.3);" 
                                            src="{{ asset('img/logo.png') }}" 
                                            alt="logo house ilmu"
                                            class="rounded-circle">
                                    </div>
                                    <div class="alumni-details text-start" style="flex-grow: 1;">
                                        <p class="alumni-name mb-1" style="font-size: 1.1rem; font-weight: 700; color: #083D77; margin: 0;">Testimoni akan segera tersedia</p>
                                        <p class="alumni-position" style="font-size: 0.9rem; color: #6c757d; margin: 0; font-weight: 500; font-style: italic;">House Ilmu Team</p>
                                    </div>
                                </div>
                                
                                <!-- Testimonial text - Centered -->
                                <div class="testimonial-content d-flex align-items-center justify-content-center text-center" style="flex-grow: 1;">
                                    <p style="font-size: 1rem; line-height: 1.6; color: #495057; font-weight: 600; font-style: italic; white-space: normal; word-break: break-word; overflow-wrap: break-word; width: 100%; margin: 0;">
                                        "Testimoni alumni akan ditampilkan di sini setelah data dimasukkan melalui admin panel."
                                    </p>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- End Splide alumni -->
        </div>
    </section>

    <!-- Start career info section -->
    <section id="career-info" class="career-info container-xl mt-5">
        <div class="career-info-container container-xl d-flex flex-column justify-content-center align-items-center">
            <h1 class="py-4" style="color: #1746A2;">Career Oportunity</h1>
            <div
                class="career-box container-xl d-flex flex-column justify-content-around align-items-center text-light">
                <!-- Start order box // membuat agar urutan tampilan box berbeda ketika display mobile dan desktop -->
                <div class="order-box-1 container-xl d-flex flex-wrap justify-content-center align-items-stretch">
                    <!-- Start career info apply box -->
                    <div class="career-link odd col-12 col-md-5 col-lg-4 order-0 order-md-0 d-flex flex-column rounded-4 p-5 m-2"
                        data-aos="fade-right">
                        <h2 class="fw-bold py-2 py-xl-3">CEO</h2>
                        <h2 class="fw-bold py-1 opacity-0 d-xl-none">CEO</h2>
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="py-4 rounded-4" href="/career/ceo"><span class="fw-bold p-3 rounded-4">See
                                    More...</span></a>
                        </div>
                    </div>
                    <!-- Start career info apply box -->
                    <!-- Start career info apply box -->
                    <div class="career-link odd col-12 col-md-5 col-lg-4 order-1 order-md-1 d-flex flex-column rounded-4 p-5 m-2"
                        data-aos="fade-left">
                        <h2 class="fw-bold py-3">Human Capital</h2>
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="py-4 rounded-4" href="/career/human-capital"><span class="fw-bold p-3 rounded-4">See
                                    More...</span></a>
                        </div>
                    </div>
                    <!-- Start career info apply box -->
                    <!-- Start career info apply box -->
                    <div class="career-link even col-12 col-md-5 col-lg-4 order-2 order-md-2 d-flex flex-column rounded-4 p-5 m-2"
                        data-aos="fade-right">
                        <h2 class="fw-bold py-3">Product Development</h2>
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="py-4 rounded-4" href="/career/product-development"><span
                                    class="fw-bold p-3 rounded-4">See More...</span></a>
                        </div>
                    </div>
                    <!-- Start career info apply box -->
                    <!-- Start career info apply box -->
                    <div class="career-link even col-12 col-md-5 col-lg-4 order-3 order-md-3 d-flex flex-column rounded-4 p-5 m-2"
                        data-aos="fade-left">
                        <h2 class="fw-bold py-3">Business Development</h2>
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="py-4 rounded-4" href="/career/business-development"><span
                                    class="fw-bold p-3 rounded-4">See More...</span></a>
                        </div>
                    </div>
                    <!-- Start career info apply box -->
                </div>
                <!-- End order box // membuat agar urutan tampilan box berbeda ketika display mobile dan desktop -->

                <!-- Start order box // membuat agar urutan tampilan box berbeda ketika display mobile dan desktop -->
                <div class="order-box-2 container-xl d-flex flex-wrap justify-content-center align-items-start">
                    <!-- Start career info apply box -->
                    <div class="career-link odd col-12 col-md-5 col-lg-4 order-0 order-md-0 d-flex flex-column rounded-4 p-5 m-2"
                        data-aos="fade-right">
                        <h2 class="fw-bold py-3">Technology</h2>
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="py-4 rounded-4" href="/career/technology"><span class="fw-bold p-3 rounded-4">See
                                    More...</span></a>
                        </div>
                    </div>
                    <!-- Start career info apply box -->
                    <!-- Start career info apply box -->
                    <div class="career-link odd col-12 col-md-5 col-lg-4 order-1 order-md-1 d-flex flex-column rounded-4 p-5 m-2"
                        data-aos="fade-left">
                        <h2 class="fw-bold py-3">Marketing</h2>
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="py-4 rounded-4" href="/career/marketing"><span class="fw-bold p-3 rounded-4">See
                                    More...</span></a>
                        </div>
                    </div>
                    <!-- Start career info apply box -->
                    <!-- Start career info apply box -->
                    <!-- <div class="career-link even col-12 col-md-5 col-lg-4 order-1 order-md-2 d-flex flex-column rounded-4 p-5 m-2"
                        data-aos="fade-right">
                        <h2 class="fw-bold py-3">COO</h2>
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="py-4 rounded-4" href="coo/"><span class="fw-bold p-3 rounded-4">See
                                    More...</span></a>
                        </div>
                    </div> -->
                    <!-- Start career info apply box -->
                    <!-- Start career info apply box -->
                    <!-- <div class="career-link even col-12 col-md-5 col-lg-4 order-3 order-md-3 d-flex flex-column rounded-4 p-5 m-2"
                        data-aos="fade-left">
                        <h2 class="fw-bold py-3">Human Capital</h2>
                        <div class="d-flex justify-content-start align-items-center">
                            <a class="py-4 rounded-4" href="human-capital/"><span class="fw-bold p-3 rounded-4">See
                                    More...</span></a>
                        </div>
                    </div> -->
                    <!-- Start career info apply box -->
                </div>
                <!-- End order box // membuat agar urutan tampilan box berbeda ketika display mobile dan desktop -->
            </div>
        </div>
    </section>
    <!-- End career info section -->

    <!-- Start recruitment announcement section -->
    <section id="recruitment-announcement" class="recruitment-announcement-section container-xl mt-5">
        <div class="d-flex flex-column align-items-center text-center" data-aos="fade-up">
            <h2 class="recruitment-announcement-title">Recruitment Announcement</h2>
            <p class="recruitment-announcement-subtitle">
                Informasi resmi proses seleksi dan pengumuman hasil rekrutmen House Ilmu Indonesia.
            </p>

            @php
                $status = $announcement->status ?? 'selesai';

                if ($status === 'dibuka') {
                    $badgeText = $announcement->open_badge ?? 'PENDAFTARAN DIBUKA';
                    $badgeBg = '#e8f5e9';
                    $badgeColor = '#2e7d32';
                    $cardTitle = $announcement->open_title ?? 'Pendaftaran Relawan Batch 6 Telah Dibuka!';
                    $cardDesc = $announcement->open_description ?? 'Ayo bergabung bersama keluarga besar House Ilmu Indonesia. Pilih divisi yang sesuai dengan potensimu sekarang.';
                    $btnText = $announcement->open_button_text ?? 'Jelajahi Lowongan';
                    $btnUrl = $announcement->open_button_url ?? '#career-info';
                    $btnIcon = 'fa-solid fa-arrow-down';
                } elseif ($status === 'stay_tuned') {
                    $badgeText = $announcement->stay_tuned_badge ?? 'STAY TUNED';
                    $badgeBg = '#fef3c7';
                    $badgeColor = '#b45309';
                    $cardTitle = $announcement->stay_tuned_title ?? 'Proses Seleksi Sedang Berlangsung';
                    $cardDesc = $announcement->stay_tuned_description ?? 'Terima kasih atas antusiasme Kawaners yang telah mendaftar. Tim kami sedang meninjau berkas pendaftaran. Pantau terus informasi selanjutnya di sini!';
                    $btnText = $announcement->stay_tuned_button_text ?? 'Pantau Instagram';
                    $btnUrl = $announcement->stay_tuned_button_url ?? 'https://www.instagram.com/houseilmu.id';
                    $btnIcon = 'fa-solid fa-arrow-up-right-from-square';
                } else {
                    $badgeText = $announcement->closed_badge ?? 'REKRUTMEN SELESAI';
                    $badgeBg = '#fff3e0';
                    $badgeColor = '#f57c00';
                    $cardTitle = $announcement->closed_title ?? 'Pengumuman Hasil Seleksi Rekrutmen';
                    $cardDesc = $announcement->closed_description ?? 'Terima kasih kepada seluruh Kawaners yang telah mengikuti seluruh rangkaian seleksi. Yuk periksa daftar nama yang lolos ke tahap onboarding.';
                    $btnText = $announcement->closed_button_text ?? 'Lihat Pengumuman';
                    $btnUrl = $announcement->closed_button_url ?? route('career.announcement');
                    $btnIcon = 'fa-solid fa-arrow-up-right-from-square';
                }
            @endphp

            <!-- Announcement Card -->
            <div class="recruitment-announcement-card text-start">
                <div class="recruitment-card-body">
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-1">
                        <span style="background-color: {{ $badgeBg }}; color: {{ $badgeColor }}; font-size: 0.72rem; font-weight: 700; padding: 4px 12px; border-radius: 999px; letter-spacing: 0.04em; text-transform: uppercase;">
                            {{ $badgeText }}
                        </span>
                        <span class="recruitment-batch-label">
                            {{ $announcement->batch_label ?? 'Batch 6 Urgent Hiring – Official Announcement' }}
                        </span>
                    </div>
                    <h3 class="recruitment-card-heading">{{ $cardTitle }}</h3>
                    <p class="recruitment-card-text">
                        {{ $cardDesc }}
                    </p>
                </div>
                @if(!empty($btnText) && !empty($btnUrl))
                    <div class="recruitment-card-action">
                        <a href="{{ $btnUrl }}" class="btn-lihat-pengumuman" {{ str_starts_with($btnUrl, 'http') ? 'target="_blank" rel="noopener noreferrer"' : '' }}>
                            <span>{{ $btnText }}</span>
                            <i class="{{ $btnIcon }}" style="font-size: 0.78rem;"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End recruitment announcement section -->

    <!-- Start career message section -->
    <section class="message container-xl my-5">
        <div class="message-container container-xl d-flex flex-column justify-content-center align-items-center">
            <h1 class="py-4 text-center"><span id="text-blue">Let’s</span> <span id="text-orange">Learn</span> <span
                    id="text-blue">,</span> <span id="text-orange">Grow</span> <span id="text-blue">and</span> <span
                    id="text-orange">Get <br> Achievement</span> <span id="text-blue">Together</span> </h1>
            <div class="message-sosmed col-md-10 col-lg-6 d-flex flex-column justify-content-center align-items-center p-5 rounded-4"
                style="background-color: #FF9900;">
                <h2 class="col-8 text-center text-light fw-bold">Any Question?</h2>
                <div class="sosmed d-flex flex-column flex-md-row justify-content-center align-items-center py-4">
                    <!-- Start message via email -->
                    <div class="sosmed col-12 d-flex flex-column align-items-center my-2 my-md-0"  data-aos="fade-right">
                        <h4 class="fw-bold" style="color: #1746A2;">Email</h4>
                        <i class="fa-regular fa-envelope my-2" style="color: #1746a2;"></i>
                        <a href="mailto:houseilmu.id@gmail.com" target="_blank"
                            class="py-2 px-4 rounded-4 fw-bold border border-1 border-dark-subtle hover:scale-110">Chat</a>
                    </div>
                    <!-- End message via email -->
                    <!-- Start message via instagram -->
                    <div class="sosmed col-12 d-flex flex-column align-items-center my-2 my-md-0"  data-aos="fade-left">
                        <h4 class="fw-bold" style="color: #1746A2;">Instagram</h4>
                        <i class="fa-brands fa-instagram my-2" style="color: #1746a2;"></i>
                        <a href="https://www.instagram.com/houseilmu.id" target="_blank"
                            class="py-2 px-4 rounded-4 fw-bold border border-1 border-dark-subtle hover:scale-110">Chat</a>
                    </div>
                    <!-- End message via instagram -->
                </div>
            </div>
        </div>
    </section>
    <!-- End career message section -->
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hero Slider
        const slides = document.querySelectorAll('#careerHeroSlider .career-hero-slide');
        const dots = document.querySelectorAll('#careerHeroDots .career-hero-dot');
        const prevBtn = document.getElementById('careerHeroPrev');
        const nextBtn = document.getElementById('careerHeroNext');
        let currentSlide = 0;

        function goToSlide(index) {
            if (!slides.length) return;
            currentSlide = (index + slides.length) % slides.length;
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === currentSlide);
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentSlide);
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                goToSlide(currentSlide - 1);
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                goToSlide(currentSlide + 1);
            });
        }
        dots.forEach((dot) => {
            dot.addEventListener('click', function () {
                const idx = parseInt(this.getAttribute('data-slide'), 10);
                goToSlide(idx);
            });
        });
    });
</script>
@endsection