@php
    $categoryLabels = [
        'internship' => 'Magang',
        'volunteer' => 'Relawan',
        'scholarship' => 'Beasiswa',
        'exchange' => 'Pertukaran',
        'competition' => 'Kompetisi',
    ];
@endphp

<!-- Header Row: Title & Results Count -->
<div class="opportunities-grid-header">
    <h2 class="opportunities-section-title">
        Jelajahi Peluang
    </h2>
    <span class="opportunities-results-count" id="results-count">
        {{ $opportunities->total() }} hasil
    </span>
</div>

<!-- Opportunity Cards Grid -->
<div class="opportunities-cards-grid">
    @forelse($opportunities as $opp)
        @php
            $catSlug = strtolower(is_object($opp->category ?? null) ? $opp->category->slug : ($opp->category_slug ?? ''));
            $badgeName = $categoryLabels[$catSlug] ?? (is_object($opp->category ?? null) ? $opp->category->name : ($opp->category_name ?? 'Peluang'));
            $descText = $opp->company_desc ?? ($opp->registration_info ?? 'Temukan peluang terbaik bersama House Ilmu Indonesia.');
            $hasPoster = !empty($opp->bg_poster_img) && (file_exists(public_path($opp->bg_poster_img)) || Storage::disk('public')->exists($opp->bg_poster_img));
            $posterUrl = $hasPoster ? (file_exists(public_path($opp->bg_poster_img)) ? asset($opp->bg_poster_img) : Storage::url($opp->bg_poster_img)) : null;
            $detailUrl = route('programme.hi.show', ['category' => $catSlug ?: 'internship', 'slug' => $opp->slug]);
        @endphp

        <div class="opportunity-card-item">
            <!-- Top: Image / Placeholder Area -->
            <div class="opportunity-poster-box">
                @if($hasPoster)
                    <img 
                        src="{{ $posterUrl }}" 
                        alt="{{ $opp->title_program }}" 
                        class="opportunity-poster-img" 
                        loading="lazy" 
                        decoding="async"
                    >
                @else
                    <div class="opportunity-placeholder-content">
                        <svg class="opportunity-placeholder-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                            <circle cx="9" cy="9" r="2"/>
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                        </svg>
                        <span class="opportunity-placeholder-label">GAMBAR KESEMPATAN</span>
                    </div>
                @endif
            </div>

            <!-- Bottom: Content Body -->
            <div class="opportunity-card-body">
                <div class="opportunity-card-top-content">
                    <!-- Category Badge -->
                    <span class="opportunity-category-badge">
                        {{ $badgeName }}
                    </span>

                    <!-- Title -->
                    <h3 class="opportunity-card-title">
                        {{ $opp->title_program }}
                    </h3>

                    <!-- Description -->
                    <p class="opportunity-card-desc">
                        {{ $descText }}
                    </p>
                </div>

                <!-- Action Button -->
                <div class="opportunity-card-action">
                    <a 
                        href="{{ $detailUrl }}" 
                        class="opportunity-action-btn"
                    >
                        <span>Lihat Selengkapnya</span>
                        <span class="opportunity-btn-arrow">&#8599;</span>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="opportunity-empty-state">
            <div class="opportunity-empty-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <h4 class="opportunity-empty-title">Peluang tidak ditemukan</h4>
            <p class="opportunity-empty-desc">Coba ubah kata kunci pencarian atau pilih kategori yang lain.</p>
        </div>
    @endforelse
</div>

<!-- Pagination if needed -->
@if($opportunities->hasPages())
    <div class="opportunity-pagination-wrap">
        {{ $opportunities->links('partials.pagination') }}
    </div>
@endif
