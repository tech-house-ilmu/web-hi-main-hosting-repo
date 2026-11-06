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
                    <span class="text-[#FF731D]">Achievement</span><br>
                    Together
                </h3>
            </div>

            <!-- Middle Column: Menu -->
            <div class="md:col-span-4 lg:col-span-3 flex flex-col font-sans-clean">
                <h4 class="text-xs sm:text-sm font-bold text-white uppercase tracking-wider mb-4">
                    MENU
                </h4>
                <ul class="space-y-2.5 text-xs sm:text-sm text-white/95 font-normal list-none p-0 m-0">
                    <li>
                        <a href="{{ route('programme.programmes') }}" class="hover:text-[#FF731D] transition-colors duration-150 inline-block">
                            HI Program
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('programme.hi.index') }}" class="hover:text-[#FF731D] transition-colors duration-150 inline-block">
                            Kesempatan HI
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('partnership.index') }}" class="hover:text-[#FF731D] transition-colors duration-150 inline-block">
                            Kolaborasi Komunitas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('article.index') }}" class="hover:text-[#FF731D] transition-colors duration-150 inline-block">
                            Artikel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('career.index') }}" class="hover:text-[#FF731D] transition-colors duration-150 inline-block">
                            Join HI
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="hover:text-[#FF731D] transition-colors duration-150 inline-block">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/houseilmu.id" target="_blank" rel="noopener noreferrer" class="hover:text-[#FF731D] transition-colors duration-150 inline-block">
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
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/80 font-sans-clean">
            <p>
                <a href="mailto:houseilmu.id@gmail.com" class="text-white/80 hover:text-white transition-colors">
                    houseilmu.id@gmail.com
                </a>
            </p>
            <p class="text-center">
                &copy; {{ date('Y') }} House Ilmu Indonesia
            </p>
            <p class="text-right">
                Hak cipta dilindungi.
            </p>
        </div>
    </div>
</footer>
