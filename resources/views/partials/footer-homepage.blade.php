<footer class="bg-[#1856C9] text-white pt-14 pb-8 px-4 sm:px-6 lg:px-8 border-t border-blue-600/30">
    <div class="max-w-7xl mx-auto">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-12 items-start">
            
            <!-- Left Column: Logo & Slogan -->
            <div class="md:col-span-5 lg:col-span-6 flex flex-col items-start">
                <a href="{{ route('home') }}" class="inline-block group mb-4">
                    <img 
                        src="{{ asset('img/logo.webp') }}" 
                        alt="House Ilmu Indonesia" 
                        class="w-20 h-20 rounded-full object-cover shadow-sm transition-transform duration-300 group-hover:scale-105"
                    >
                </a>

                <h3 class="font-editorial text-2xl sm:text-3xl lg:text-[32px] font-bold text-white leading-snug tracking-tight">
                    Learn, Grow, and Get<br>
                    <span class="text-white">Achievement</span><br>
                    Together
                </h3>
            </div>

            <!-- Middle Column: Menu -->
            <div class="md:col-span-4 lg:col-span-3 flex flex-col font-sans-clean">
                <h4 class="text-xs sm:text-sm font-bold text-white uppercase tracking-wider mb-4">
                    MENU
                </h4>
                <ul class="space-y-2.5 text-xs sm:text-sm text-white font-normal list-none p-0 m-0">
                    <li>
                        <a href="{{ route('programme.programmes') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            HI Program
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('programme.hi.index') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Kesempatan HI
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('partnership.index') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Kolaborasi Komunitas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('article.index') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Artikel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('career.index') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Join HI
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/houseilmu.id" target="_blank" rel="noopener noreferrer" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Riwayat Kegiatan
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Right Column: Media Sosial -->
            <div class="md:col-span-3 lg:col-span-3 flex flex-col font-sans-clean">
                <h4 class="text-xs sm:text-sm font-bold text-white uppercase tracking-wider mb-4">
                    MEDIA SOSIAL
                </h4>
                <ul class="space-y-3.5 text-xs sm:text-sm text-white font-normal list-none p-0 m-0">
                    <li>
                        <a 
                            href="https://www.linkedin.com/company/house-ilmu-indonesia" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="inline-flex items-center gap-3 text-white hover:text-white/80 transition-colors group"
                        >
                            <span class="w-7 h-7 rounded-full border border-white/60 flex items-center justify-center text-xs font-semibold text-white group-hover:border-white">
                                in
                            </span>
                            <span class="font-medium">LinkedIn</span>
                            <span class="text-xs transform transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5">↗</span>
                        </a>
                    </li>
                    <li>
                        <a 
                            href="https://www.instagram.com/houseilmu.id" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="inline-flex items-center gap-3 text-white hover:text-white/80 transition-colors group"
                        >
                            <span class="w-7 h-7 rounded-full border border-white/60 flex items-center justify-center text-xs font-semibold text-white group-hover:border-white">
                                ig
                            </span>
                            <span class="font-medium">Instagram</span>
                            <span class="text-xs transform transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5">↗</span>
                        </a>
                    </li>
                    <li>
                        <a 
                            href="https://www.tiktok.com/@houseilmu.id" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="inline-flex items-center gap-3 text-white hover:text-white/80 transition-colors group"
                        >
                            <span class="w-7 h-7 rounded-full border border-white/60 flex items-center justify-center text-xs font-semibold text-white group-hover:border-white">
                                tt
                            </span>
                            <span class="font-medium">TikTok</span>
                            <span class="text-xs transform transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5">↗</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Divider Line -->
        <div class="border-t border-white/20 mt-12 mb-6"></div>

        <!-- Bottom Bar: Email, Copyright, Legal -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white font-sans-clean">
            <p>
                <a href="mailto:houseilmu.id@gmail.com" class="text-white hover:text-white/80 transition-colors">
                    houseilmu.id@gmail.com
                </a>
            </p>
            <p class="text-center text-white">
                &copy; {{ date('Y') }} House Ilmu Indonesia
            </p>
            <p class="text-right text-white">
                Hak cipta dilindungi.
            </p>
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
    overflow: hidden;
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
.footer-slogan,
.footer-slogan * {
    font-family: 'Libre Baskerville', Georgia, serif !important;
}

.footer-slogan {
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

    .footer-logo-img {
        width: 76px;
        height: 76px;
    }

    .footer-logo-link {
        margin-bottom: 14px;
    }

    .footer-slogan {
        font-size: 21px;
        line-height: 30px;
    }

    .footer-grid {
        gap: 30px;
        padding-bottom: 28px;
    }
}
</style>
