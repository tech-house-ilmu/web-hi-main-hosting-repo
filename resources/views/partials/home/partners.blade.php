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
                @php
                    $partnerList = $partners ?? config('homepage.partners', []);
                @endphp

                @foreach($partnerList as $partner)
                    @php
                        $name = $partner['name'] ?? '';
                        $logo = $partner['logo'] ?? null;
                        $type = $partner['type'] ?? 'logo_card';
                        $badgeTitle = $partner['badge_title'] ?? null;
                        $badgeSub = $partner['badge_sub'] ?? null;

                        $hasLogo = $logo && file_exists(public_path($logo));
                        // special casing for Pemimpin.id visual (keeps original styling if present)
                        $isPemimpin = str_contains(strtolower($name), 'pemimpin');
                    @endphp

                    <div class="our-partner-card {{ $isPemimpin ? 'our-partner-card-navy' : 'our-partner-card-white' }}">
                        @if($hasLogo)
                            <div class="our-partner-logo-wrap">
                                <img src="{{ asset($logo) }}"
                                     alt="{{ $name }}"
                                     class="our-partner-logo-img"
                                     loading="lazy" />
                            </div>
                        @else
                            {{-- text badge / fallback rendering --}}
                            @if($type === 'text_badge' && ($badgeTitle || $badgeSub))
                                @if($badgeSub)
                                    <span class="our-partner-gb-top">{{ strtoupper($badgeTitle) }}</span>
                                    <span class="our-partner-gb-bottom">{{ strtoupper($badgeSub) }}</span>
                                @else
                                    <span class="our-partner-ideal">{{ $badgeTitle }}</span>
                                @endif

                            @elseif($isPemimpin)
                                <span class="our-partner-pemimpin-line">{{ substr($name,0,2) }}</span>
                                <span class="our-partner-pemimpin-line">{{ trim(str_replace(['.id','Pemimpin','pemimpin'], '', $name)) }}</span>
                                <span class="our-partner-pemimpin-id">.id</span>

                            @else
                                {{-- generic text fallback --}}
                                <div class="text-center">
                                    <span class="font-bold text-[#0A2A59] text-sm block">{{ explode(' ', $name)[0] ?? $name }}</span>
                                    @if(strpos($name, ' ') !== false)
                                        <span class="text-[10px] text-[#68778C] block uppercase tracking-wider">{{ trim(str_replace(explode(' ', $name)[0], '', $name)) }}</span>
                                    @endif
                                </div>
                            @endif
                        @endif
                    </div>
                @endforeach

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
    border-radius: 12px;
    min-height: 104px;
    height: 104px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 12px 20px;
    box-sizing: border-box;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.our-partner-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.09);
}

.our-partner-card-white {
    background-color: #FFFFFF;
}

.our-partner-card-navy {
    background-color: #154279;
}

.our-partner-logo-wrap {
    width: 100%;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.our-partner-logo-img {
    max-height: 54px;
    max-width: 145px;
    width: auto;
    height: auto;
    object-fit: contain;
    border-radius: 6px;
    transition: transform 0.25s ease;
}

.our-partner-card:hover .our-partner-logo-img {
    transform: scale(1.04);
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
