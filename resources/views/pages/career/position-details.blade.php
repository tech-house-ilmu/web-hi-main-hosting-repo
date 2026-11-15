@extends('layout.app')

@section('title', $position->title . ' - ' . $division->name . ' | House Ilmu Indonesia')
@section('meta_description', Str::limit(strip_tags($position->job_description), 150))
@section('og_title', $position->title . ' - ' . $division->name . ' | House Ilmu Indonesia')
@section('og_description', Str::limit(strip_tags($position->job_description), 150))

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "JobPosting",
    "title": {{ json_encode($position->title) }},
    "description": {{ json_encode($position->job_description . "\n" . $position->requirements) }},
    "hiringOrganization": {
        "@type": "Organization",
        "name": "House Ilmu Indonesia",
        "sameAs": "https://houseilmuindonesia.biz.id",
        "logo": "{{ asset('img/logo.webp') }}"
    },
    "jobLocation": {
        "@type": "Place",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "ID"
        }
    },
    "employmentType": "OTHER",
    "datePosted": "{{ $position->created_at ? $position->created_at->toIso8601String() : now()->toIso8601String() }}"
}
</script>
@endsection

@section('content')
<main class="career-page detail-page">
    <div class="detail-container">
        <!-- Breadcrumb -->
        <nav class="detail-breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span style="color: #8191a8;">/</span>
            <a href="{{ route('career.index') }}">Career</a>
            <span style="color: #8191a8;">/</span>
            <a href="{{ route('career.division', $division->slug) }}">{{ $division->name }}</a>
            <span style="color: #8191a8;">/</span>
            <span class="detail-badge">{{ $position->title }}</span>
        </nav>

        <!-- Heading -->
        <div class="detail-heading">
            <h1>{{ $position->title }}</h1>
            <p>
                Divisi {{ $division->name }} • Daring &amp; Hibrida • House Ilmu Indonesia
            </p>
        </div>

        <!-- Two Column Grid: Responsibilities & Requirements -->
        <div class="detail-grid">
            <!-- Responsibilities -->
            <div class="detail-card">
                <h2>Tanggung Jawab</h2>
                <ul>
                    @foreach (explode("\n", $position->job_description) as $desc)
                        @if(trim($desc) !== '')
                            <li>{!! $desc !!}</li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- Requirements -->
            <div class="detail-card">
                <h2>Kualifikasi</h2>
                <ul>
                    @foreach (explode("\n", $position->requirements) as $req)
                        @if(trim($req) !== '')
                            <li>{!! $req !!}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- CTA Card -->
        <div class="detail-cta">
            <h2>Tertarik Bergabung?</h2>
            <p>
                Kirimkan aplikasi dan portfolio terbaikmu sekarang juga. Jadilah bagian dari tim inovatif House Ilmu Indonesia!
            </p>

            @if($position->apply_link)
                <a href="{{ $position->apply_link }}" target="_blank" rel="noopener noreferrer">
                    Daftar Sekarang ↗
                </a>
            @else
                <button type="button" style="display: inline-block; padding: 11px 23px; background: #94a3b8; color: white; border: none; border-radius: 8px; font-size: 13px; font-weight: 900; cursor: not-allowed;" disabled>
                    Pendaftaran Segera Dibuka
                </button>
            @endif
        </div>

        <div style="text-align: center; margin-top: 35px;">
            <a href="{{ route('career.division', $division->slug) }}"
               style="color: #245fb5; font-weight: 800; font-size: 14px; text-decoration: none;">
                ← Kembali ke Posisi {{ $division->name }}
            </a>
        </div>
    </div>
</main>
@endsection
