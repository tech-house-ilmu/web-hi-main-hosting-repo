<header>
    <nav class="border-b-4 border-primary_light_HI bg-background_HI">
        <div class="max-w-7xl mx-auto flex flex-col p-4 px-6 md:flex-row md:items-center md:justify-between">
            <!-- Logo & Burger -->
            <div class="flex w-full items-center justify-between md:w-auto">
                <div class="flex flex-row gap-4 items-center">
                    <a href="/">
                        <img src="{{ asset('img/logo.png') }}" alt="logo house ilmu" class="w-14">
                    </a>
                    <p class="flex flex-wrap gap-2 text-[#083D77] font-semibold text-lg justify-center whitespace-nowrap leading-tight md:hidden lg:block">
                        House <span class="text-secondary_HI">Ilmu</span> Indonesia
                    </p>
                </div>
                <button id="burger" class="md:hidden border-none bg-transparent text-[#FE9000] active:!text-white active:!bg-primary_light_HI active:border-2 active:border-[#FE9000] active:border-solid active:rounded-xl">
                    <i class="fa-solid fa-bars text-4xl"></i>
                </button>
            </div>

            <div id="navbarNavAltMarkup" class="flex flex-col items-center text-center space-y-2 mt-2 max-h-0 transition-all duration-500 ease-in-out
                md:mt-0 md:flex md:flex-row md:space-y-0 md:gap-6 xl:gap-14 md:max-h-none md:overflow-auto">

                <a class="block w-full nav-link py-1 font-semibold rounded-lg text-primary_light_HI transition-colors duration-200 hover:text-secondary_HI hover:bg-primary_HI md:w-fit md:hover:bg-transparent 
                    {{ Request::is('/') ? 'bg-primary_HI md:bg-transparent text-secondary_HI' : '' }}" 
                    href="/">Home</a>

                <!-- Programme links mobile -->
                <a class="block w-full nav-link py-1 font-semibold rounded-lg text-primary_light_HI transition-colors duration-200 md:hidden hover:text-secondary_HI hover:bg-primary_HI
                    {{ Request::is('programme/HI-programmes*') ? 'bg-primary_HI md:bg-transparent text-secondary_HI' : '' }}"
                    href="/programme/HI-programmes/">
                    HI Programmes
                </a>
                <a class="block w-full nav-link py-1 font-semibold rounded-lg text-primary_light_HI transition-colors duration-200 md:hidden hover:text-secondary_HI hover:bg-primary_HI
                    {{ Request::is('programme/HI-opportunities*') ? 'bg-primary_HI md:bg-transparent text-secondary_HI' : '' }}"
                    href="/programme/HI-opportunities/">
                    HI Opportunities
                </a>

                <!-- Programme dropdown md+ -->
                <div class="relative group hidden md:block">
                    <button class="nav-link flex items-center font-semibold rounded-lg text-primary_light_HI hover:text-secondary_HI
                        {{ Request::is('programme*') ? 'bg-primary_HI md:bg-transparent text-secondary_HI' : '' }} cursor-pointer border-none bg-transparent">
                        Programme
                        <i class="fa-solid fa-chevron-down ml-2 transition-transform duration-300 group-hover:rotate-180"></i>
                    </button>
                    <ul class="absolute left-0 pl-0 top-full w-48 bg-background_HI border border-primary_light_HI rounded-md shadow-lg
                        opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-300 z-50 list-none">
                        <li>
                            <a class="block font-semibold px-4 py-2 text-primary_light_HI rounded-t-sm outline outline-primary_light_HI hover:rounded-t-sm hover:bg-secondary_HI hover:text-white"
                            href="/programme/HI-programmes/">HI Programmes</a>
                        </li>
                        <li>
                            <a class="block font-semibold px-4 py-2 text-primary_light_HI rounded-b-sm outline outline-primary_light_HI hover:rounded-b-sm hover:bg-secondary_HI hover:text-white"
                            href="/programme/HI-opportunities/">HI Opportunities</a>
                        </li>
                    </ul>
                </div>

                <a class="block w-full nav-link py-1 font-semibold rounded-lg  text-primary_light_HI transition-colors duration-200 hover:text-secondary_HI hover:bg-primary_HI md:w-fit md:hover:bg-transparent 
                    {{ Request::is('partnership*') ? 'bg-primary_HI md:bg-transparent text-secondary_HI' : '' }}"
                href="/partnership/">Partnership</a>

                <a class="block w-full nav-link py-1 font-semibold rounded-lg text-primary_light_HI transition-colors duration-200 hover:text-secondary_HI hover:bg-primary_HI md:w-fit md:hover:bg-transparent 
                    {{ Request::is('article*') ? 'bg-primary_HI md:bg-transparent text-secondary_HI' : '' }}"
                href="/article/">Article</a>

                <a class="block w-full nav-link py-1 font-semibold rounded-lg text-primary_light_HI transition-colors duration-200 hover:text-secondary_HI hover:bg-primary_HI md:w-fit md:hover:bg-transparent 
                    {{ Request::is('career*') ? 'bg-primary_HI md:bg-transparent text-secondary_HI' : '' }}"
                href="/career/">Career</a>

                <a class="block w-full nav-link py-1 font-semibold rounded-lg text-primary_light_HI transition-colors duration-200 hover:text-secondary_HI hover:bg-primary_HI md:w-fit md:hover:bg-transparent 
                    {{ Request::is('about-us*') ? 'bg-primary_HI md:bg-transparent text-secondary_HI' : '' }}"
                href="/about-us/">About Us</a>
            </div>
        </div>
    </nav>
</header>