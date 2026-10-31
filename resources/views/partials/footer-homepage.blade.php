<footer class="bg-[#1053D4] text-white pt-14 pb-8 px-4 sm:px-6 lg:px-8 border-t border-blue-600/30">
    <div class="max-w-7xl mx-auto">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-12">
            <!-- Brand & Description Column -->
            <div class="md:col-span-6 lg:col-span-6 flex flex-col items-start">
                <!-- Brand / Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-full bg-[#FF731D] flex items-center justify-center shrink-0 shadow-sm transition duration-300 group-hover:scale-105">
                        <i class="fa-solid fa-graduation-cap text-[#0A192F] text-lg"></i>
                    </div>
                    <span class="text-xl sm:text-2xl font-black tracking-tight text-white">
                        House <span class="text-[#FF731D]">Ilmu</span> Indonesia
                    </span>
                </a>

                <!-- About Description -->
                <p class="text-white/80 text-xs sm:text-sm font-normal leading-relaxed mt-4 mb-6 max-w-md">
                    House Ilmu Indonesia adalah komunitas mentorship dan pengembangan karir yang membantu mahasiswa dan fresh graduate menemukan dan menembus karir impian mereka.
                </p>

                <!-- Social Media Buttons -->
                <div class="flex items-center gap-3">
                    <a 
                        href="https://www.linkedin.com/company/house-ilmu-indonesia" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-[#FF731D] hover:text-white transition-all duration-200 flex items-center justify-center text-white text-sm shadow-xs"
                        aria-label="LinkedIn"
                    >
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a 
                        href="https://www.instagram.com/houseilmu.id" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-[#FF731D] hover:text-white transition-all duration-200 flex items-center justify-center text-white text-sm shadow-xs"
                        aria-label="Instagram"
                    >
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a 
                        href="https://www.tiktok.com/@houseilmu.id" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-[#FF731D] hover:text-white transition-all duration-200 flex items-center justify-center text-white text-sm shadow-xs"
                        aria-label="TikTok"
                    >
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
            </div>

            <!-- Navigation Links Column -->
            <div class="md:col-span-3 lg:col-span-3 flex flex-col">
                <h4 class="text-xs sm:text-sm font-black text-[#FF731D] uppercase tracking-wider mb-4">
                    NAVIGASI
                </h4>
                <ul class="space-y-3 text-xs sm:text-sm text-white font-normal">
                    <li>
                        <a href="{{ route('home') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('programme.programmes') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            HI Programme
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('programme.hi.index') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            HI Opportunities
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('article.index') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Article
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Other Links Column -->
            <div class="md:col-span-3 lg:col-span-3 flex flex-col">
                <h4 class="text-xs sm:text-sm font-black text-[#FF731D] uppercase tracking-wider mb-4">
                    LAINNYA
                </h4>
                <ul class="space-y-3 text-xs sm:text-sm text-white font-normal">
                    <li>
                        <a href="{{ route('partnership.index') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Partnership
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('career.index') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Career
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="mailto:houseilmu.id@gmail.com" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            Kontak
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#faq" class="text-white hover:text-white/80 transition-colors duration-150 inline-block">
                            FAQ
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider Line -->
        <div class="border-t border-white/15 mt-12 mb-6"></div>

        <!-- Bottom Bar: Copyright & Contact Email -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs sm:text-sm text-white">
            <p class="text-white">
                &copy; {{ date('Y') }} House Ilmu Indonesia. All rights reserved.
            </p>
            <a href="mailto:houseilmu.id@gmail.com" class="flex items-center gap-2 text-white hover:text-white/80 transition-colors duration-150">
                <i class="fa-regular fa-envelope text-sm"></i>
                <span class="text-white">houseilmu.id@gmail.com</span>
            </a>
        </div>
    </div>
</footer>
