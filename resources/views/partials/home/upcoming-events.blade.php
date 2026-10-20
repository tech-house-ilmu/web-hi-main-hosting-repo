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
            $displayEvents = !empty($upcomingEvents) ? $upcomingEvents : config('homepage.upcoming_events', []);
        @endphp

        <!-- Cards Grid -->
        <div class="upcoming-events-grid">
            @foreach($displayEvents as $item)
                <article class="upcoming-event-card">
                    <!-- Event Poster Image (363 x 272) -->
                    <div class="upcoming-event-img-wrap">
                        <img src="{{ asset($item['image']) }}"
                             alt="{{ $item['title'] }}"
                             class="upcoming-event-img"
                             loading="lazy"
                             decoding="async" />
                    </div>

                    <!-- Card Body (363 x 298, p: 23px) -->
                    <div class="upcoming-event-body">
                        <div>
                            <!-- Category Badge & Status -->
                            <div class="upcoming-event-meta">
                                <span class="upcoming-event-badge">
                                    {{ $item['category'] }}
                                </span>
                                <span class="upcoming-event-status">
                                    {{ $item['status'] }}
                                </span>
                            </div>

                            <!-- Title (Libre Baskerville 20px / 27px) -->
                            <h3 class="upcoming-event-name" title="{{ $item['title'] }}">
                                {{ $item['title'] }}
                            </h3>

                            <!-- Schedule Info -->
                            <div class="upcoming-event-schedule">
                                <time class="upcoming-event-time">
                                    {{ $item['schedule_badge'] }}
                                </time>
                                <p class="upcoming-event-sched-desc">
                                    {{ $item['schedule_text'] }}
                                </p>
                            </div>
                        </div>

                        <!-- Bottom Link (11px / 16.5px #EE7A0B) -->
                        <div class="upcoming-event-footer">
                            <a href="{{ $item['link'] ?? route('programme.programmes') }}"
                               class="upcoming-event-link">
                                <span>Lihat Lebih Banyak</span>
                                <span class="upcoming-event-arrow">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Bottom Action CTA (W: 187px, H: 36px, #FF8B18, border #E8730C, r: 7px) -->
        <div class="upcoming-events-action-wrap">
            <a href="{{ route('programme.programmes') }}"
               class="upcoming-events-action-btn">
                <span>Lihat Riwayat Kegiatan</span>
                <span class="upcoming-events-action-arrow">&rarr;</span>
            </a>
        </div>
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

.upcoming-events-title {
    font-family: 'Libre Baskerville', Georgia, serif;
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
        grid-template-columns: repeat(3, 363px);
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
        width: 363px;
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
.upcoming-event-name {
    font-family: 'Libre Baskerville', Georgia, serif;
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
</style>
