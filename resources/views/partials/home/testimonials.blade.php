<!-- Testimonials Section (Figma Exact Implementation) -->
<section id="testimonials" class="testimonials-section" data-aos="fade-up">
    <div class="testimonials-container">
        <!-- Section Header -->
        <div class="testimonials-header">
            <h2 class="testimonials-title">
                WHAT THEY SAY ABOUT HI
            </h2>
            <div class="testimonials-divider"></div>
            <p class="testimonials-subtitle">
                Cerita dan pengalaman dari peserta serta relawan kami.
            </p>
        </div>

        @php
            $displayTestis = !empty($testimonials) ? $testimonials : config('homepage.testimonials', []);
        @endphp

        <!-- Testimonials Cards Carousel Wrapper -->
        <div class="testimonials-wrapper">
            <!-- Left Arrow Button (30x30, #FF8A18, r: 50%) -->
            <button type="button"
                    class="testimonials-nav-btn testimonials-nav-prev"
                    aria-label="Previous Testimonial">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <!-- 3 Cards Container (W: 337, H: 235, r: 10px, p: 22px) -->
            <div class="testimonials-cards-grid">
                @foreach($displayTestis as $testi)
                    <article class="testimonials-card">
                        <!-- Orange Quote Icon -->
                        <div class="testimonials-quote-mark">&ldquo;</div>

                        <!-- Quote Body (11px / 18.1px, #142B51) -->
                        <p class="testimonials-quote-text">
                            {{ $testi['quote'] }}
                        </p>

                        <!-- Card Footer: Author + Read More -->
                        <div class="testimonials-card-footer">
                            <div class="testimonials-author">
                                <div class="testimonials-avatar">
                                    {{ $testi['initial'] ?? substr($testi['name'], 0, 1) }}
                                </div>
                                <div class="testimonials-author-meta">
                                    <b class="testimonials-author-name">{{ $testi['name'] }}</b>
                                    <small class="testimonials-author-role">{{ $testi['role'] }}</small>
                                </div>
                            </div>

                            <!-- Read More Link (11px / 16.5px, 800, #EE7A0B) -->
                            <a href="{{ route('article.index') }}" class="testimonials-link">
                                <span>Baca Selengkapnya</span>
                                <span class="testimonials-arrow">&rarr;</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Right Arrow Button (30x30, #FF8A18, r: 50%) -->
            <button type="button"
                    class="testimonials-nav-btn testimonials-nav-next"
                    aria-label="Next Testimonial">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<style>
/* ==========================================================================
   What They Say About HI Section - 1:1 Pixel-Perfect Figma Specification
   ========================================================================== */
.testimonials-section {
    width: 100%;
    background-color: #205EB6;
    padding-top: 52px;
    padding-bottom: 56px;
    color: #ffffff;
    box-sizing: border-box;
}

.testimonials-container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
}

/* Header */
.testimonials-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 38px;
}

.testimonials-title {
    font-family: 'Libre Baskerville', Georgia, serif;
    font-weight: 700;
    font-size: 28px;
    line-height: 35px;
    letter-spacing: -0.68px;
    color: #FFFFFF;
    text-transform: uppercase;
    margin: 0;
}

.testimonials-divider {
    width: 48px;
    height: 3px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin-top: 12px;
    margin-bottom: 12px;
}

.testimonials-subtitle {
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

/* Carousel / Grid Wrapper */
.testimonials-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
}

/* Navigation Arrow Buttons: 36x36, #FF8A18, radius 50% */
.testimonials-nav-btn {
    display: none;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #FF8A18;
    color: #FFFFFF;
    border: none;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    font-size: 13px;
    flex-shrink: 0;
    transition: background-color 0.2s ease, transform 0.15s ease;
    z-index: 10;
}

.testimonials-nav-btn:hover {
    background-color: #E8730C;
    transform: scale(1.08);
}

.testimonials-nav-btn:active {
    transform: scale(0.96);
}

@media (min-width: 768px) {
    .testimonials-nav-btn {
        display: flex;
    }
}

.testimonials-nav-prev {
    margin-right: 14px;
}

.testimonials-nav-next {
    margin-left: 14px;
}

/* Cards Grid: 3 cards, each 337px */
.testimonials-cards-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    width: 100%;
    justify-items: center;
}

@media (min-width: 640px) {
    .testimonials-cards-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .testimonials-cards-grid {
        grid-template-columns: repeat(3, 337px);
        justify-content: center;
    }
}

/* Card: W: 337px, Min-H: 280px, p: 26px, r: 10px, #FFFFFF, drop shadow */
.testimonials-card {
    background-color: #FFFFFF;
    border-radius: 10px;
    width: 100%;
    max-width: 337px;
    min-height: 280px;
    padding: 26px 24px 26px 24px;
    box-sizing: border-box;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.testimonials-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.14);
}

/* Orange Quote Mark */
.testimonials-quote-mark {
    font-family: Georgia, serif;
    font-weight: 700;
    font-size: 30px;
    line-height: 1;
    color: #FF8A18;
    margin-bottom: 8px;
}

/* Quote Text: 13.5px / 21.5px, #142B51 */
.testimonials-quote-text {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 13.5px;
    line-height: 21.5px;
    letter-spacing: 0;
    color: #142B51;
    margin: 0 0 18px 0;
    flex-grow: 1;
}

/* Card Footer: Generous breathing room between Author and Read More */
.testimonials-card-footer {
    display: flex;
    flex-direction: column;
    gap: 18px;
    margin-top: auto;
    padding-top: 14px;
}

/* Author Row */
.testimonials-author {
    display: flex;
    align-items: center;
    gap: 10px;
}

.testimonials-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: #EAF2FF;
    color: #1E5FA8;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.testimonials-author-meta {
    display: flex;
    flex-direction: column;
    line-height: 1.25;
}

/* Author Name: 12.5px / 17px, bold 700, #142B51 */
.testimonials-author-name {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 12.5px;
    line-height: 17px;
    letter-spacing: 0;
    color: #142B51;
}

/* Author Role: 11.5px / 16px, regular 400, #738197 */
.testimonials-author-role {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 11.5px;
    line-height: 16px;
    letter-spacing: 0;
    color: #738197;
}

/* Read More Link: 13px / 18px, 800, #EE7A0B with proper spacing */
.testimonials-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 13px;
    line-height: 18px;
    letter-spacing: 0;
    color: #EE7A0B;
    text-decoration: none;
    transition: color 0.15s ease;
    width: fit-content;
}

.testimonials-link:hover {
    color: #D96C07;
}

.testimonials-arrow {
    display: inline-block;
    transition: transform 0.15s ease;
}

.testimonials-link:hover .testimonials-arrow {
    transform: translateX(3px);
}
</style>
