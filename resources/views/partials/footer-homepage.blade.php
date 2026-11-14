<!-- Footer Section - 1:1 Pixel-Perfect Figma Implementation -->
<footer class="footer-section">
    <div class="footer-container">
        <!-- Main Footer Columns Grid -->
        <div class="footer-grid">
            <!-- Col 1: Brand & Slogan -->
            <div class="footer-col-brand">
                <a href="{{ route('home') }}" class="footer-logo-link" aria-label="House Ilmu Indonesia Home">
                    <img src="{{ asset('img/logo.webp') }}"
                         alt="House Ilmu Indonesia"
                         class="footer-logo-img" />
                </a>

                <!-- Slogan: Libre Baskerville 700, 26px / 36px, -0.5px -->
                <p class="footer-slogan">
                    Learn, Grow, and Get<br>
                    <span class="footer-highlight">Achievement</span><br>
                    Together
                </p>
            </div>

            <!-- Col 2: Menu Links -->
            <div class="footer-col-menu">
                <!-- Heading: Poppins 700, 13px / 18px, 0.8px -->
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
                <!-- Heading: Poppins 700, 13px / 18px, 0.8px -->
                <h4 class="footer-heading">
                    MEDIA SOSIAL
                </h4>
                <div class="footer-social-list">
                    <!-- LinkedIn: in badge (26x26) + text (13px) + ↗ -->
                    <a href="https://www.linkedin.com/company/house-ilmu-indonesia"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social-link">
                        <span class="footer-social-badge">in</span>
                        <span class="footer-social-text">LinkedIn</span>
                        <span class="footer-social-arrow">&#8599;</span>
                    </a>

                    <!-- Instagram: ig badge (26x26) + text (13px) + ↗ -->
                    <a href="https://www.instagram.com/houseilmu.id"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="footer-social-link">
                        <span class="footer-social-badge">ig</span>
                        <span class="footer-social-text">Instagram</span>
                        <span class="footer-social-arrow">&#8599;</span>
                    </a>

                    <!-- TikTok: tt badge (26x26) + text (13px) + ↗ -->
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
            <div class="footer-bottom-item footer-bottom-left">
                <a href="mailto:houseilmu.id@gmail.com" class="footer-link">houseilmu.id@gmail.com</a>
            </div>
            <div class="footer-bottom-item footer-bottom-center">
                &copy; {{ date('Y') }} House Ilmu Indonesia
            </div>
            <div class="footer-bottom-item footer-bottom-right">
                Hak cipta dilindungi.
            </div>
        </div>
    </div>
</footer>

