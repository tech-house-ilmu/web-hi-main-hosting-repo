<!-- Join & Collaborate (CTA) Section - 1:1 Pixel-Perfect Figma Implementation -->
<section id="join-collaborate" class="cta-section" data-aos="fade-up">
    <div class="cta-container">
        <!-- Section Title (H2): Libre Baskerville 700, 24px / 36px, -0.6px, #15549F -->
        <h2 class="cta-title">
            JOIN &amp; COLLABORATE
        </h2>

        <!-- Subtitle (P): Poppins 400, 11px / 16.5px, #586783 -->
        <p class="cta-subtitle">
            Mari belajar, terhubung, dan tumbuh bersama House Ilmu Indonesia.
        </p>

        <!-- CTA Buttons Group -->
        <div class="cta-actions">
            <!-- Primary Solid Orange Button: Gabung Bersama HI -->
            <a href="{{ route('career.index') }}" class="cta-btn cta-btn-primary">
                <span>Gabung Bersama HI</span>
                <span class="cta-btn-arrow">&#8599;</span>
            </a>

            <!-- Secondary Outline Orange Button: Ajukan Kolaborasi -->
            <a href="{{ route('partnership.index') }}" class="cta-btn cta-btn-secondary">
                <span>Ajukan Kolaborasi</span>
                <span class="cta-btn-arrow">&#8599;</span>
            </a>
        </div>
    </div>
</section>

<style>
/* ==========================================================================
   Join & Collaborate (CTA) Section Specification
   ========================================================================== */
.cta-section {
    width: 100%;
    background-color: #FFF9F0;
    padding-top: 42px;
    padding-bottom: 48px;
    box-sizing: border-box;
    overflow: hidden;
}

.cta-container {
    width: 100%;
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* H2 Title */
.cta-title,
.cta-title * {
    font-family: 'Libre Baskerville', Georgia, serif !important;
}

.cta-title {
    font-weight: 700;
    font-size: 28px;
    line-height: 38px;
    letter-spacing: -0.6px;
    color: #15549F;
    text-transform: uppercase;
    margin: 0 0 8px 0;
    text-align: center;
}

/* Subtitle */
.cta-subtitle {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0;
    color: #586783;
    margin: 0 0 22px 0;
    text-align: center;
}

/* Buttons Group */
.cta-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 16px;
}

/* Base CTA Button */
.cta-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    height: 42px;
    padding: 0 24px;
    border-radius: 8px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 13px;
    line-height: 1;
    text-decoration: none;
    box-sizing: border-box;
    transition: all 0.2s ease;
    cursor: pointer;
}

/* Primary Button (Solid Orange) */
.cta-btn-primary {
    background-color: #FF8A18;
    color: #FFFFFF;
    border: 1px solid #FF8A18;
    box-shadow: 0 2px 8px rgba(255, 138, 24, 0.25);
}

.cta-btn-primary:hover {
    background-color: #E8770E;
    border-color: #E8770E;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(255, 138, 24, 0.35);
}

.cta-btn-primary:active {
    transform: translateY(0);
}

/* Secondary Button (White + Orange Outline) */
.cta-btn-secondary {
    background-color: #FFFFFF;
    color: #FF8A18;
    border: 1.5px solid #FF8A18;
}

.cta-btn-secondary:hover {
    background-color: #FF8A18;
    color: #FFFFFF;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(255, 138, 24, 0.25);
}

.cta-btn-secondary:active {
    transform: translateY(0);
}

/* Diagonal Arrow Symbol */
.cta-btn-arrow {
    font-size: 13px;
    line-height: 1;
    transition: transform 0.15s ease;
}

.cta-btn:hover .cta-btn-arrow {
    transform: translate(1px, -1px);
}

@media (max-width: 640px) {
    .cta-section {
        padding-top: 36px;
        padding-bottom: 40px;
    }

    .cta-title {
        font-size: 20px;
        line-height: 30px;
    }

    .cta-subtitle {
        font-size: 13px;
        line-height: 20px;
        margin-bottom: 18px;
    }

    .cta-actions {
        width: 100%;
        flex-direction: column;
        gap: 10px;
    }

    .cta-btn {
        width: 100%;
        max-width: 280px;
    }
}
</style>
