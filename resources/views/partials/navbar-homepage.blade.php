<!-- Navbar Component -->
<style>
    .hi-navbar {
        position: relative;
        z-index: 20;
        width: 100%;
        background-color: #ffffff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    .hi-navbar-container {
        width: 100%;
        max-width: 1240px;
        margin: 0 auto;
        height: 82px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1.5rem;
        box-sizing: border-box;
    }
    .hi-navbar-logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-shrink: 0;
        text-decoration: none;
    }
    .hi-navbar-logo img {
        width: 48px !important;
        height: 48px !important;
        min-width: 48px !important;
        min-height: 48px !important;
        max-width: 48px !important;
        max-height: 48px !important;
        object-fit: contain;
        flex-shrink: 0;
        display: block;
    }
    .hi-navbar-logo-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        white-space: nowrap;
        line-height: 1.15;
    }
    .hi-navbar-logo-text .title {
        font-weight: 700;
        font-size: 18px;
        color: #0B2247;
        line-height: 1.15;
        letter-spacing: -0.01em;
    }
    .hi-navbar-logo-text .subtitle {
        font-weight: 700;
        font-size: 14px;
        color: #FF8A18;
        line-height: 1.15;
    }
    .hi-navbar-menu {
        display: flex;
        align-items: center;
        gap: 20px;
        height: 82px;
        flex-shrink: 0;
        margin-left: auto;
    }
    .hi-nav-item {
        position: relative;
        height: 82px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        white-space: nowrap;
        padding: 0;
        box-sizing: border-box;
    }
    .hi-nav-link-inner {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 82px;
    }
    .hi-nav-text {
        font-size: 12px !important;
        font-weight: 700 !important;
        line-height: 1.4 !important;
        letter-spacing: 0.01em !important;
        color: #092C5B !important;
        transition: color 0.2s ease;
    }
    .hi-nav-item:hover .hi-nav-text,
    .hi-nav-item.active .hi-nav-text,
    .hi-nav-dropdown-btn:hover .hi-nav-text,
    .hi-nav-dropdown-btn.active .hi-nav-text {
        color: #FF8A18 !important;
    }
    .hi-nav-link-inner .active-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background-color: #FF8A18;
        border-radius: 9999px;
    }
    .hi-nav-dropdown-btn {
        background: transparent !important;
        border: none !important;
        outline: none !important;
        padding: 0 !important;
        cursor: pointer;
        font-family: inherit;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        height: 82px;
        white-space: nowrap;
    }
    .hi-nav-dropdown-btn i {
        font-size: 9px;
        color: #092C5B;
        transition: transform 0.2s ease, color 0.2s ease;
    }
    .hi-nav-dropdown-btn:hover i,
    .hi-nav-dropdown-btn.active i {
        color: #FF8A18 !important;
    }
</style>

<header class="hi-navbar relative z-20 w-full bg-white shadow-[0_4px_20px_rgba(0,0,0,0.05)]">
    <nav class="hi-navbar-container w-full max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8 h-[82px] flex items-center justify-between">
        <!-- Brand / Logo (Anchored to Left) -->
        <a href="{{ route('home') }}" class="hi-navbar-logo flex items-center gap-3 select-none flex-shrink-0 group">
            <img src="{{ asset('img/logo.webp') }}"
                 alt="House Ilmu Indonesia"
                 width="48"
                 height="48"
                 style="width: 48px; height: 48px; min-width: 48px; min-height: 48px; max-width: 48px; max-height: 48px;"
                 class="w-12 h-12 object-contain transition-transform duration-200 group-hover:scale-105" />
            <div class="hi-navbar-logo-text flex flex-col justify-center">
                <span class="title">House Ilmu</span>
                <span class="subtitle">Indonesia</span>
            </div>
        </a>

        <!-- Mobile Hamburger Button -->
        <button id="burger"
                type="button"
                class="lg:hidden p-2.5 rounded-lg text-[#0B2247] hover:text-[#FF8A18] hover:bg-gray-50 focus:outline-none transition-colors"
                aria-label="Toggle navigation">
            <i class="fa-solid fa-bars text-2xl"></i>
        </button>

        <!-- Desktop Menu (Anchored to Right via margin-left: auto; gap: 20px) -->
        <div class="hi-navbar-menu hidden lg:flex items-center h-[82px] flex-shrink-0">
            <!-- Home Link -->
            <a href="{{ route('home') }}"
               class="hi-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <span class="hi-nav-link-inner">
                    <span class="hi-nav-text">Home</span>
                    @if(request()->routeIs('home'))
                        <span class="active-bar"></span>
                    @endif
                </span>
            </a>

            <!-- HI Programme Link -->
            <a href="{{ route('programme.programmes') }}"
               class="hi-nav-item {{ request()->routeIs('programme.programmes') ? 'active' : '' }}">
                <span class="hi-nav-link-inner">
                    <span class="hi-nav-text">HI Programme</span>
                    @if(request()->routeIs('programme.programmes'))
                        <span class="active-bar"></span>
                    @endif
                </span>
            </a>

            <!-- HI Opportunities Link -->
            <a href="{{ route('programme.hi.index') }}"
               class="hi-nav-item {{ request()->routeIs('programme.hi.*') ? 'active' : '' }}">
                <span class="hi-nav-link-inner">
                    <span class="hi-nav-text">HI Opportunities</span>
                    @if(request()->routeIs('programme.hi.*'))
                        <span class="active-bar"></span>
                    @endif
                </span>
            </a>

            <!-- Community Collaboration Link -->
            <a href="{{ route('partnership.index') }}"
               class="hi-nav-item {{ request()->routeIs('partnership.*') ? 'active' : '' }}">
                <span class="hi-nav-link-inner">
                    <span class="hi-nav-text">Community Collaboration</span>
                    @if(request()->routeIs('partnership.*'))
                        <span class="active-bar"></span>
                    @endif
                </span>
            </a>

            <!-- Articles Link -->
            <a href="{{ route('article.index') }}"
               class="hi-nav-item {{ request()->routeIs('article.*') ? 'active' : '' }}">
                <span class="hi-nav-link-inner">
                    <span class="hi-nav-text">Articles</span>
                    @if(request()->routeIs('article.*'))
                        <span class="active-bar"></span>
                    @endif
                </span>
            </a>

            <!-- Career Link -->
            <a href="{{ route('career.index') }}"
               class="hi-nav-item {{ request()->routeIs('career.*') ? 'active' : '' }}">
                <span class="hi-nav-link-inner">
                    <span class="hi-nav-text">Career</span>
                    @if(request()->routeIs('career.*'))
                        <span class="active-bar"></span>
                    @endif
                </span>
            </a>

            <!-- Event History Link -->
            <a href="{{ route('programme.programmes') }}"
               class="hi-nav-item">
                <span class="hi-nav-link-inner">
                    <span class="hi-nav-text">Event History</span>
                </span>
            </a>

            <!-- About Us Dropdown -->
            <div class="relative group h-[82px] flex items-center">
                <button type="button"
                        class="hi-nav-dropdown-btn {{ request()->routeIs('about*') ? 'active' : '' }}">
                    <span class="hi-nav-link-inner">
                        <span class="hi-nav-text">About Us</span>
                        <i class="fa-solid fa-chevron-down text-[9px] transition-transform duration-200 group-hover:rotate-180"></i>
                        @if(request()->routeIs('about*'))
                            <span class="active-bar"></span>
                        @endif
                    </span>
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute right-0 top-[76px] w-44 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-200 z-50">
                    <div class="bg-white rounded-xl shadow-[0_10px_25px_rgba(0,0,0,0.08)] border border-gray-100 py-2 overflow-hidden">
                        <a href="{{ route('about') }}"
                           class="block px-4 py-2 text-[12px] font-bold text-[#092C5B] hover:bg-[#FFF9F0] hover:text-[#FF8A18] transition-colors">
                            Organization
                        </a>
                        <a href="{{ route('about') }}"
                           class="block px-4 py-2 text-[12px] font-bold text-[#092C5B] hover:bg-[#FFF9F0] hover:text-[#FF8A18] transition-colors">
                            Our Team
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Collapsible via JS) -->
    <div id="navbarNavAltMarkup" class="lg:hidden max-h-0 overflow-hidden transition-all duration-300">
        <div class="px-4 py-3 border-t border-gray-100 flex flex-col space-y-1 bg-white">
            <a href="{{ route('home') }}"
               class="px-3 py-2 rounded-lg text-xs font-bold {{ request()->routeIs('home') ? 'bg-[#FFF9F0] text-[#FF8A18]' : 'text-[#092C5B] hover:bg-gray-50' }}">
                Home
            </a>
            <a href="{{ route('programme.programmes') }}"
               class="px-3 py-2 rounded-lg text-xs font-bold {{ request()->routeIs('programme.programmes') ? 'bg-[#FFF9F0] text-[#FF8A18]' : 'text-[#092C5B] hover:bg-gray-50' }}">
                HI Programme
            </a>
            <a href="{{ route('programme.hi.index') }}"
               class="px-3 py-2 rounded-lg text-xs font-bold {{ request()->routeIs('programme.hi.*') ? 'bg-[#FFF9F0] text-[#FF8A18]' : 'text-[#092C5B] hover:bg-gray-50' }}">
                HI Opportunities
            </a>
            <a href="{{ route('partnership.index') }}"
               class="px-3 py-2 rounded-lg text-xs font-bold {{ request()->routeIs('partnership.*') ? 'bg-[#FFF9F0] text-[#FF8A18]' : 'text-[#092C5B] hover:bg-gray-50' }}">
                Community Collaboration
            </a>
            <a href="{{ route('article.index') }}"
               class="px-3 py-2 rounded-lg text-xs font-bold {{ request()->routeIs('article.*') ? 'bg-[#FFF9F0] text-[#FF8A18]' : 'text-[#092C5B] hover:bg-gray-50' }}">
                Articles
            </a>
            <a href="{{ route('career.index') }}"
               class="px-3 py-2 rounded-lg text-xs font-bold {{ request()->routeIs('career.*') ? 'bg-[#FFF9F0] text-[#FF8A18]' : 'text-[#092C5B] hover:bg-gray-50' }}">
                Career
            </a>
            <a href="{{ route('programme.programmes') }}"
               class="px-3 py-2 rounded-lg text-xs font-bold text-[#092C5B] hover:bg-gray-50">
                Event History
            </a>
            <div class="pt-1 border-t border-gray-100">
                <span class="px-3 py-1 text-[10px] font-bold text-gray-400 uppercase tracking-wider block">About Us</span>
                <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-xs font-bold text-[#092C5B] hover:bg-[#FFF9F0] hover:text-[#FF8A18]">
                    Organization
                </a>
                <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-xs font-bold text-[#092C5B] hover:bg-[#FFF9F0] hover:text-[#FF8A18]">
                    Our Team
                </a>
            </div>
        </div>
    </div>
</header>
