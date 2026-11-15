@extends('layout.app')

@section('title', 'HI Opportunities | House Ilmu Indonesia')
@section('meta_description', 'Temukan peluang magang, relawan, beasiswa, pertukaran, dan kompetisi terbaik untuk belajar, terhubung, dan mengembangkan potensimu.')
@section('hide_comments', true)

@section('content')
<!-- Hero / Header Section -->
<section class="opportunities-hero-section">
    <div class="opportunities-hero-container">
        <!-- Title -->
        <h1 class="opportunities-hero-title">
            HI OPPORTUNITIES
        </h1>

        <!-- Subtitle -->
        <p class="opportunities-hero-subtitle">
            Temukan peluang untuk belajar, terhubung, dan mengembangkan potensi.
        </p>

        <!-- Search Bar -->
        <form id="search-form" class="opportunities-search-form" action="{{ url('/programme/HI-opportunities') }}" method="GET">
            <i class="fa-solid fa-magnifying-glass opportunities-search-icon"></i>
            <input 
                type="text" 
                id="search-input" 
                name="search"
                value="{{ request('search') }}" 
                placeholder="Cari peluang..." 
                class="opportunities-search-input" 
                autocomplete="off"
            >
        </form>

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

        <div class="opportunities-filter-pills" id="category-pills">
            @foreach($catFilters as $slug => $label)
                <button 
                    type="button" 
                    data-category="{{ $slug }}" 
                    class="opportunities-pill-btn {{ $activeCategory === $slug ? 'active' : '' }}"
                >
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Content Body Section -->
<section class="opportunities-body-section">
    <div class="opportunities-body-container" id="opportunities-section">
        <div id="hitcc-cards-container" class="transition-opacity duration-200">
            @include('partials.hitcc-cards', ['opportunities' => $opportunities])
        </div>
    </div>
</section>
@endsection
