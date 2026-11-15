@extends('layout.app')

@section('title', 'Career | House Ilmu Indonesia')
@section('meta_description', 'Build your career with House Ilmu Indonesia. Bergabung bersama kami di lingkungan yang suportif dan berdampak.')

@section('content')
<main class="career-page">
    <!-- HERO -->
    <section class="career-hero">
        <div class="career-container hero-grid">
            <div class="hero-content">
                <span class="career-eyebrow">JOIN HOUSE ILMU INDONESIA</span>

                <h1>BUILD YOUR<br>CAREER WITH<br>HOUSE ILMU</h1>

                <p>
                    House Ilmu Indonesia itu rumah bagi generasi muda yang haus akan ilmu,
                    tempat mereka bertumbuh, menemukan arah, dan mempersiapkan masa depannya.
                    Melalui edukasi yang relevan dan perjalanan karier yang bermakna.
                </p>

                <p>
                    House Ilmu hadir sebagai teman yang menemani setiap proses belajar dan
                    berkembang, karena kami percaya bahwa setiap anak muda berhak memiliki
                    kesempatan untuk membangun masa depan yang lebih baik dan memberikan
                    dampak bagi sekitarnya.
                </p>

                <div class="hero-buttons">
                    <a href="#career-opportunities" class="career-btn">
                        Jelajahi Kesempatan ↗
                    </a>

                    <a href="{{ route('career.announcement') }}" class="career-btn-outline">
                        Lihat Pengumuman Rekrutmen
                    </a>
                </div>
            </div>

            <div class="hero-visual">
                <img src="{{ asset('img/career/banner.png') }}"
                     alt="House Ilmu Indonesia"
                     onerror="this.src='{{ asset('img/logo.webp') }}'">
            </div>
        </div>
    </section>

    <!-- CULTURE AND VALUES -->
    <section class="career-values">
        <div class="career-container">
            <div class="career-heading light-heading">
                <h2>OUR CULTURE &amp; VALUES</h2>
                <span class="heading-line"></span>
            </div>

            <div class="value-top-grid">
                <article class="value-top-card">
                    <small>CORE VALUE</small>
                    <h3>Edusociopreneur</h3>
                </article>

                <article class="value-top-card">
                    <small>OUR VALUE</small>
                    <h3>Learn, Grow, and Get Achievement Together</h3>
                </article>

                <article class="value-top-card">
                    <small>CULTURE</small>
                    <h3>DEALS</h3>
                </article>
            </div>

            <div class="deals-grid">
                <article class="deals-card">
                    <span>D</span>
                    <h3>Discipline</h3>
                </article>

                <article class="deals-card">
                    <span>E</span>
                    <h3>Entrepreneur</h3>
                </article>

                <article class="deals-card">
                    <span>A</span>
                    <h3>Agile</h3>
                </article>

                <article class="deals-card">
                    <span>L</span>
                    <h3>Learning</h3>
                </article>

                <article class="deals-card">
                    <span>S</span>
                    <h3>Social</h3>
                </article>
            </div>
        </div>
    </section>

    <!-- ALUMNI STORIES -->
    <section class="career-alumni">
        <div class="career-container">
            <div class="career-heading">
                <h2>ALUMNI STORIES</h2>
                <span class="heading-line"></span>
                <p>
                    Cerita tentang proses belajar, relasi, dan kontribusi setelah bertumbuh bersama HI.
                </p>
            </div>

            <div class="alumni-wrapper">
                <button class="alumni-arrow alumni-prev" type="button" aria-label="Previous">
                    ‹
                </button>

                <div class="alumni-grid" id="alumniGrid">
                    @if(isset($testimoniAlumni) && $testimoniAlumni->count() > 0)
                        @foreach($testimoniAlumni as $alumni)
                            <article class="alumni-card" data-photo="{{ $alumni->testimoni_alumni_img ? Storage::url($alumni->testimoni_alumni_img) : '' }}">
                                <div class="alumni-photo">
                                    @if($alumni->testimoni_alumni_img)
                                        <img src="{{ Storage::url($alumni->testimoni_alumni_img) }}" alt="{{ $alumni->testimoni_alumni_name }}">
                                    @else
                                        ▧ <small>FOTO ALUMNI</small>
                                    @endif
                                </div>
                                <div class="alumni-content">
                                    <span class="quote-mark">“</span>
                                    <p>{{ Str::limit($alumni->testimoni_alumni_description, 130) }}</p>
                                    <strong>{{ $alumni->testimoni_alumni_name }}</strong>
                                    <span>{{ $alumni->testimoni_alumni_position }}</span>
                                    <a href="#alumniModalOverlay" class="open-alumni-modal">Selengkapnya →</a>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <article class="alumni-card">
                            <div class="alumni-photo">
                                ▧ <small>FOTO ALUMNI</small>
                            </div>
                            <div class="alumni-content">
                                <span class="quote-mark">“</span>
                                <p>
                                    House Ilmu bukan cuma tempat untuk belajar, tapi juga tempat
                                    untuk bertemu orang-orang hebat, menemukan kesempatan baru,
                                    dan terus berkembang bersama.
                                </p>
                                <strong>Aiko</strong>
                                <span>Peserta dan Relawan HI</span>
                                <a href="#alumniModalOverlay" class="open-alumni-modal">Selengkapnya →</a>
                            </div>
                        </article>

                        <article class="alumni-card">
                            <div class="alumni-photo">
                                ▧ <small>FOTO ALUMNI</small>
                            </div>
                            <div class="alumni-content">
                                <span class="quote-mark">“</span>
                                <p>
                                    Di HI saya mendapatkan pengalaman, teman, dan pengetahuan baru.
                                    Saya juga bisa menerapkan pengetahuan yang saya miliki untuk
                                    mendukung kegiatan bersama.
                                </p>
                                <strong>Lina Dwi</strong>
                                <span>Staf House Ilmu Indonesia</span>
                                <a href="#alumniModalOverlay" class="open-alumni-modal">Selengkapnya →</a>
                            </div>
                        </article>

                        <article class="alumni-card">
                            <div class="alumni-photo">
                                ▧ <small>FOTO ALUMNI</small>
                            </div>
                            <div class="alumni-content">
                                <span class="quote-mark">“</span>
                                <p>
                                    Pengalamannya terasa berdampak karena saya belajar tentang
                                    team building, manajemen, dan pola pikir kepemimpinan.
                                </p>
                                <strong>Melinda</strong>
                                <span>Peserta Risyk</span>
                                <a href="#alumniModalOverlay" class="open-alumni-modal">Selengkapnya →</a>
                            </div>
                        </article>
                    @endif
                </div>

                <button class="alumni-arrow alumni-next" type="button" aria-label="Next">
                    ›
                </button>
            </div>

            <div class="text-center mt-6">
                <a href="{{ route('career.alumni-stories') }}" class="inline-block text-[#245fb5] font-bold text-sm hover:text-[#ff8417] transition-colors">
                    Lihat Semua Cerita Alumni →
                </a>
            </div>
        </div>
    </section>

    <!-- CAREER OPPORTUNITIES -->
    <section class="career-opportunities" id="career-opportunities">
        <div class="career-container">
            <div class="career-heading light-heading">
                <h2>CAREER OPPORTUNITIES</h2>
                <span class="heading-line"></span>
                <p>
                    Pilih divisi yang sesuai dengan minatmu dan tumbuh bersama tim lintas daerah.
                </p>
            </div>

            <div class="career-select-wrap">
                <label for="divisionFilter">Pilih divisi</label>
                <select id="divisionFilter">
                    <option value="all">Semua</option>
                    @foreach($divisions as $div)
                        <option value="{{ $div->slug }}">{{ $div->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="career-position-grid" id="careerPositionGrid">
                @foreach($divisions as $div)
                    <article class="position-card" data-division="{{ $div->slug }}">
                        <span class="position-tag">{{ $div->name }}</span>
                        <h3>{{ $div->name }}</h3>
                        <p>
                            @if($div->positions && $div->positions->count() > 0)
                                {{ $div->positions->count() }} posisi tersedia untuk bergabung bersama divisi {{ $div->name }}.
                            @else
                                Tumbuh bersama tim lintas daerah dan kembangkan potensimu di divisi {{ $div->name }}.
                            @endif
                        </p>
                        <div class="position-location">Daring &amp; Hibrida · Indonesia</div>
                        <a href="{{ route('career.division', $div->slug) }}">Lihat Detail →</a>
                    </article>
                @endforeach
            </div>

            <p id="positionEmpty" class="position-empty" hidden>
                Belum ada posisi pada divisi ini.
            </p>
        </div>
    </section>

    <!-- RECRUITMENT ANNOUNCEMENT -->
    <section class="career-recruitment" id="recruitment">
        <div class="career-container">
            <div class="career-heading">
                <h2>RECRUITMENT ANNOUNCEMENT</h2>
                <span class="heading-line"></span>
                <p>
                    Pilih status untuk melihat tampilan informasi rekrutmen yang sesuai.
                </p>
            </div>

            <div class="recruitment-tabs">
                <button type="button" class="recruitment-tab" data-status="open">
                    Pendaftaran Dibuka
                </button>

                <button type="button" class="recruitment-tab active" data-status="soon">
                    Stay Tuned
                </button>

                <button type="button" class="recruitment-tab" data-status="closed">
                    Rekrutmen Selesai
                </button>
            </div>

            <div class="recruitment-panel" id="recruitmentPanel">
                <span class="recruitment-label">STAY TUNED</span>
                <h3>Belum ada rekrutmen yang dibuka saat ini</h3>
                <p>
                    Informasi rekrutmen berikutnya akan diumumkan melalui kanal resmi House Ilmu Indonesia.
                </p>
            </div>

            <div class="text-center mt-6">
                <a href="{{ route('career.announcement') }}" class="career-btn-outline inline-block">
                    Halaman Detail Pengumuman →
                </a>
            </div>
        </div>
    </section>
</main>
@endsection
