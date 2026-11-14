<!-- Our Programme Section (Figma Exact Implementation) -->
<section id="our-programs" class="our-programme-section" data-aos="fade-up">
    <div class="our-programme-container">
        <!-- Section Header -->
        <div class="our-programme-header">
            <h2 class="our-programme-title">
                OUR PROGRAMME
            </h2>
            <div class="our-programme-divider"></div>
            <p class="our-programme-subtitle">
                Temukan program yang bisa membantumu belajar, berkembang, dan mempersiapkan langkah berikutnya.
            </p>
        </div>

        @php
            $displayPrograms = !empty($programs) ? $programs : config('homepage.programs', []);
        @endphp

        <!-- 6 Compact Cards Grid (3 Columns, Gap: 26px, Max-W: 1140px) -->
        <div class="our-programme-grid">
            @foreach($displayPrograms as $prog)
                <article class="our-programme-card">
                    <div class="our-programme-card-top">
                        <h3 class="our-programme-card-title">
                            {{ $prog['title'] }}
                        </h3>
                        <p class="our-programme-card-desc">
                            {{ $prog['description'] }}
                        </p>
                    </div>

                    <div class="our-programme-card-bottom">
                        <a href="{{ isset($prog['route']) ? route($prog['route']) : route('programme.programmes') }}"
                           class="our-programme-link">
                            <span>Selengkapnya</span>
                            <span class="our-programme-link-arrow">&#8599;</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Bottom Action CTA (Min-W: 187px, H: 36px, #FFFFFF, border: #FF8B18, text: #FF8B18, r: 7px) -->
        <div class="our-programme-action-wrap">
            <a href="{{ route('programme.programmes') }}"
               class="our-programme-action-btn">
                <span>Jelajahi Semua Program</span>
                <span class="our-programme-action-arrow">&rarr;</span>
            </a>
        </div>
    </div>
</section>

<style>
/* ==========================================================================
   Our Programme Section - 1:1 Pixel-Perfect Figma Specification
   ========================================================================== */
.our-programme-section {
    width: 100%;
    background-color: #FFF9F0;
    padding-top: 52px;
    padding-bottom: 54px;
    box-sizing: border-box;
    overflow: hidden;
}

.our-programme-container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
}

/* Header */
.our-programme-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 38px;
}

.our-programme-title,
.our-programme-title * {
    font-family: 'Libre Baskerville', Georgia, serif !important;
}

.our-programme-title {
    font-weight: 700;
    font-size: 28px;
    line-height: 35px;
    letter-spacing: -0.68px;
    color: #FF8B18;
    text-transform: uppercase;
    margin: 0;
}

.our-programme-divider {
    width: 48px;
    height: 3px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin-top: 12px;
    margin-bottom: 12px;
}

.our-programme-subtitle {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0;
    color: #68778C;
    max-width: 580px;
    margin: 0 auto;
    text-align: center;
}

/* Grid: 3 columns (363px each), gap 26px, max-w 1140px */
.our-programme-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 26px;
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
}

@media (min-width: 640px) {
    .our-programme-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .our-programme-grid {
        grid-template-columns: repeat(3, minmax(0, 363px));
        justify-content: center;
    }
}

/* Card: rounded 10px, border 1px solid #ECEEF2, drop shadow, bg #FFFFFF */
.our-programme-card {
    background-color: #FFFFFF;
    border: 1px solid #ECEEF2;
    border-radius: 10px;
    box-shadow: 0 4px 14px rgba(10, 42, 89, 0.05);
    padding: 22px 24px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    max-width: 363px;
    margin-left: auto;
    margin-right: auto;
    min-height: 180px;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
}

.our-programme-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 24px rgba(10, 42, 89, 0.1);
    border-color: #E2E8F0;
}

.our-programme-card-top {
    margin-bottom: 14px;
}

/* Card Title: Libre Baskerville 19px / 26px, bold 700, #0A2A59 */
.our-programme-card-title,
.our-programme-card-title * {
    font-family: 'Libre Baskerville', Georgia, serif !important;
}

.our-programme-card-title {
    font-weight: 700;
    font-size: 19px;
    line-height: 26px;
    letter-spacing: -0.4px;
    color: #0A2A59;
    margin: 0 0 10px 0;
}

/* Card Description: Poppins 13px / 20px, regular 400, #68778C */
.our-programme-card-desc {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 13px;
    line-height: 20px;
    letter-spacing: 0;
    color: #68778C;
    margin: 0;
}

/* Card Bottom Link: Poppins 13px / 18px, extrabold 800, #EE7A0B */
.our-programme-card-bottom {
    margin-top: auto;
    padding-top: 10px;
}

.our-programme-link {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 13px;
    line-height: 18px;
    color: #EE7A0B;
    text-decoration: none;
    transition: color 0.15s ease;
}

.our-programme-link:hover {
    color: #D96C07;
}

.our-programme-link-arrow {
    display: inline-block;
    font-size: 13px;
    transition: transform 0.15s ease;
}

.our-programme-link:hover .our-programme-link-arrow {
    transform: translate(2px, -2px);
}

/* Bottom CTA Button: H: 42px, Pad: 10px 22px, Gap: 13px, r: 8px, border: 1px solid #FF8B18, text: #FF8B18 */
.our-programme-action-wrap {
    display: flex;
    justify-content: center;
    margin-top: 38px;
}

.our-programme-action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 13px;
    width: auto;
    min-width: 195px;
    height: 42px;
    padding: 10px 22px;
    box-sizing: border-box;
    background-color: #FFFFFF;
    border: 1px solid #FF8B18;
    border-radius: 8px;
    color: #FF8B18;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 13px;
    line-height: 1;
    letter-spacing: 0;
    text-decoration: none;
    box-shadow: 0 2px 6px rgba(255, 139, 24, 0.08);
    transition: all 0.2s ease;
}

.our-programme-action-btn:hover {
    background-color: #FF8B18;
    color: #FFFFFF;
    border-color: #FF8B18;
    box-shadow: 0 4px 14px rgba(255, 139, 24, 0.35);
    transform: translateY(-1px);
}

.our-programme-action-btn:active {
    transform: translateY(0);
}

.our-programme-action-arrow {
    display: inline-block;
    font-size: 13px;
    line-height: 1;
    transition: transform 0.15s ease;
}

.our-programme-action-btn:hover .our-programme-action-arrow {
    transform: translateX(3px);
}

/* Tablet & Mobile (< 1024px): kartu mengisi kolom grid */
@media (max-width: 1023px) {
    .our-programme-card {
        max-width: none;
    }
}

/* Mobile (< 640px) */
@media (max-width: 639px) {
    .our-programme-section {
        padding-top: 40px;
        padding-bottom: 44px;
    }
    .our-programme-header {
        margin-bottom: 28px;
    }
    .our-programme-title {
        font-size: 22px;
        line-height: 30px;
    }
    .our-programme-subtitle {
        font-size: 13px;
        line-height: 20px;
    }
    .our-programme-grid {
        gap: 16px;
    }
    .our-programme-card {
        min-height: 0;
        padding: 20px;
    }
    .our-programme-card-title {
        font-size: 17px;
        line-height: 24px;
    }
    .our-programme-action-wrap {
        margin-top: 28px;
    }
    .our-programme-action-btn {
        width: 100%;
        max-width: 320px;
    }
}
</style>
