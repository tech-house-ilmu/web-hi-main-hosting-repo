@extends('layout.app')

@section('title', 'HI Opportunities | House Ilmu Indonesia')
@section('meta_description', 'Temukan peluang magang, relawan, beasiswa, pertukaran, dan kompetisi terbaik untuk belajar, terhubung, dan mengembangkan potensimu.')
@section('hide_comments', true)

@section('head')
<style>
    /* Hilangkan semua kotak, border, outline, dan focus ring bawaan browser pada search bar */
    #search-form {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
    }
    #search-form:focus-within {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
    }
    #search-input {
        border: 0 !important;
        border-style: none !important;
        outline: none !important;
        box-shadow: none !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        appearance: none !important;
        background: transparent !important;
    }
    #search-input:focus,
    #search-input:focus-visible,
    #search-input:active {
        border: 0 !important;
        border-style: none !important;
        outline: none !important;
        outline-style: none !important;
        box-shadow: none !important;
        -webkit-box-shadow: none !important;
    }
</style>
@endsection

@section('content')
<!-- Hero / Header Section -->
<section class="bg-[#1856C9] pt-14 pb-12 px-4 sm:px-6 lg:px-8 text-white relative overflow-hidden">
    <div class="max-w-4xl mx-auto text-center relative z-10">
        <!-- Title -->
        <h1 class="font-editorial text-3xl sm:text-4xl md:text-5xl font-bold text-white text-center mb-3 tracking-wide uppercase">
            HI OPPORTUNITIES
        </h1>

        <!-- Subtitle -->
        <p class="text-white/85 text-xs sm:text-sm md:text-base text-center max-w-xl mx-auto mb-7 font-normal leading-relaxed font-sans-clean">
            Temukan peluang untuk belajar, terhubung, dan mengembangkan potensi.
        </p>

        <!-- Search Bar -->
        <div class="max-w-xl mx-auto mb-6">
            <form id="search-form" class="relative flex items-center bg-white rounded-full py-2.5 px-4 border-0 shadow-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm mr-3 shrink-0"></i>
                <input 
                    type="text" 
                    id="search-input" 
                    value="{{ request('search') }}" 
                    placeholder="Cari peluang..." 
                    class="w-full text-xs sm:text-sm text-gray-800 placeholder-gray-400 bg-transparent font-sans-clean pr-2 border-0 outline-none focus:outline-none focus:ring-0" 
                    style="border: none !important; outline: none !important; box-shadow: none !important;"
                    autocomplete="off"
                >
            </form>
        </div>

        <!-- Filter Categories (Pills) -->
        @php
            $catFilters = [
                'all' => 'Semua',
                'internship' => 'Magang',
                'volunteer' => 'Relawan',
                'scholarship' => 'Beasiswa',
                'exchange' => 'Pertukaran',
                'competition' => 'Kompetisi',
            ];
            $activeCategory = request('category', 'all');
        @endphp

        <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-2.5 font-sans-clean" id="category-pills">
            @foreach($catFilters as $slug => $label)
                <button 
                    type="button" 
                    data-category="{{ $slug }}" 
                    class="category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition duration-200 cursor-pointer {{ $activeCategory === $slug ? 'bg-[#FF731D] text-white shadow-sm' : 'bg-white text-[#152A5E] hover:text-[#FF731D] shadow-xs' }}"
                >
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Content Body Section -->
<section class="bg-[#FFF9EF] py-10 sm:py-14 px-4 sm:px-6 lg:px-8 min-h-[600px]">
    <div class="max-w-6xl mx-auto" id="opportunities-section">
        <div id="hitcc-cards-container" class="transition-opacity duration-200">
            @include('partials.hitcc-cards', ['opportunities' => $opportunities])
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const cardsContainer = document.getElementById('hitcc-cards-container');
    const categoryButtons = document.querySelectorAll('.category-btn');
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search-input');
    const sectionTop = document.getElementById('opportunities-section');

    let currentCategory = '{{ request("category", "all") }}';
    let currentSearch = '{{ request("search", "") }}';
    let searchDebounce = null;

    function fetchOpportunities(page = 1, scrollToCards = false) {
        const params = new URLSearchParams();
        if (currentCategory && currentCategory !== 'all') {
            params.set('category', currentCategory);
        }
        if (currentSearch) {
            params.set('search', currentSearch);
        }
        if (page > 1) {
            params.set('page', page);
        }

        const newUrl = `${window.location.pathname}${params.toString() ? '?' + params.toString() : ''}`;
        window.history.pushState({}, '', newUrl);

        // Add loading opacity
        if (cardsContainer) cardsContainer.style.opacity = '0.5';

        fetch(newUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(html => {
            if (cardsContainer) {
                cardsContainer.innerHTML = html;
                cardsContainer.style.opacity = '1';
            }
            attachPaginationListeners();

            if (scrollToCards && sectionTop) {
                sectionTop.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        })
        .catch(err => {
            console.error('Error loading opportunities:', err);
            if (cardsContainer) cardsContainer.style.opacity = '1';
        });
    }

    function attachPaginationListeners() {
        if (!cardsContainer) return;
        const paginationLinks = cardsContainer.querySelectorAll('.pagination-link');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const url = new URL(this.href, window.location.origin);
                const page = url.searchParams.get('page') || 1;
                fetchOpportunities(page, true);
            });
        });
    }

    // Category Button Clicks
    categoryButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            currentCategory = this.dataset.category;

            // Update active state classes
            categoryButtons.forEach(b => {
                b.className = 'category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition duration-200 cursor-pointer bg-white text-[#152A5E] hover:text-[#FF731D] shadow-xs';
            });
            this.className = 'category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition duration-200 cursor-pointer bg-[#FF731D] text-white shadow-sm';

            fetchOpportunities(1);
        });
    });

    // Instant search with debounce
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            clearTimeout(searchDebounce);
            searchDebounce = setTimeout(() => {
                currentSearch = searchInput.value.trim();
                fetchOpportunities(1);
            }, 300);
        });
    }

    // Search Form Submit
    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            clearTimeout(searchDebounce);
            currentSearch = searchInput ? searchInput.value.trim() : '';
            fetchOpportunities(1);
        });
    }

    attachPaginationListeners();
});
</script>
@endsection
