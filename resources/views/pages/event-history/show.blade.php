@extends('layout.app')

@section('title', $event['title'] . ' | Event History')
@section('meta_description', $event['excerpt'])
@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('content')
    <div class="event-history-page event-detail-page">
        <div class="event-detail-container">
            <a class="event-back-link" href="{{ route('event-history.index') }}">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                Kembali ke Riwayat Kegiatan
            </a>

            <nav class="event-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('event-history.index') }}">Riwayat Kegiatan</a>
                <span aria-hidden="true">/</span>
                <span>{{ $event['category'] }}</span>
            </nav>

            <div class="event-detail-poster-wrap">
                <img class="event-poster-image event-poster-image--detail" src="{{ asset($event['poster']) }}" alt="Poster {{ $event['title'] }}">
            </div>

            <header class="event-detail-header">
                <span class="event-history-kicker">{{ $event['category'] }}</span>
                <h1>{{ $event['title'] }}</h1>
                <p class="event-detail-subtitle">{{ $event['excerpt'] }}</p>
            </header>

            <div class="event-detail-layout">
                <div class="event-detail-main">
                    <section class="event-about">
                        <h2>Tentang Kegiatan</h2>
                        <p>{{ $event['description'] }}</p>
                    </section>

                    <section class="event-content-section" aria-labelledby="event-goals-title">
                        <h2 id="event-goals-title">Tujuan Kegiatan</h2>
                        <ul>
                            @foreach($event['goals'] as $goal)
                                <li>{{ $goal }}</li>
                            @endforeach
                        </ul>
                    </section>

                    <section class="event-content-section" aria-labelledby="event-agenda-title">
                        <h2 id="event-agenda-title">Rangkaian Kegiatan</h2>
                        <p>{{ $event['agenda'] }}</p>
                    </section>

                    <section class="event-content-section" aria-labelledby="event-outcomes-title">
                        <h2 id="event-outcomes-title">Hasil dan Manfaat Kegiatan</h2>
                        <p>{{ $event['outcomes'] }}</p>
                    </section>

                    <section class="event-content-section" aria-labelledby="event-conclusion-title">
                        <h2 id="event-conclusion-title">Penutup</h2>
                        <p>{{ $event['conclusion'] }}</p>
                        <p>{{ $event['closing'] }}</p>
                    </section>

                    <section class="event-gallery" aria-labelledby="event-gallery-title">
                        <div>
                            <p class="event-history-kicker">KENANGAN KEGIATAN</p>
                            <h2 id="event-gallery-title">Galeri Kegiatan</h2>
                        </div>
                        <div class="event-gallery-grid">
                            @foreach($event['gallery'] as $image)
                                <img src="{{ asset($image) }}" alt="Dokumentasi GB Circle Meetup bersama House Ilmu Indonesia" loading="lazy">
                            @endforeach
                        </div>
                    </section>
                </div>

                <aside class="event-detail-aside" aria-label="Informasi kegiatan">
                    <p class="event-history-kicker">INFORMASI KEGIATAN</p>
                    <h2>{{ $event['speaker'] }}</h2>
                    <p>{{ $event['profession'] }}</p>
                    <dl class="event-info-list">
                        <div><dt>Hari/Tanggal</dt><dd>{{ $event['date'] }}</dd></div>
                        <div><dt>Waktu</dt><dd>{{ $event['time'] }}</dd></div>
                        <div><dt>Tempat</dt><dd>{{ $event['location'] }}</dd></div>
                        <div><dt>Kolaborator</dt><dd>{{ $event['collaborator'] }}</dd></div>
                    </dl>
                    <span class="event-category">{{ $event['category'] }}</span>
                </aside>
            </div>
        </div>
    </div>
@endsection
