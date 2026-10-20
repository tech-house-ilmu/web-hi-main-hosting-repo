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
    .hi-hero-h1 {
        width: 100%;
        max-width: 540px;
        font-family: 'Libre Baskerville', Georgia, serif;
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
                slides: [
                    {
                        img: '{{ asset('img/homepage/banner-cindy2.webp') }}',
                        alt: 'House Ilmu Zoom Session Graduation'
                    },
                    {
                        img: '{{ asset('img/homepage/programme/review-cv.webp') }}',
                        alt: 'Review CV & Career Coaching'
                    },
                    {
                        img: '{{ asset('img/homepage/programme/sudut-karir2.webp') }}',
                        alt: 'Sudut Karir Mentoring Session'
                    }
                ],
                next() {
                    this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                },
                prev() {
                    this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                }
            }" class="w-full flex flex-col items-center">
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

                    <!-- Left Navigation Arrow -->
                    <button type="button"
                            @click="prev()"
                            class="hi-hero-arrow prev"
                            aria-label="Previous Slide">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>

                    <!-- Right Navigation Arrow -->
                    <button type="button"
                            @click="next()"
                            class="hi-hero-arrow next"
                            aria-label="Next Slide">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </div>

                <!-- Slide Dots Indicator -->
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
            </div>
        </div>
    </div>
</section>
