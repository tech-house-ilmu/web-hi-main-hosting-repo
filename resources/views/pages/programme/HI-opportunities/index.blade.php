@extends('layout.app')

@section('title', 'HI Opportunities | House Ilmu Indonesia')
@section('hide_comments', true)

@section('content')
<!-- Hero / Header Section -->
<section class="bg-[#1053D4] pt-12 pb-10 px-4 sm:px-6 lg:px-8 text-white relative overflow-hidden">
    <div class="max-w-5xl mx-auto text-center relative z-10">
        <!-- Title -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-white text-center mb-3 tracking-tight">
            HI <span class="text-[#FF731D]">Opportunities</span>
        </h1>

        <!-- Subtitle -->
        <p class="text-white/90 text-xs sm:text-sm text-center max-w-2xl mx-auto mb-8 font-normal leading-relaxed">
            Pusat kurasi peluang magang (internship), relawan (volunteer), beasiswa (scholarship), program pertukaran (exchange), dan kompetisi pilihan untuk pemuda & mahasiswa Indonesia yang bersumber dari mitra terverifikasi.
        </p>

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-6">
            <form id="search-form" method="GET" action="{{ route('programme.hi.index') }}" class="relative flex items-center bg-white rounded-full p-1.5 pl-5 shadow-lg">
                <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm mr-2 shrink-0"></i>
                <input 
                    type="text" 
                    name="search" 
                    id="search-input"
                    value="{{ request('search') }}" 
                    placeholder="Cari peluang berdasarkan Internship, Volunteer, Scholarship, atau Exchange..." 
                    class="w-full text-xs sm:text-sm text-gray-800 placeholder-gray-400 focus:outline-none bg-transparent pr-2" 
                    autocomplete="off"
                >
                <button 
                    type="submit" 
                    class="bg-[#FF731D] hover:bg-[#E8620D] text-white text-xs sm:text-sm font-bold px-6 py-2.5 rounded-full transition cursor-pointer shrink-0 shadow-sm"
                >
                    Cari Peluang
                </button>
            </form>
        </div>

        <!-- Filter Categories (Pills) -->
        <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-6" id="category-pills">
            <button 
                type="button" 
                data-category="all" 
                class="category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition cursor-pointer {{ request('category', 'all') == 'all' ? 'bg-white text-[#FF731D] border-2 border-[#FF731D] shadow-sm' : 'bg-white text-[#152A5E] hover:text-[#FF731D] border border-transparent shadow-xs' }}"
            >
                Semua
            </button>
            @foreach($categories as $category)
                <button 
                    type="button" 
                    data-category="{{ $category->slug }}" 
                    class="category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition cursor-pointer {{ request('category') == $category->slug ? 'bg-white text-[#FF731D] border-2 border-[#FF731D] shadow-sm' : 'bg-white text-[#152A5E] hover:text-[#FF731D] border border-transparent shadow-xs' }}"
                >
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <!-- Verification Notice -->
        <div class="flex items-center justify-center gap-2 text-[11px] sm:text-xs text-emerald-300 font-medium text-center">
            <i class="fa-regular fa-circle-check text-emerald-400 text-sm"></i>
            <span>Menampilkan opportunity yang sudah terverifikasi oleh tim House Ilmu Indonesia</span>
        </div>
    </div>
</section>

<!-- Content Body Section -->
<section class="bg-[#FFF9F2] py-8 sm:py-12 px-4 sm:px-6 lg:px-8 min-h-[600px]">
    <div class="max-w-7xl mx-auto" id="opportunities-section">
        <div id="hitcc-cards-container">
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
    let currentSort = '{{ request("sort", "deadline_asc") }}';

    function fetchOpportunities(page = 1, scrollToCards = false) {
        const params = new URLSearchParams();
        if (currentCategory && currentCategory !== 'all') {
            params.set('category', currentCategory);
        }
        if (currentSearch) {
            params.set('search', currentSearch);
        }
        if (currentSort) {
            params.set('sort', currentSort);
        }
        if (page > 1) {
            params.set('page', page);
        }

        const newUrl = `${window.location.pathname}${params.toString() ? '?' + params.toString() : ''}`;
        window.history.pushState({}, '', newUrl);

        // Add loading opacity
        cardsContainer.style.opacity = '0.5';

        fetch(newUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(html => {
            cardsContainer.innerHTML = html;
            cardsContainer.style.opacity = '1';
            attachEventListeners();

            if (scrollToCards && sectionTop) {
                sectionTop.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        })
        .catch(err => {
            console.error('Error loading opportunities:', err);
            cardsContainer.style.opacity = '1';
        });
    }

    function attachEventListeners() {
        // Attach Sort Select Listener
        const sortSelect = document.getElementById('sort-select');
        if (sortSelect) {
            sortSelect.addEventListener('change', function () {
                currentSort = this.value;
                fetchOpportunities(1);
            });
        }

        // Attach Pagination Links Listener
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
                b.className = 'category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition cursor-pointer bg-white text-[#152A5E] hover:text-[#FF731D] border border-transparent shadow-xs';
            });
            this.className = 'category-btn px-5 py-1.5 rounded-full text-xs sm:text-sm font-bold transition cursor-pointer bg-white text-[#FF731D] border-2 border-[#FF731D] shadow-sm';

            fetchOpportunities(1);
        });
    });

    // Search Form Submit
    searchForm.addEventListener('submit', function (e) {
        e.preventDefault();
        currentSearch = searchInput.value.trim();
        fetchOpportunities(1);
    });

    // Initial listeners attachment
    attachEventListeners();
});
</script>
@endsection
