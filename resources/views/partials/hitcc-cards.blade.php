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
        @if($opportunities->total() > 0)
            {{ $opportunities->total() }} hasil
        @else
            Coming Soon
        @endif
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
        @if(request('search') || (request('category') && request('category') !== 'all'))
            <div class="opportunity-empty-state">
                <div class="opportunity-empty-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <h4 class="opportunity-empty-title">Peluang tidak ditemukan</h4>
                <p class="opportunity-empty-desc">Coba ubah kata kunci pencarian atau pilih kategori yang lain.</p>
            </div>
        @else
            <!-- Coming Soon State (Akan tampil otomatis saat diinput melalui Admin Site) -->
            <div class="opportunity-coming-soon-card">
                <div class="opportunity-coming-soon-badge-wrap">
                    <span class="opportunity-coming-soon-badge">
                        <span class="pulse-dot"></span>
                        COMING SOON
                    </span>
                </div>

                <div class="opportunity-coming-soon-icon-wrap">
                    <i class="fa-solid fa-rocket" aria-hidden="true"></i>
                </div>

                <h3 class="opportunity-coming-soon-title">
                    Peluang Baru Sedang Dipersiapkan!
                </h3>

                <p class="opportunity-coming-soon-desc">
                    Saat ini belum ada peluang magang, relawan, beasiswa, pertukaran pelajar, atau kompetisi aktif yang dibuka. Tim House Ilmu Indonesia sedang mengkurasi program-program berdampak terbaik untuk generasi muda. Pantau terus halaman ini!
                </p>

                <div class="opportunity-coming-soon-footnote">
                    <i class="fa-solid fa-circle-info mr-1 text-[#FF8A18]"></i>
                    <span>Peluang baru akan langsung dipublikasikan melalui Admin Site segera setelah pendaftaran resmi dibuka.</span>
                </div>
            </div>
        @endif
    @endforelse
</div>

<!-- Pagination if needed -->
@if($opportunities->hasPages())
    <div class="opportunity-pagination-wrap">
        {{ $opportunities->links('partials.pagination') }}
    </div>
@endif

<style>
.opportunity-coming-soon-card {
    grid-column: 1 / -1;
    background: #FFFFFF;
    border: 1px solid #E2E8F0;
    border-radius: 16px;
    padding: 56px 28px;
    text-align: center;
    box-shadow: 0 6px 24px rgba(10, 42, 89, 0.05);
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 16px 0;
}

.opportunity-coming-soon-badge-wrap {
    margin-bottom: 20px;
}

.opportunity-coming-soon-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background-color: #FFF3E6;
    color: #FF8A18;
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.08em;
    padding: 6px 14px;
    border-radius: 9999px;
    border: 1px solid #FFE4C7;
}

.opportunity-coming-soon-badge .pulse-dot {
    width: 8px;
    height: 8px;
    background-color: #FF8A18;
    border-radius: 50%;
    display: inline-block;
    box-shadow: 0 0 0 0 rgba(255, 138, 24, 0.7);
    animation: oppPulseRing 1.8s infinite;
}

@keyframes oppPulseRing {
    0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(255, 138, 24, 0.7);
    }
    70% {
        transform: scale(1);
        box-shadow: 0 0 0 6px rgba(255, 138, 24, 0);
    }
    100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(255, 138, 24, 0);
    }
}

.opportunity-coming-soon-icon-wrap {
    width: 68px;
    height: 68px;
    border-radius: 50%;
    background-color: #205EB6;
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    margin-bottom: 22px;
    box-shadow: 0 6px 18px rgba(32, 94, 182, 0.25);
}

.opportunity-coming-soon-title {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 22px !important;
    line-height: 30px !important;
    color: #0A2B56 !important;
    margin: 0 0 14px 0;
    max-width: 540px;
}

.opportunity-coming-soon-desc {
    font-family: 'Poppins', sans-serif !important;
    font-size: 13.5px !important;
    line-height: 22px !important;
    color: #5E708A !important;
    margin: 0 0 24px 0;
    max-width: 580px;
}

.opportunity-coming-soon-footnote {
    display: inline-flex;
    align-items: center;
    background-color: #F8FAFC;
    border: 1px solid #E2E8F0;
    padding: 10px 18px;
    border-radius: 8px;
    font-family: 'Poppins', sans-serif !important;
    font-size: 12px !important;
    color: #64748B !important;
}

@media (max-width: 639px) {
    .opportunity-coming-soon-card {
        padding: 36px 18px;
    }
    .opportunity-coming-soon-title {
        font-size: 19px !important;
        line-height: 26px !important;
    }
    .opportunity-coming-soon-desc {
        font-size: 12.5px !important;
        line-height: 20px !important;
    }
}
</style>
