<!-- Hero Section (Optimized UI/UX Balanced Hierarchy) -->
<style>
    .hi-hero-section {
        background-color: #FFF9F0;
        width: 100%;
        min-height: 520px;
        display: flex;
        align-items: center;
        padding: 56px 0;
        box-sizing: border-box;
        overflow: hidden;
    }
    @media (min-width: 1024px) {
        .hi-hero-section {
            min-height: 540px;
            padding: 68px 0;
        }
    }
    .hi-hero-container {
        width: 100%;
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        box-sizing: border-box;
    }
    @media (min-width: 1024px) {
        .hi-hero-container {
            flex-direction: row;
            align-items: center;
            gap: 48px;
        }
    }

    /* Left Column: Heading, Paragraph, CTA */
    .hi-hero-content {
        width: 100%;
        max-width: 540px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .hi-hero-h1,
    .hi-hero-h1 * {
        font-family: 'Libre Baskerville', Georgia, serif !important;
    }
    .hi-hero-h1 {
        width: 100%;
        max-width: 540px;
        font-weight: 700;
        font-size: 32px;
        line-height: 1.2;
        letter-spacing: -0.025em;
        color: #0B2247;
        margin: 0 0 18px 0;
    }
    @media (min-width: 640px) {
        .hi-hero-h1 {
            font-size: 40px;
            line-height: 1.18;
        }
    }
    @media (min-width: 1024px) {
        .hi-hero-h1 {
            font-size: 46px;
            line-height: 52px;
            letter-spacing: -1.2px;
        }
    }

    .hi-hero-p {
        width: 100%;
        max-width: 480px;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 15px;
        line-height: 26px;
        letter-spacing: 0;
        color: #3B4B61;
        margin: 0 0 28px 0;
    }

    /* Primary CTA Button (44px touch-target, 14px bold, premium glow) */
    .hi-hero-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        height: 44px;
        padding: 0 24px;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 1;
        letter-spacing: 0.01em;
        color: #FFFFFF !important;
        background-color: #FF8A16;
        border: 1px solid #E8730C;
        border-radius: 8px;
        text-decoration: none;
        box-shadow: 0 4px 16px rgba(255, 138, 22, 0.28);
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        box-sizing: border-box;
    }
    .hi-hero-btn:hover {
        background-color: #E5760E;
        box-shadow: 0 6px 20px rgba(255, 138, 22, 0.38);
        transform: translateY(-2px);
    }
    .hi-hero-btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 8px rgba(255, 138, 22, 0.2);
    }
    .hi-hero-btn span.arrow {
        font-size: 14px;
        line-height: 1;
        transition: transform 0.2s ease;
    }
    .hi-hero-btn:hover span.arrow {
        transform: translate(2px, -2px);
    }

    /* Right Column: Figure (W-540, H-315, Radius-12, #0A2A59) */
    .hi-hero-figure-wrapper {
        width: 100%;
        max-width: 540px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .hi-hero-figure {
        position: relative;
        width: 100%;
        max-width: 540px;
        height: 260px;
        background-color: #0A2A59;
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 16px 40px rgba(11, 34, 71, 0.12);
    }
    @media (min-width: 640px) {
        .hi-hero-figure {
            height: 315px;
        }
    }
    .hi-hero-figure img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
        display: block;
    }
    .hi-hero-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(10, 42, 89, 0.88);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        backdrop-filter: blur(4px);
        transition: all 0.2s ease;
        z-index: 10;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    .hi-hero-arrow:hover {
        background-color: #0A2A59;
        transform: translateY(-50%) scale(1.08);
    }
    .hi-hero-arrow.prev {
        left: 14px;
    }
    .hi-hero-arrow.next {
        right: 14px;
    }
    .hi-hero-dots {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-top: 16px;
    }
    .hi-hero-dot {
        border: none;
        padding: 0;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    .hi-hero-dot.active {
        width: 22px;
        height: 7px;
        background-color: #FF8A16;
        border-radius: 9999px;
    }
    .hi-hero-dot.inactive {
        width: 7px;
        height: 7px;
        background-color: #CBD5E1;
        border-radius: 50%;
    }
    .hi-hero-dot.inactive:hover {
        background-color: #94A3B8;
    }

    /* Mobile (< 640px) */
    @media (max-width: 639px) {
        .hi-hero-section {
            min-height: auto;
            padding: 28px 0 36px;
        }
        .hi-hero-container {
            padding: 0 18px;
            gap: 28px;
        }
        .hi-hero-content {
            width: 100%;
            max-width: 100%;
        }
        .hi-hero-h1 {
            width: 100%;
            max-width: 100%;
            font-size: 26px;
            line-height: 1.25;
            margin-bottom: 12px;
        }
        .hi-hero-p {
            width: 100%;
            max-width: 100%;
            font-size: 13.5px;
            line-height: 22px;
            margin-bottom: 20px;
        }
        .hi-hero-btn {
            width: 100%;
        }
        .hi-hero-figure-wrapper {
            width: 100%;
            max-width: 100%;
        }
        .hi-hero-figure {
            width: 100%;
            height: auto;
            aspect-ratio: 16 / 10;
        }
        .hi-hero-arrow {
            width: 34px;
            height: 34px;
        }
        .hi-hero-arrow.prev {
            left: 10px;
        }
        .hi-hero-arrow.next {
            right: 10px;
        }
    }
</style>

<section class="hi-hero-section">
    <div class="hi-hero-container">
        <!-- Left Column: Copy & Action Button -->
        <div class="hi-hero-content" data-aos="fade-right">
            <h1 class="hi-hero-h1">
                Learn, Grow, and Get<br>
                Achievement Together
            </h1>

            <p class="hi-hero-p">
                House Ilmu hadir sebagai teman yang menemani setiap proses belajar, berkembang, dan mempersiapkan masa depan.
            </p>

            <a href="#our-programs" class="hi-hero-btn">
                <span>Jelajahi Semua Program</span>
                <span class="arrow">↗</span>
            </a>
        </div>

        <!-- Right Column: Slide Figure Mockup -->
        <div class="hi-hero-figure-wrapper" data-aos="fade-left">
            <div x-data="{
                activeSlide: 0,
                timer: null,
                slides: [
                    {
                        img: '{{ asset('img/homepage/banner-cindy2.webp') }}',
                        alt: 'House Ilmu Indonesia'
                    }
                ],
                init() {
                    if (this.slides.length > 1) {
                        this.startAuto();
                    }
                },
                startAuto() {
                    this.stopAuto();
                    this.timer = setInterval(() => {
                        this.next();
                    }, 5000);
                },
                stopAuto() {
                    if (this.timer) clearInterval(this.timer);
                },
                next() {
                    this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                },
                prev() {
                    this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                }
            }"
            @mouseenter="stopAuto()"
            @mouseleave="if (slides.length > 1) startAuto()"
            class="w-full flex flex-col items-center">
                <!-- Slide Box (Responsive 16:9.5, Radius-12, #0A2A59) -->
                <div class="hi-hero-figure">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="activeSlide === index"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="absolute inset-0 w-full h-full">
                            <img :src="slide.img"
                                 :alt="slide.alt"
                                 loading="eager"
                                 fetchpriority="high" />
                        </div>
                    </template>

                    <!-- Navigation Arrows (only if multi-slide) -->
                    <template x-if="slides.length > 1">
                        <div>
                            <button type="button"
                                    @click="prev()"
                                    class="hi-hero-arrow prev"
                                    aria-label="Previous Slide">
                                <i class="fa-solid fa-chevron-left text-xs"></i>
                            </button>
                            <button type="button"
                                    @click="next()"
                                    class="hi-hero-arrow next"
                                    aria-label="Next Slide">
                                <i class="fa-solid fa-chevron-right text-xs"></i>
                            </button>
                        </div>
                    </template>
                </div>

                <!-- Slide Dots Indicator (only if multi-slide) -->
                <template x-if="slides.length > 1">
                    <div class="hi-hero-dots">
                        <template x-for="(slide, index) in slides" :key="index">
                            <button type="button"
                                    @click="activeSlide = index"
                                    class="hi-hero-dot"
                                    :class="activeSlide === index ? 'active' : 'inactive'"
                                    :aria-label="'Go to slide ' + (index + 1)">
                            </button>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>
<!-- Hero / Banner Section -->
<section class="banner w-full bg-[#FFF8F0]">
  <div class="banner-container max-w-[1440px] mx-auto min-h-[660px] pt-12 sm:pt-16 lg:pt-[88px] pb-12 sm:pb-16 lg:pb-[72px] px-6 sm:px-10 lg:px-[80px] flex flex-col lg:flex-row items-center gap-8 lg:gap-[48px]">
    <!-- Banner Text -->
    <div class="banner-text w-full lg:flex-1 lg:max-w-[615px] flex flex-col items-start text-left" data-aos="fade-right">
      <!-- Top Badge -->
      <div class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-[#FFF2E5] text-[#FF731D] text-xs md:text-sm font-bold tracking-wider uppercase mb-5">
        HOUSE ILMU INDONESIA
      </div>

      <!-- Headline -->
      <h1 class="font-black text-3xl sm:text-4xl md:text-5xl lg:text-[3.25rem] text-[#152A5E] leading-[1.15] mb-6">
        Learn, Connect, and Grow Through Our Programs
      </h1>

      <!-- Description -->
      <p class="text-[#44464E] text-base md:text-lg leading-relaxed mb-8 max-w-xl">
        House Ilmu Indonesia menghadirkan berbagai program untuk membantu mahasiswa dan anak muda untuk mengenal career path, mengembangkan skill, menemukan opportunity, dan mendapatkan pengalaman nyata tentang dunia kerja.
      </p>

      <!-- CTA Button -->
      <a href="#our-programs"
         class="inline-flex items-center px-5 py-2.5 rounded-full bg-[#FFA516] text-[#152A5E] font-bold text-sm border-2 border-[#152A5E] shadow-[0_4px_12px_rgba(255,165,22,0.35)] transition-all duration-300 hover:bg-[#ff9500] hover:shadow-[0_6px_16px_rgba(255,165,22,0.45)] hover:scale-105 active:scale-95 cursor-pointer">
        Explore Our Programs
      </a>
    </div>
    <!-- End Banner Text -->

    <!-- Banner Visual Card -->
    <div class="banner-img w-full lg:w-[617px] lg:flex-shrink-0 flex justify-center lg:justify-end items-center" data-aos="fade-left">
      <div class="relative w-full aspect-[617/500] max-w-[617px] lg:w-[617px] lg:h-[500px] bg-[#0A1F44] rounded-[16px] overflow-hidden flex items-end justify-center">
        <img src="{{ asset('img/homepage/banner-cindy2.webp') }}" alt="House Ilmu Indonesia" class="h-full w-auto max-w-full object-contain object-bottom transition duration-500 hover:scale-105" fetchpriority="high" decoding="sync" width="617" height="500" />
      </div>
    </div>
    <!-- End Banner Visual Card -->
  </div>
</section>
