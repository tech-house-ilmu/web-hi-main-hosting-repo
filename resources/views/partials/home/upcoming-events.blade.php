<!-- Upcoming Event Section (Figma Exact Implementation) -->
<section id="upcoming-events" class="upcoming-events-section" data-aos="fade-up">
    <div class="upcoming-events-container">
        <!-- Section Header -->
        <div class="upcoming-events-header">
            <h2 class="upcoming-events-title">
                UPCOMING EVENT
            </h2>
            <div class="upcoming-events-divider"></div>
            <p class="upcoming-events-subtitle">
                Pantau agenda belajar dan ruang kolaborasi terbaru dari House Ilmu Indonesia.
            </p>
        </div>

        @php
            // Ambil event aktif dari database (diinput melalui Admin Site / Filament)
            $activeDbEvents = isset($events) && $events->count() > 0 ? $events : collect();
        @endphp

        @if($activeDbEvents->count() > 0)
            <!-- Active Events Grid (Diinput melalui Admin Site) -->
            <div class="upcoming-events-grid">
                @foreach($activeDbEvents as $item)
                    @php
                        $firstImg = null;
                        if (!empty($item->images)) {
                            $firstImg = is_array($item->images) ? ($item->images[0] ?? null) : $item->images;
                        }
                        $imgUrl = null;
                        if ($firstImg) {
                            if (file_exists(public_path('storage/' . $firstImg))) {
                                $imgUrl = asset('storage/' . $firstImg);
                            } elseif (file_exists(public_path($firstImg))) {
                                $imgUrl = asset($firstImg);
                            } elseif (str_starts_with($firstImg, 'http')) {
                                $imgUrl = $firstImg;
                            }
                        }
                        $desc = Str::limit(strip_tags($item->description ?? ''), 120);
                        $link = $item->registration_link ?: route('programme.programmes');
                    @endphp

                    <article class="upcoming-event-card">
                        <!-- Event Poster Image -->
                        <div class="upcoming-event-img-wrap">
                            @if(!empty($imgUrl))
                                <img src="{{ $imgUrl }}"
                                     alt="{{ $item->title }}"
                                     class="upcoming-event-img"
                                     loading="lazy"
                                     decoding="async" />
                            @else
                                <div class="upcoming-event-placeholder">
                                    <i class="fa-regular fa-image" aria-hidden="true"></i>
                                    <span>POSTER EVENT</span>
                                </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="upcoming-event-body">
                            <div>
                                <div class="upcoming-event-meta">
                                    <span class="upcoming-event-badge">
                                        {{ $item->tagline ?: 'House Ilmu Event' }}
                                    </span>
                                    <span class="upcoming-event-status">
                                        Pendaftaran Dibuka
                                    </span>
                                </div>

                                <h3 class="upcoming-event-name" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </h3>

                                <div class="upcoming-event-schedule">
                                    <p class="upcoming-event-sched-desc">
                                        {{ $desc }}
                                    </p>
                                </div>
                            </div>

                            <div class="upcoming-event-footer">
                                <a href="{{ $link }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="upcoming-event-link">
                                    <span>Daftar / Info Lengkap</span>
                                    <span class="upcoming-event-arrow">&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Bottom Action CTA -->
            <div class="upcoming-events-action-wrap">
                <a href="{{ route('programme.programmes') }}"
                   class="upcoming-events-action-btn">
                    <span>Lihat Riwayat Kegiatan</span>
                    <span class="upcoming-events-action-arrow">&rarr;</span>
                </a>
            </div>
        @else
            <div class="upcoming-events-coming-soon-wrap" data-aos="zoom-in">
                <div style="display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; gap:10px; padding:28px 20px; color:#fff;">
                    <div style="font-size:20px; font-weight:800; letter-spacing:0.08em; text-transform:uppercase;">Coming Soon</div>
                    <p style="margin:0; max-width:700px; font-size:15px; line-height:1.7; color:rgba(255,255,255,0.9);">
                        Tim House Ilmu Indonesia sedang menyiapkan kegiatan dan kesempatan baru. Nantikan informasi selanjutnya.
                    </p>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
/* ==========================================================================
   Upcoming Events Section - 1:1 Pixel-Perfect Figma Specification
   ========================================================================== */
.upcoming-events-section {
    width: 100%;
    background-color: #205EB6;
    padding-top: 52px;
    padding-bottom: 54px;
    color: #ffffff;
    box-sizing: border-box;
    overflow: hidden;
}

.upcoming-events-container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
}

/* Header */
.upcoming-events-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 38px;
}

.upcoming-events-title,
.upcoming-events-title * {
    font-family: 'Libre Baskerville', Georgia, serif !important;
}

.upcoming-events-title {
    font-weight: 700;
    font-size: 28px;
    line-height: 35px;
    letter-spacing: -0.68px;
    color: #FFFFFF;
    text-transform: uppercase;
    margin: 0;
}

.upcoming-events-divider {
    width: 48px;
    height: 3px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin-top: 12px;
    margin-bottom: 12px;
}

.upcoming-events-subtitle {
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

/* Cards Grid (W: 1140, Gap: 26px) */
.upcoming-events-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 26px;
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
}

@media (min-width: 640px) {
    .upcoming-events-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .upcoming-events-grid {
        grid-template-columns: repeat(3, minmax(0, 363px));
        justify-content: center;
    }
}

/* Card Container (W: 363, H: 570) */
.upcoming-event-card {
    background-color: #FFFFFF;
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 363px;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

@media (min-width: 1024px) {
    .upcoming-event-card {
        height: 570px;
    }
}

.upcoming-event-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.16);
}

/* Poster Box (W: 363, H: 272) */
.upcoming-event-img-wrap {
    width: 100%;
    height: 272px;
    overflow: hidden;
    background-color: #f1f5f9;
    flex-shrink: 0;
}

.upcoming-event-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.upcoming-event-placeholder {
    width: 100%;
    height: 100%;
    background-color: #DDE4ED;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: #8C9BAE;
}

.upcoming-event-placeholder i {
    font-size: 36px;
    color: #8C9BAE;
}

.upcoming-event-placeholder span {
    font-family: 'Poppins', sans-serif !important;
    font-size: 11px !important;
    font-weight: 700 !important;
    letter-spacing: 0.08em !important;
    color: #8C9BAE !important;
}

.upcoming-event-card:hover .upcoming-event-img {
    transform: scale(1.04);
}

/* Card Body (W: 363, H: 298, Padding: 23px) */
.upcoming-event-body {
    width: 100%;
    box-sizing: border-box;
    padding: 23px;
    background-color: #FFFFFF;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex: 1;
}

@media (min-width: 1024px) {
    .upcoming-event-body {
        height: 298px;
    }
}

/* Meta: Pill Badge & Status Tag */
.upcoming-event-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}

.upcoming-event-badge {
    display: inline-flex;
    align-items: center;
    background-color: #EAF2FF;
    color: #1656A5;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 11.5px;
    line-height: 16px;
    letter-spacing: 0;
    padding: 4px 10px;
    border-radius: 15px;
}

.upcoming-event-status {
    color: #E46F0A;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 11.5px;
    line-height: 16px;
    letter-spacing: 0;
}

/* Card Title (Libre Baskerville 20px / 27px, tracking: -0.5px, #0A2A59) */
.upcoming-event-name,
.upcoming-event-name * {
    font-family: 'Libre Baskerville', Georgia, serif !important;
}

.upcoming-event-name {
    font-weight: 700;
    font-size: 20px;
    line-height: 27px;
    letter-spacing: -0.5px;
    color: #0A2A59;
    margin-top: 14px;
    margin-bottom: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 54px;
}

/* Schedule Info */
.upcoming-event-schedule {
    margin-top: 14px;
}

.upcoming-event-time {
    display: block;
    color: #F47B0E;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 12.5px;
    line-height: 18px;
    letter-spacing: 0;
}

.upcoming-event-sched-desc {
    color: #68778C;
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 13px;
    line-height: 19.5px;
    letter-spacing: 0;
    margin-top: 3px;
    margin-bottom: 0;
}

/* Card Bottom Link */
.upcoming-event-footer {
    margin-top: auto;
    padding-top: 14px;
}

.upcoming-event-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #EE7A0B;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 13px;
    line-height: 18px;
    letter-spacing: 0;
    text-decoration: none;
    transition: color 0.15s ease;
}

.upcoming-event-link:hover {
    color: #D96C07;
}

.upcoming-event-link:hover .upcoming-event-arrow {
    transform: translateX(3px);
}

.upcoming-event-arrow {
    display: inline-block;
    transition: transform 0.15s ease;
}

/* Bottom CTA Action Button (H: 42px) */
.upcoming-events-action-wrap {
    display: flex;
    justify-content: center;
    margin-top: 38px;
}

.upcoming-events-action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 13px;
    width: auto;
    min-width: 195px;
    height: 42px;
    padding: 10px 22px;
    box-sizing: border-box;
    background-color: #FF8B18;
    border: 1px solid #E8730C;
    border-radius: 8px;
    color: #FFFFFF;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 13px;
    line-height: 1;
    letter-spacing: 0;
    text-decoration: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
}

.upcoming-events-action-btn:hover {
    background-color: #E8730C;
    box-shadow: 0 4px 12px rgba(232, 115, 12, 0.35);
    transform: translateY(-1px);
}

.upcoming-events-action-btn:active {
    transform: translateY(0);
}

.upcoming-events-action-arrow {
    display: inline-block;
    font-size: 13px;
    line-height: 1;
    transition: transform 0.15s ease;
}

.upcoming-events-action-btn:hover .upcoming-events-action-arrow {
    transform: translateX(3px);
}

/* Tablet & Mobile (< 1024px): poster mengikuti rasio, bukan tinggi fix */
@media (max-width: 1023px) {
    .upcoming-event-img-wrap {
        height: auto;
        aspect-ratio: 4 / 3;
    }
}

/* Mobile (< 640px) */
@media (max-width: 639px) {
    .upcoming-events-section {
        padding-top: 40px;
        padding-bottom: 44px;
    }
    .upcoming-events-header {
        margin-bottom: 28px;
    }
    .upcoming-events-title {
        font-size: 22px;
        line-height: 30px;
    }
    .upcoming-events-subtitle {
        font-size: 13px;
        line-height: 20px;
    }
    .upcoming-events-grid {
        gap: 20px;
    }
    .upcoming-event-card {
        max-width: 420px;
    }
    .upcoming-event-body {
        padding: 18px;
    }
    .upcoming-event-name {
        font-size: 18px;
        line-height: 25px;
        min-height: 0;
    }
    .upcoming-events-action-wrap {
        margin-top: 28px;
    }
    .upcoming-events-action-btn {
        width: 100%;
        max-width: 320px;
    }
}

/* ==========================================================================
   Coming Soon State Styling
   ========================================================================== */
.upcoming-events-coming-soon-wrap {
    width: 100%;
    max-width: 760px;
    margin: 0 auto;
}

.upcoming-events-coming-soon-card {
    background: #FFFFFF;
    border-radius: 16px;
    padding: 44px 32px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.upcoming-coming-soon-badge-row {
    margin-bottom: 20px;
}

.upcoming-coming-soon-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background-color: #FFF3E6;
    color: #FF8A18;
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.08em;
    padding: 6px 14px;
    border-radius: 9999px;
    border: 1px solid #FFE4C7;
}

.pulse-indicator {
    width: 8px;
    height: 8px;
    background-color: #FF8A18;
    border-radius: 50%;
    display: inline-block;
    box-shadow: 0 0 0 0 rgba(255, 138, 24, 0.7);
    animation: pulseRing 1.8s infinite;
}

@keyframes pulseRing {
    0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(255, 138, 24, 0.7);
    }
    70% {
        transform: scale(1);
        box-shadow: 0 0 0 6px rgba(255, 138, 24, 0);
    }
    100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(255, 138, 24, 0);
    }
}

.upcoming-coming-soon-icon-circle {
    width: 68px;
    height: 68px;
    border-radius: 50%;
    background-color: #205EB6;
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    margin-bottom: 22px;
    box-shadow: 0 6px 18px rgba(32, 94, 182, 0.25);
}

.upcoming-coming-soon-title {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 22px !important;
    line-height: 30px !important;
    color: #0A2B56 !important;
    margin: 0 0 14px 0;
    max-width: 540px;
}

.upcoming-coming-soon-desc {
    font-family: 'Poppins', sans-serif !important;
    font-size: 13.5px !important;
    line-height: 22px !important;
    color: #5E708A !important;
    margin: 0 0 28px 0;
    max-width: 580px;
}

.upcoming-coming-soon-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background-color: #FF8A18;
    color: #FFFFFF !important;
    font-family: 'Poppins', sans-serif !important;
    font-size: 13px !important;
    font-weight: 700 !important;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(255, 138, 24, 0.3);
    transition: transform 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
}

.upcoming-coming-soon-btn:hover {
    background-color: #E8730C;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(255, 138, 24, 0.4);
    color: #FFFFFF !important;
}

@media (max-width: 639px) {
    .upcoming-events-coming-soon-card {
        padding: 32px 20px;
    }
    .upcoming-coming-soon-title {
        font-size: 19px !important;
        line-height: 26px !important;
    }
    .upcoming-coming-soon-desc {
        font-size: 12.5px !important;
        line-height: 20px !important;
    }
    .upcoming-coming-soon-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>
