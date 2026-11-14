@extends('layout.app')

@section('title', 'Event History | House Ilmu Indonesia')
@section('meta_description', 'Jelajahi cerita dan dokumentasi kegiatan House Ilmu Indonesia.')
@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('content')
    <div class="event-history-page">
        <section class="event-history-hero">
            <p class="event-history-eyebrow">HOUSE ILMU INDONESIA</p>
            <h1>EVENT HISTORY</h1>
            <p>Jejak kegiatan dan momen House Ilmu Indonesia dalam satu ruang dokumentasi.</p>
        </section>

        <section class="event-archive" aria-labelledby="event-archive-title">
            <div class="event-archive-heading">
                <div>
                    <p class="event-history-kicker">EXPLORE THE ARCHIVE</p>
                    <h2 id="event-archive-title">Stories from Every Event</h2>
                </div>
                <label class="event-search">
                    <span class="sr-only">Cari kegiatan</span>
                    <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                    <input id="event-search-input" type="search" placeholder="Cari kegiatan..." autocomplete="off">
                </label>
            </div>

            <div class="event-filter-list" role="group" aria-label="Filter kategori kegiatan">
                <button class="event-filter-button is-active" type="button" data-event-filter="all" aria-pressed="true">Semua</button>
                <button class="event-filter-button" type="button" data-event-filter="webskill" aria-pressed="false">Webskill</button>
                <button class="event-filter-button" type="button" data-event-filter="workskill" aria-pressed="false">Workskill</button>
                <button class="event-filter-button" type="button" data-event-filter="opportunity-corners" aria-pressed="false">Opportunity Corners</button>
                <button class="event-filter-button" type="button" data-event-filter="sudut-karir" aria-pressed="false">Sudut Karir</button>
                <button class="event-filter-button" type="button" data-event-filter="chill-ups" aria-pressed="false">Chill-Ups</button>
                <button class="event-filter-button" type="button" data-event-filter="mainkekantor" aria-pressed="false">#MainkeKantor</button>
                <button class="event-filter-button" type="button" data-event-filter="event-collaboration" aria-pressed="false">Event Collaboration</button>
            </div>

            <div class="event-card-grid" id="event-card-grid">
                @foreach($events as $event)
                    <article class="event-card" data-event-category="{{ \Illuminate\Support\Str::slug($event['category']) }}" data-event-title="{{ \Illuminate\Support\Str::lower($event['title']) }}">
                        <a class="event-card-link" href="{{ route('event-history.show', $event['slug']) }}" aria-label="Baca selengkapnya tentang {{ $event['title'] }}">
                            <img class="event-poster-image event-poster-image--card" src="{{ asset($event['poster']) }}" alt="Poster {{ $event['title'] }}" loading="lazy">
                            <div class="event-card-content">
                                <span class="event-category">{{ $event['category'] }}</span>
                                <h3>{{ $event['title'] }}</h3>
                                <p>{{ $event['excerpt'] }}</p>
                                <span class="event-card-more">Selengkapnya <span aria-hidden="true">→</span></span>
                            </div>
                        </a>
                    </article>
                @endforeach
                <p class="event-search-empty" id="event-search-empty" hidden>Tidak ada kegiatan yang cocok dengan pencarianmu.</p>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        (() => {
            const searchInput = document.getElementById('event-search-input');
            const filterButtons = document.querySelectorAll('[data-event-filter]');
            const cards = document.querySelectorAll('.event-card');
            const emptyMessage = document.getElementById('event-search-empty');
            let activeCategory = 'all';

            const updateEvents = () => {
                const query = searchInput.value.trim().toLocaleLowerCase();
                let visibleCount = 0;

                cards.forEach((card) => {
                    const matchesCategory = activeCategory === 'all' || card.dataset.eventCategory === activeCategory;
                    const matchesSearch = card.dataset.eventTitle.includes(query);
                    const isVisible = matchesCategory && matchesSearch;

                    card.hidden = !isVisible;
                    visibleCount += isVisible ? 1 : 0;
                });

                emptyMessage.hidden = visibleCount > 0;
            };

            searchInput.addEventListener('input', updateEvents);
            filterButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    activeCategory = button.dataset.eventFilter;
                    filterButtons.forEach((filterButton) => {
                        const isActive = filterButton === button;
                        filterButton.classList.toggle('is-active', isActive);
                        filterButton.setAttribute('aria-pressed', String(isActive));
                    });
                    updateEvents();
                });
            });
        })();
    </script>
@endsection
