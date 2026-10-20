<!-- Our Impact Section (Figma Exact Implementation) -->
<section id="our-impact" class="our-impact-section" data-aos="fade-up">
    <div class="our-impact-container">
        <!-- Section Header -->
        <div class="our-impact-header">
            <h2 class="our-impact-title">
                OUR IMPACT
            </h2>
            <div class="our-impact-divider"></div>
            <p class="our-impact-subtitle">
                Bersama House Ilmu Indonesia, belajar dan bertumbuh melalui berbagai program.
            </p>
        </div>

        @php
            $displayImpacts = !empty($impacts) ? $impacts : config('homepage.impacts', []);
        @endphp

        <!-- 4 Stat Cards Grid (4 x 1, Gap: 20px, Max-W: 1140px) -->
        <div class="our-impact-stats-grid">
            @foreach($displayImpacts as $impact)
                <div class="our-impact-stat-card">
                    <strong class="our-impact-stat-number">
                        {{ $impact['value'] }}
                    </strong>
                    <div class="our-impact-stat-divider"></div>
                    <span class="our-impact-stat-label">
                        {{ $impact['label'] }}
                    </span>
                </div>
            @endforeach
        </div>

        <!-- Indonesia Reach Map Container (2 x 1, Gap: 42px, Radius: 10px) -->
        <div class="our-impact-reach-container">
            <!-- Left Info (OUR REACH, 5, Title, Desc) -->
            <div class="our-impact-reach-info">
                <span class="our-impact-reach-tag">
                    OUR REACH
                </span>
                <strong class="our-impact-reach-num">
                    5
                </strong>
                <h3 class="our-impact-reach-title">
                    Jumlah Wilayah yang Terjangkau
                </h3>
                <p class="our-impact-reach-desc">
                    Relawan House Ilmu Indonesia telah bertumbuh dan memberikan dampak dari berbagai daerah Indonesia.
                </p>
            </div>

            <!-- Right Interactive / Mapbox Notice Card -->
            <div class="our-impact-reach-map">
                <div class="our-impact-map-content">
                    <h4 class="our-impact-map-title">
                        Peta interaktif siap diaktifkan
                    </h4>
                    <div class="our-impact-map-accent"></div>
                    <p class="our-impact-map-notice">
                        Tambahkan <span class="our-impact-map-key">MAPBOX_ACCESS_TOKEN</span> sebagai <span class="our-impact-map-key">VITE_MAPBOX_ACCESS_TOKEN</span> untuk memuat visualisasi Mapbox.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ==========================================================================
   Our Impact Section - 1:1 Pixel-Perfect Figma Specification
   ========================================================================== */
.our-impact-section {
    width: 100%;
    background-color: #205EB6;
    padding-top: 52px;
    padding-bottom: 56px;
    color: #ffffff;
    box-sizing: border-box;
}

.our-impact-container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
}

/* Header */
.our-impact-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 24px;
}

.our-impact-title {
    font-family: 'Libre Baskerville', Georgia, serif;
    font-weight: 700;
    font-size: 28px;
    line-height: 35px;
    letter-spacing: -0.68px;
    color: #FFFFFF;
    text-transform: uppercase;
    margin: 0;
}

.our-impact-divider {
    width: 48px;
    height: 3px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin-top: 12px;
    margin-bottom: 12px;
}

.our-impact-subtitle {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0;
    color: #FFFFFF;
    max-width: 580px;
    margin: 0 auto;
    text-align: center;
}

/* 4 Stat Cards Grid (4 x 1, Gap: 20px, Max-W: 1140px) */
.our-impact-stats-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 26px;
}

@media (min-width: 1024px) {
    .our-impact-stats-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

/* Stat Card (Radius: 10px, Bg: #FFFFFF, Shadow) */
.our-impact-stat-card {
    background-color: #FFFFFF;
    border-radius: 10px;
    padding: 22px 24px;
    box-sizing: border-box;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.our-impact-stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
}

.our-impact-stat-number {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 36px;
    line-height: 1.1;
    color: #0A2A59;
}

.our-impact-stat-divider {
    width: 24px;
    height: 2.5px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin-top: 8px;
    margin-bottom: 8px;
}

.our-impact-stat-label {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 13px;
    line-height: 18px;
    color: #68778C;
}

/* Indonesia Reach Map Container (2 x 1, Gap: 42px, Radius: 10px) */
.our-impact-reach-container {
    display: flex;
    flex-direction: column;
    gap: 28px;
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
    background: #174E99;
    border: 1px solid rgba(255, 255, 255, 0.14);
    border-radius: 10px;
    padding: 32px 36px;
    box-sizing: border-box;
}

@media (min-width: 1024px) {
    .our-impact-reach-container {
        flex-direction: row;
        align-items: center;
        gap: 42px;
        padding: 38px 44px;
    }
}

/* Left Reach Info */
.our-impact-reach-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    flex-shrink: 0;
    max-width: 320px;
}

.our-impact-reach-tag {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 12px;
    line-height: 17px;
    letter-spacing: 0.1em;
    color: #FF8B18;
    text-transform: uppercase;
    margin-bottom: 4px;
}

.our-impact-reach-num {
    font-family: 'Libre Baskerville', Georgia, serif;
    font-weight: 700;
    font-size: 56px;
    line-height: 1;
    color: #FFFFFF;
    margin-top: 2px;
    margin-bottom: 6px;
}

.our-impact-reach-title {
    font-family: 'Libre Baskerville', Georgia, serif;
    font-weight: 700;
    font-size: 22px;
    line-height: 29px;
    letter-spacing: -0.4px;
    color: #FFFFFF;
    margin: 0 0 10px 0;
}

.our-impact-reach-desc {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 13.5px;
    line-height: 21px;
    color: #D1E0F5;
    margin: 0;
}

/* Right Interactive Map Placeholder (Linear Gradient, Radius: 10px) */
.our-impact-reach-map {
    flex: 1;
    width: 100%;
    min-height: 240px;
    background: linear-gradient(135deg, #F8FAFC 0%, #EEF2F6 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 32px 24px;
    box-sizing: border-box;
    text-align: center;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.04);
}

.our-impact-map-content {
    max-width: 440px;
    margin: 0 auto;
}

.our-impact-map-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 14px;
    line-height: 20px;
    color: #0A2A59;
    margin: 0;
}

.our-impact-map-accent {
    width: 24px;
    height: 2px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin: 8px auto 12px auto;
}

.our-impact-map-notice {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 11px;
    line-height: 18px;
    color: #68778C;
    margin: 0;
}

.our-impact-map-key {
    color: #E46F0A;
    font-weight: 600;
    font-family: monospace;
    font-size: 10.5px;
}
</style>
