<!-- Our Partner & Collaborator Section (Figma Exact Implementation) -->
<section id="partners" class="our-partner-section" data-aos="fade-up">
    <div class="our-partner-container">
        <!-- Section Header -->
        <div class="our-partner-header">
            <h2 class="our-partner-title">
                OUR PARTNER &amp; COLLABORATOR
            </h2>
            <div class="our-partner-divider"></div>
            <p class="our-partner-subtitle">
                Ruang kolaborasi yang tumbuh bersama House Ilmu Indonesia.
            </p>
        </div>

        <!-- Partner Logos Frame (Max-W: 1140px, Bg: #DDE6F1, Radius: 12px) -->
        <div class="our-partner-frame">
            <div class="our-partner-grid">
                <!-- Tile 1: Girls Beyond -->
                <div class="our-partner-card our-partner-card-white">
                    <span class="our-partner-gb-top">GIRLS</span>
                    <span class="our-partner-gb-bottom">BEYOND</span>
                </div>

                <!-- Tile 2: IDEAL -->
                <div class="our-partner-card our-partner-card-white">
                    <span class="our-partner-ideal">ideal</span>
                </div>

                <!-- Tile 3: Pemimpin.id -->
                <div class="our-partner-card our-partner-card-navy">
                    <span class="our-partner-pemimpin-line">pe</span>
                    <span class="our-partner-pemimpin-line">mimpin</span>
                    <span class="our-partner-pemimpin-id">.id</span>
                </div>

                <!-- Tile 4: Phillip Sekuritas Indonesia -->
                <div class="our-partner-card our-partner-card-white">
                    @if(file_exists(public_path('img/homepage/logo-phillip-sekuritas.webp')))
                        <img src="{{ asset('img/homepage/logo-phillip-sekuritas.webp') }}"
                             alt="Phillip Sekuritas Indonesia"
                             class="our-partner-logo-img"
                             loading="lazy" />
                    @else
                        <div class="text-center">
                            <span class="font-bold text-[#0A2A59] text-sm block">Phillip</span>
                            <span class="text-[10px] text-[#68778C] block uppercase tracking-wider">Sekuritas Indonesia</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ==========================================================================
   Our Partner & Collaborator Section - 1:1 Pixel-Perfect Figma Specification
   ========================================================================== */
.our-partner-section {
    width: 100%;
    background-color: #FFF9F0;
    padding-top: 52px;
    padding-bottom: 56px;
    box-sizing: border-box;
    overflow: hidden;
}

.our-partner-container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
}

/* Header */
.our-partner-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 36px;
}

.our-partner-title,
.our-partner-title * {
    font-family: 'Libre Baskerville', Georgia, serif !important;
}

.our-partner-title {
    font-weight: 700;
    font-size: 28px;
    line-height: 35px;
    letter-spacing: -0.68px;
    color: #0A2A59;
    text-transform: uppercase;
    margin: 0;
}

.our-partner-divider {
    width: 48px;
    height: 3px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin-top: 12px;
    margin-bottom: 12px;
}

.our-partner-subtitle {
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

/* Partner Logos Frame (Max-W: 1140px, Bg: #DDE6F1) */
.our-partner-frame {
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
    background-color: #DDE6F1;
    border-radius: 12px;
    padding: 32px 28px;
    box-sizing: border-box;
}

@media (min-width: 640px) {
    .our-partner-frame {
        padding: 38px 36px;
    }
}

/* Grid: 4 columns across 1140px */
.our-partner-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
    align-items: center;
}

@media (min-width: 768px) {
    .our-partner-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
    }
}

/* Partner Card */
.our-partner-card {
    border-radius: 10px;
    min-height: 110px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 16px;
    box-sizing: border-box;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.our-partner-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.our-partner-card-white {
    background-color: #FFFFFF;
}

.our-partner-card-navy {
    background-color: #154279;
}

/* Brand Typography Specifics */
.our-partner-gb-top,
.our-partner-gb-bottom {
    font-family: 'Poppins', sans-serif;
    font-weight: 900;
    font-size: 14px;
    line-height: 1.1;
    letter-spacing: 0.15em;
    color: #111827;
    text-transform: uppercase;
}

.our-partner-gb-bottom {
    margin-top: 3px;
}

.our-partner-ideal {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 24px;
    line-height: 1;
    letter-spacing: -0.05em;
    color: #1E5FA8;
    text-transform: lowercase;
}

.our-partner-pemimpin-line {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 13.5px;
    line-height: 1.15;
    color: #FFFFFF;
}

.our-partner-pemimpin-id {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 13.5px;
    line-height: 1.15;
    color: #FF8B18;
}

.our-partner-logo-img {
    max-height: 48px;
    max-width: 85%;
    width: auto;
    object-fit: contain;
}

/* Mobile (< 640px) */
@media (max-width: 639px) {
    .our-partner-section {
        padding-top: 40px;
        padding-bottom: 44px;
    }
    .our-partner-header {
        margin-bottom: 28px;
    }
    .our-partner-title {
        font-size: 22px;
        line-height: 30px;
    }
    .our-partner-subtitle {
        font-size: 13px;
        line-height: 20px;
    }
    .our-partner-frame {
        padding: 16px;
    }
    .our-partner-grid {
        gap: 12px;
    }
    .our-partner-card {
        min-height: 90px;
        padding: 12px;
    }
}
</style>
