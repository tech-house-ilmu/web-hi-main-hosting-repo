@extends('layout.app')

@section('title', $event['title'] . ' | House Ilmu Indonesia')
@section('meta_description', 'Detail program ' . $event['title'] . ' di House Ilmu Indonesia. ' . $event['desc'])
@section('hide_comments', true)

@section('content')
<div class="detail-page-wrapper">
    <div class="detail-container">
        
        <!-- Back Link -->
        <div>
            <a href="{{ route('programme.programmes') }}" class="detail-back-link">
                <span class="detail-back-arrow">&larr;</span>
                <span>Kembali ke HI Programme</span>
            </a>
        </div>

        <!-- Main Detail Grid -->
        <div class="detail-grid">
            
            <!-- Left Column: Poster Image -->
            <div class="detail-poster-column">
                <div class="detail-poster-wrap">
                    <img 
                        src="{{ asset($event['image']) }}" 
                        alt="{{ $event['title'] }}" 
                        loading="eager"
                    >
                </div>
            </div>

            <!-- Right Column: Info & Action -->
            <div class="detail-content-column">
                
                <!-- Badges -->
                <div class="detail-badges-row">
                    <span class="detail-badge-free">
                        {{ $event['event_type'] ?? 'EVENT GRATIS' }}
                    </span>
                    <span class="detail-badge-reg">
                        {{ $event['registration_badge'] ?? 'Pendaftaran di Website' }}
                    </span>
                </div>

                <!-- Event Title -->
                <h1 class="detail-title">
                    {{ $event['title'] }}
                </h1>

                <!-- Event Description -->
                <p class="detail-desc">
                    {{ $event['desc'] }}
                </p>

                <!-- 3 Meta Information Cards -->
                <div class="detail-meta-grid">
                    <!-- Tanggal -->
                    <div class="detail-meta-card">
                        <span class="detail-meta-label">
                            TANGGAL
                        </span>
                        <span class="detail-meta-value">
                            {{ $event['date'] ?? 'Tanggal akan diumumkan' }}
                        </span>
                    </div>

                    <!-- Tempat -->
                    <div class="detail-meta-card">
                        <span class="detail-meta-label">
                            TEMPAT
                        </span>
                        <span class="detail-meta-value">
                            {{ $event['location'] ?? 'Daring' }}
                        </span>
                    </div>

                    <!-- Biaya -->
                    <div class="detail-meta-card">
                        <span class="detail-meta-label">
                            BIAYA
                        </span>
                        <span class="detail-meta-value">
                            {{ $event['price'] ?? 'Gratis' }}
                        </span>
                    </div>
                </div>

                <!-- CTA Button -->
                <div>
                    <a 
                        href="{{ $event['form_url'] ?? 'https://forms.gle/houseilmu' }}" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        class="detail-cta-btn"
                    >
                        <span>Daftar Sekarang</span>
                        <span class="detail-cta-arrow">&#8599;</span>
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
