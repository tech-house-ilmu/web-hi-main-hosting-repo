@extends('layout.app')

@section('title', 'Recruitment Announcement | House Ilmu Indonesia')

@section('head')
<style>
    .announcement-hero {
        background-color: #1554ad;
        padding: 3.75rem 0 3.5rem;
        color: #ffffff;
    }
    .announcement-eyebrow {
        color: #ff9900;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        margin-bottom: 0.65rem;
    }
    .announcement-hero-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        font-size: clamp(1.85rem, 3.8vw, 2.85rem);
        color: #ffffff;
        letter-spacing: 0.01em;
        margin-bottom: 0.85rem;
    }
    .announcement-hero-meta {
        font-size: 0.88rem;
        color: rgba(255, 255, 255, 0.88);
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.55rem;
    }
    .announcement-hero-meta strong {
        color: #ffffff;
        font-weight: 600;
    }

    .announcement-body-section {
        padding: 3.5rem 0 4.5rem;
    }
    .announcement-body-wrap {
        max-width: 960px;
        margin: 0 auto;
    }
    .announcement-congrats-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        font-size: clamp(1.45rem, 2.5vw, 1.85rem);
        color: #072146;
        margin-bottom: 0.75rem;
    }
    .announcement-congrats-subtitle {
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.65;
        max-width: 540px;
        margin: 0 auto 2.5rem;
    }

    .announcement-division-card {
        background-color: #ffffff;
        border: 1px solid #dbe5f0;
        border-radius: 14px;
        padding: 1.5rem 1.75rem;
        height: 100%;
        box-shadow: 0 4px 14px rgba(8, 61, 119, 0.03);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .announcement-division-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(8, 61, 119, 0.07);
    }
    .announcement-division-name {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        font-size: 1.15rem;
        color: #072146;
        margin-bottom: 0.35rem;
    }
    .announcement-division-role {
        color: #f57c00;
        font-size: 0.78rem;
        font-weight: 600;
        margin-bottom: 0.55rem;
    }
    .announcement-division-placeholder {
        color: #64748b;
        font-size: 0.85rem;
        line-height: 1.55;
        margin: 0;
    }
    .announcement-member-list {
        margin: 0.5rem 0 0;
        padding-left: 1.15rem;
        color: #334155;
        font-size: 0.88rem;
        line-height: 1.7;
    }

    .announcement-closing-box {
        background-color: #f9ebda;
        border-radius: 14px;
        padding: 2.25rem 1.75rem;
        text-align: center;
        margin-top: 2rem;
    }
    .announcement-closing-title {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        font-size: clamp(1.2rem, 2vw, 1.4rem);
        color: #1554ad;
        margin-bottom: 0.6rem;
    }
    .announcement-closing-desc {
        color: #64748b;
        font-size: 0.86rem;
        line-height: 1.65;
        max-width: 640px;
        margin: 0 auto;
    }

    .btn-back-join-hi {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.45rem;
        background-color: #f57c00;
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.88rem;
        padding: 0.75rem 1.6rem;
        border-radius: 10px;
        border: 1.5px solid #f57c00;
        box-shadow: 0 4px 0 #c55a00;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .btn-back-join-hi:hover {
        background-color: #e66e00;
        transform: translateY(1px);
        box-shadow: 0 3px 0 #c55a00;
    }
</style>
@endsection

@section('content')
    <!-- Start Banner Header -->
    <section class="announcement-hero container-fluid">
        <div class="container-xl">
            <div class="announcement-body-wrap" data-aos="fade-down">
                <p class="announcement-eyebrow">HOUSE ILMU INDONESIA</p>
                <h1 class="announcement-hero-title">RECRUITMENT ANNOUNCEMENT</h1>
                <div class="announcement-hero-meta">
                    <strong>Batch &mdash; {{ $announcement->batch_label ?? '—' }}</strong>
                    <span>&middot;</span>
                    <span>{{ $announcement->announcement_date ?? 'Tanggal pengumuman belum tersedia' }}</span>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Header -->

    <!-- Start Announcement Content -->
    <section class="announcement-body-section container-xl">
        <div class="announcement-body-wrap">
            <!-- Heading -->
            <div class="text-center" data-aos="fade-up">
                <h2 class="announcement-congrats-title">
                    {{ $announcement->page_heading ?? 'Selamat kepada Kawaners yang telah lolos!' }}
                </h2>
                <p class="announcement-congrats-subtitle">
                    {{ $announcement->page_subheading ?? 'Terima kasih telah membawa semangat dan keberanian untuk berproses bersama House Ilmu Indonesia.' }}
                </p>
            </div>

            @php
                $divisionsList = $announcement->divisions ?? \App\Models\RecruitmentAnnouncement::defaultDivisions();
                $activeDivisions = collect($divisionsList)->filter(function ($d) {
                    return !isset($d['is_active']) || $d['is_active'] === true || $d['is_active'] === '1' || $d['is_active'] === 1;
                });
            @endphp

            <!-- Division Cards Grid -->
            @if ($activeDivisions->isNotEmpty())
                <div class="row g-3 g-md-4" data-aos="fade-up">
                    @foreach ($activeDivisions as $division)
                        <div class="col-12 col-md-6">
                            <div class="announcement-division-card">
                                <h3 class="announcement-division-name">{{ $division['name'] ?? '' }}</h3>
                                <p class="announcement-division-role">{{ $division['position'] ?? 'Posisi: Staf / Relawan' }}</p>

                                @php
                                    $names = $division['names'] ?? [];
                                    if (is_string($names)) {
                                        $names = array_filter(array_map('trim', explode("\n", $names)));
                                    }
                                @endphp

                                @if (!empty($names))
                                    <ol class="announcement-member-list">
                                        @foreach ($names as $name)
                                            <li>{{ $name }}</li>
                                        @endforeach
                                    </ol>
                                @else
                                    <p class="announcement-division-placeholder">
                                        Nama Kawaners akan ditampilkan setelah pengumuman resmi.
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-4 text-center rounded-3 bg-white border" data-aos="fade-up">
                    <p class="text-muted m-0">Belum ada divisi yang diumumkan pada batch ini.</p>
                </div>
            @endif

            <!-- Closing Message Box -->
            <div class="announcement-closing-box" data-aos="fade-up">
                <h3 class="announcement-closing-title">
                    {{ $announcement->closing_title ?? 'Terima kasih sudah berproses bersama kami' }}
                </h3>
                <p class="announcement-closing-desc">
                    {{ $announcement->closing_description ?? 'Terima kasih sudah menjadi bagian dari proses seleksi House Ilmu Indonesia. Tetap semangat dan jangan berhenti berkembang. Kesempatan lain masih terbuka!' }}
                </p>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-4 pt-2" data-aos="fade-up">
                <a href="{{ url('/career') }}" class="btn-back-join-hi">
                    <span>Kembali ke Join HI</span>
                    <span style="font-size: 0.85rem; line-height: 1;">&#8599;</span>
                </a>
            </div>
        </div>
    </section>
    <!-- End Announcement Content -->
@endsection

