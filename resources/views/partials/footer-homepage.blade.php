<!-- Footer Section - 1:1 Pixel-Perfect Figma Implementation -->
<footer class="footer-section">
    <div class="footer-container">
        <!-- Main Footer Columns Grid -->
        <div class="footer-grid">
            <!-- Col 1: Brand & Slogan (W: 360px) -->
            <div class="footer-col-brand">
                <a href="{{ route('home') }}" class="footer-logo-link" aria-label="House Ilmu Indonesia Home">
                    <img src="{{ asset('img/logo.webp') }}"
                         alt="House Ilmu Indonesia"
                         class="footer-logo-img" />
                </a>

                <!-- Slogan: Libre Baskerville 700, 25px / 34.6px, -0.5px -->
                <p class="footer-slogan">
                    Learn, Grow, and Get<br>
                    <span class="footer-highlight">Achievement</span><br>
                    Together
                </p>
            </div>

            <!-- Col 2: Menu Links -->
            <div class="footer-col-menu">
                <!-- Heading: Poppins 700, 12px / 18px, 0.72px -->
                <h4 class="footer-heading">
                    MENU
                </h4>
                <ul class="footer-menu-list">
                    <li>
                        <a href="{{ route('programme.programmes') }}" class="footer-link">
                            HI Program
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('programme.hi.index') }}" class="footer-link">
                            Kesempatan HI
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('partnership.index') }}" class="footer-link">
                            Kolaborasi Komunitas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('article.index') }}" class="footer-link">
                            Artikel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('career.index') }}" class="footer-link">
                            Join HI
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="footer-link">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('programme.programmes') }}" class="footer-link">
                            Riwayat Kegiatan
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Col 3: Media Sosial -->
            <div class="footer-col-social">
                <!-- Heading: Poppins 700, 12px / 18px, 0.72px -->
                <h4 class="footer-heading">
                    MEDIA SOSIAL
                </h4>
                <div class="footer-social-list">
                    <!-- LinkedIn: in badge (24x24) + text (11px) + ↗ -->
                    <a href="https://www.linkedin.com/company/house-ilmu-indonesia"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social-link">
                        <span class="footer-social-badge">in</span>
                        <span class="footer-social-text">LinkedIn</span>
                        <span class="footer-social-arrow">&#8599;</span>
                    </a>

                    <!-- Instagram: ig badge (24x24) + text (11px) + ↗ -->
                    <a href="https://www.instagram.com/houseilmu.id"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social-link">
                        <span class="footer-social-badge">ig</span>
                        <span class="footer-social-text">Instagram</span>
                        <span class="footer-social-arrow">&#8599;</span>
                    </a>

                    <!-- TikTok: tt badge (24x24) + text (11px) + ↗ -->
                    <a href="https://www.tiktok.com/@houseilmu.id"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social-link">
                        <span class="footer-social-badge">tt</span>
                        <span class="footer-social-text">TikTok</span>
                        <span class="footer-social-arrow">&#8599;</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright Bar -->
        <div class="footer-bottom">
            <div class="footer-bottom-text">houseilmu.id@gmail.com</div>
            <div class="footer-bottom-text">Hak cipta dilindungi.</div>
        </div>
    </div>
</footer>

<style>
/* ==========================================================================
   Footer Section - 1:1 Pixel-Perfect Figma Specification
   ========================================================================== */
.footer-section {
    width: 100%;
    background-color: #205EB6;
    padding-top: 59px;
    padding-bottom: 18px;
    color: #FFFFFF;
    box-sizing: border-box;
}

.footer-container {
    width: 100%;
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
}

/* 3 Columns Layout */
.footer-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 36px;
    padding-bottom: 38px;
}

@media (min-width: 768px) {
    .footer-grid {
        grid-template-columns: minmax(320px, 1.4fr) minmax(180px, 1fr) minmax(180px, 1fr);
        gap: 48px;
    }
}

/* Col 1: Brand & Slogan */
.footer-col-brand {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.footer-logo-link {
    display: inline-block;
    margin-bottom: 20px;
}

.footer-logo-img {
    width: 92px;
    height: 92px;
    border-radius: 50%;
    object-fit: contain;
    display: block;
}

/* Slogan: Libre Baskerville 700, 26px / 36px, -0.5px */
.footer-slogan {
    font-family: 'Libre Baskerville', Georgia, serif;
    font-weight: 700;
    font-size: 26px;
    line-height: 36px;
    letter-spacing: -0.5px;
    color: #FFFFFF;
    margin: 0;
    max-width: 370px;
}

.footer-highlight {
    color: #FF8A18;
}

/* Headings: Poppins 700, 13px / 18px, 0.8px */
.footer-heading {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 13px;
    line-height: 18px;
    letter-spacing: 0.8px;
    color: #FFFFFF;
    text-transform: uppercase;
    margin: 0 0 16px 0;
}

/* Menu List */
.footer-menu-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

/* Links: Poppins 400, 13px / 19px, #E5EFFD */
.footer-link {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 13px;
    line-height: 19px;
    letter-spacing: 0;
    color: #E5EFFD;
    text-decoration: none;
    transition: color 0.15s ease;
}

.footer-link:hover {
    color: #FF8A18;
}

/* Social List: Gap 14px */
.footer-social-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

/* Social Link Row: H: 26 Hug, Gap: 14px */
.footer-social-link {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    text-decoration: none;
    color: #E5EFFD;
    transition: color 0.15s ease;
}

.footer-social-link:hover {
    color: #FF8A18;
}

/* Social Badge: 26x26, circle, border 1px solid rgba(255,255,255,0.5), 10.5px extra bold */
.footer-social-badge {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 10.5px;
    line-height: 1;
    letter-spacing: -0.3px;
    color: #FFFFFF;
    flex-shrink: 0;
    transition: border-color 0.15s ease, color 0.15s ease;
}

.footer-social-link:hover .footer-social-badge {
    border-color: #FF8A18;
    color: #FF8A18;
}

/* Social Text: Poppins 500, 13px / 19px */
.footer-social-text {
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    font-size: 13px;
    line-height: 19px;
    letter-spacing: 0;
}

/* Social Diagonal Arrow */
.footer-social-arrow {
    font-size: 12px;
    line-height: 1;
    transition: transform 0.15s ease;
}

.footer-social-link:hover .footer-social-arrow {
    transform: translate(1px, -1px);
}

/* Bottom Bar: border-top 1px solid rgba(255,255,255,0.15), py: 18px */
.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.15);
    padding-top: 18px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    align-items: center;
    justify-content: space-between;
}

@media (min-width: 640px) {
    .footer-bottom {
        flex-direction: row;
        gap: 16px;
    }
}

.footer-bottom-text {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 12px;
    line-height: 18px;
    letter-spacing: 0;
    color: #E5EFFD;
}

@media (max-width: 767px) {
    .footer-section {
        padding-top: 42px;
        padding-bottom: 24px;
    }

    .footer-slogan {
        font-size: 21px;
        line-height: 30px;
    }
}
</style>
