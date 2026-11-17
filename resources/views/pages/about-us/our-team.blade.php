@extends('layout.app')

@section('title', 'Our Team | House Ilmu Indonesia')
@section('meta_description', 'Struktur organisasi dan tim House Ilmu Indonesia Batch 6.')

@section('content')
<main class="team-page">
    <!-- PAGE TITLE -->
    <section class="team-banner">
        <h1>OUR TEAM</h1>
    </section>

    <!-- ORGANIZATION STRUCTURE -->
    <section class="organization-section">
        <div class="team-container">
            <div class="team-heading">
                <h2>ORGANIZATION STRUCTURE</h2>
                <span></span>
            </div>

            <div class="organization-box">
                <img class="organization-chart"
                     src="{{ asset('img/homepage/about/struktur-organisasi.png') }}"
                     alt="Struktur organisasi House Ilmu Indonesia dari Chief hingga divisi dan sub-divisi."
                     loading="lazy">
            </div>
        </div>
    </section>

    <!-- GAYA 3 ENHANCED: MODERN GALLERY DENGAN PEMBATAS DIVISI -->
    <section class="team-gallery-section">
        <div class="team-container">
            <div class="gallery-heading">
                <h2>MEET OUR PEOPLE</h2>
                <p>Mengenal orang-orang hebat di balik perjalanan dan program House Ilmu Indonesia.</p>
                <div class="heading-line"></div>
            </div>

            <!-- FILTER PILLS & MOBILE DROPDOWN -->
            <div class="team-filter">
                <div class="filter-pills" role="tablist">
                    <button type="button" class="filter-pill active" data-filter="all">
                        Semua Tim <span class="pill-count">30</span>
                    </button>
                    <button type="button" class="filter-pill" data-filter="ceo-office">
                        CEO Office <span class="pill-count">4</span>
                    </button>
                    <button type="button" class="filter-pill" data-filter="human-capital">
                        Human Capital <span class="pill-count">10</span>
                    </button>
                    <button type="button" class="filter-pill" data-filter="business-development">
                        Business Development <span class="pill-count">6</span>
                    </button>
                    <button type="button" class="filter-pill" data-filter="marketing">
                        Marketing <span class="pill-count">6</span>
                    </button>
                    <button type="button" class="filter-pill" data-filter="technology">
                        Technology <span class="pill-count">4</span>
                    </button>
                </div>

                <div class="filter-dropdown-wrap">
                    <select id="divisionFilter" aria-label="Filter Divisi">
                        <option value="all">Semua Tim (30)</option>
                        <option value="ceo-office">CEO Office (4)</option>
                        <option value="human-capital">Human Capital (10)</option>
                        <option value="business-development">Business Development (6)</option>
                        <option value="marketing">Marketing (6)</option>
                        <option value="technology">Technology (4)</option>
                    </select>
                </div>
            </div>

            @php
                $divisionsConfig = [
                    [
                        'id' => 'ceo-office',
                        'name' => 'CEO OFFICE',
                        'desc' => 'Executive & General Management House Ilmu Indonesia',
                        'icon' => 'fa-briefcase',
                    ],
                    [
                        'id' => 'human-capital',
                        'name' => 'HUMAN CAPITAL',
                        'desc' => 'Organization, Development & Talent Acquisition',
                        'icon' => 'fa-user-group',
                    ],
                    [
                        'id' => 'business-development',
                        'name' => 'BUSINESS DEVELOPMENT',
                        'desc' => 'Partnership & Business Strategic Analysis',
                        'icon' => 'fa-chart-line',
                    ],
                    [
                        'id' => 'marketing',
                        'name' => 'MARKETING',
                        'desc' => 'Digital Marketing, Creative Content & Social Media',
                        'icon' => 'fa-bullhorn',
                    ],
                    [
                        'id' => 'technology',
                        'name' => 'TECHNOLOGY',
                        'desc' => 'Web Development & Technical Architecture',
                        'icon' => 'fa-laptop-code',
                    ],
                ];

                $leadersList = $leaders ?? collect();
            @endphp

            <!-- DIVISION BLOCKS (PEMBATAS JELAS PER DIVISI) -->
            <div class="division-blocks-wrapper">
                @foreach($divisionsConfig as $div)
                    @php
                        $members = $leadersList->filter(function($m) use ($div) {
                            return strcasecmp($m->leaders_details_position_division ?? '', $div['name']) === 0
                                || strcasecmp(str_replace('-', ' ', $m->leaders_details_position_division ?? ''), str_replace('-', ' ', $div['id'])) === 0;
                        });
                    @endphp

                    @if($members->count() > 0)
                        <div class="division-block {{ $div['id'] }}" data-division="{{ $div['id'] }}">
                            <!-- HEADER PEMBATAS DIVISI -->
                            <div class="division-block-header">
                                <div class="header-left">
                                    <div class="division-icon-badge">
                                        <i class="fa-solid {{ $div['icon'] }}"></i>
                                    </div>
                                    <div class="division-block-info">
                                        <h3>{{ $div['name'] }}</h3>
                                        <span>{{ $div['desc'] }}</span>
                                    </div>
                                </div>
                                <div class="header-right">
                                    <span class="division-count-pill">
                                        <i class="fa-regular fa-user"></i> {{ $members->count() }} Anggota
                                    </span>
                                </div>
                            </div>

                            <!-- GRID ANGGOTA KHUSUS DIVISI INI -->
                            <div class="team-gallery-grid">
                                @foreach($members as $m)
                                    @php
                                        $isCeo = stripos($m->leaders_details_position, 'CEO') !== false;
                                        $isVp = stripos($m->leaders_details_position, 'Vice President') !== false;
                                        $isLeader = $isCeo || $isVp;
                                        $isHead = stripos($m->leaders_details_position, 'Head') !== false;

                                        $photoUrl = null;
                                        if ($m->leaders_details_img) {
                                            if (file_exists(public_path('storage/' . $m->leaders_details_img))) {
                                                $photoUrl = asset('storage/' . $m->leaders_details_img);
                                            } elseif (file_exists(public_path('img/' . $m->leaders_details_img))) {
                                                $photoUrl = asset('img/' . $m->leaders_details_img);
                                            } else {
                                                $photoUrl = asset('storage/' . $m->leaders_details_img);
                                            }
                                        }
                                    @endphp

                                    <article class="gallery-card">
                                        <div class="member-photo">
                                            @if($isLeader)
                                                <span class="photo-leader-badge">
                                                    {{ $isCeo ? 'CEO' : 'VICE PRESIDENT' }}
                                                </span>
                                            @endif

                                            @if($photoUrl)
                                                <img src="{{ $photoUrl }}" alt="{{ $m->leaders_details_name }}" loading="lazy">
                                            @else
                                                <i class="fa-regular fa-image"></i>
                                                <span>FOTO</span>
                                            @endif
                                        </div>

                                        <div class="card-badges">
                                            <span class="badge-division">{{ $div['name'] }}</span>
                                            @if($m->leaders_details_sub_division)
                                                <span class="badge-subdivision {{ $isHead ? 'is-head' : '' }}">
                                                    {{ $m->leaders_details_sub_division }}
                                                </span>
                                            @endif
                                        </div>

                                        <p class="member-name">{{ $m->leaders_details_name }}</p>
                                        <p class="member-role">{{ $m->leaders_details_position }}</p>

                                        @if($m->leaders_details_email)
                                            <a href="mailto:{{ $m->leaders_details_email }}" class="member-email" title="Kirim email ke {{ $m->leaders_details_name }}">
                                                <i class="fa-regular fa-envelope"></i>
                                                <span>{{ $m->leaders_details_email }}</span>
                                            </a>
                                        @endif
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- EMPTY STATE SAFEGUARD -->
            <div id="galleryEmptyState" class="gallery-empty" style="display: none;">
                <i class="fa-solid fa-users-slash"></i>
                <p>Tidak ada anggota ditemukan untuk divisi ini.</p>
            </div>
        </div>
    </section>

    <!-- JOIN CTA -->
    <section class="team-cta">
        <h2>BE PART OF HOUSE ILMU</h2>
        <p>Mari belajar, terhubung, dan tumbuh bersama House Ilmu Indonesia.</p>
        <a href="{{ route('career.index') }}">Gabung Sekarang ↗</a>
    </section>

    <a href="{{ route('about') }}" class="back-about">
        <i class="fa-solid fa-arrow-left me-2"></i>
        Kembali ke About Us
    </a>
</main>
@endsection
