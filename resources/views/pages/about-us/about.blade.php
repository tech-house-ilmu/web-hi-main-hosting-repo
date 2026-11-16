@extends('layout.app')

@section('title', 'About Us | House Ilmu Indonesia')
@section('meta_description', 'Kenali House Ilmu Indonesia, visi misi, culture DEALS, founder, dan perjalanan kami dalam mendukung pengembangan karir generasi muda.')

@section('content')
<main class="hi-page">
    <!-- Hero (mengikuti desain Figma) -->
    <section class="hi-hero">
        <div class="hi-wrap">
            <h1>Better Career for Better Future</h1>
            <p class="hi-hero-sub">House Ilmu adalah sebuah platform yang bergerak di bidang career development dengan mengedepankan unsur sosial untuk memberikan impact bagi generasi muda.</p>
        </div>
    </section>

    <!-- Vision & mission -->
    <section class="hi-block">
        <div class="hi-wrap" style="max-width:1125px">
            <h2 class="hi-title">Our Vision &amp; Mission</h2>
            <div class="hi-vision">
                <p class="hi-eyebrow">Visi Kami</p>
                <h3>Menjadi kawan bagi generasi muda dalam pengembangan karir yang berfokus pada soft skill dan life skill.</h3>
            </div>
            <div class="hi-mission-grid">
                <div class="hi-mission">
                    <span>01</span>
                    <p>Memfasilitasi generasi muda untuk mengenali passion diri guna menentukan karir masa depan.</p>
                </div>
                <div class="hi-mission">
                    <span>02</span>
                    <p>Meningkatkan soft skill dan life skill generasi muda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Culture & values -->
    <section class="hi-block hi-culture">
        <div class="hi-wrap-wide" style="max-width:1424px">
            <h2 class="hi-title hi-title-light">Our Culture &amp; Values</h2>
            <div class="hi-culture-top">
                <div class="hi-culture-card">
                    <p class="hi-eyebrow">Core Value</p>
                    <h3>Edusociopreneur</h3>
                </div>
                <div class="hi-culture-card">
                    <p class="hi-eyebrow">Our Value</p>
                    <h3>Learn, Grow, and Get Achievement Together</h3>
                </div>
                <div class="hi-culture-card">
                    <p class="hi-eyebrow">Culture</p>
                    <h3>DEALS</h3>
                </div>
            </div>
            <div class="hi-deals">
                <div class="hi-deal">
                    <b>D</b>
                    <h3>Discipline</h3>
                    <p>Meninggalkan budaya “jam karet”, baik dalam ketepatan waktu maupun penyelesaian tugas.</p>
                </div>
                <div class="hi-deal">
                    <b>E</b>
                    <h3>Entrepreneur</h3>
                    <p>Memiliki jiwa entrepreneur untuk mendukung project/program HI.</p>
                </div>
                <div class="hi-deal">
                    <b>A</b>
                    <h3>Agile</h3>
                    <p>Merespons perubahan dengan inovasi dan mampu beradaptasi dengan cepat.</p>
                </div>
                <div class="hi-deal">
                    <b>L</b>
                    <h3>Learning</h3>
                    <p>Memiliki mindset bahwa “setiap orang tidak pernah berhenti belajar”.</p>
                </div>
                <div class="hi-deal">
                    <b>S</b>
                    <h3>Social</h3>
                    <p>Menjunjung tinggi nilai sosial, baik untuk internal maupun eksternal House Ilmu Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Founder -->
    <section class="hi-block">
        <div class="hi-wrap-wide" style="max-width:1424px">
            <div class="hi-founder">
                <img src="{{ asset('img/homepage/about/lutfia-rahmannisa-founder.png') }}"
                     alt="Lutfia Rahmannisa, Founder &amp; CEO House Ilmu Indonesia"
                     loading="lazy">
                <div>
                    <p class="hi-eyebrow">Mengenal Founder Kami</p>
                    <h2>Lutfia Rahmannisa</h2>
                    <p class="hi-role">Founder &amp; Chief Executive Officer House Ilmu Indonesia</p>
                    <p>Lutfia Rahmannisa, atau yang akrab disapa Kak Fia, adalah seorang sociopreneur muda. Di tengah kesibukannya menempuh studi Master Leadership and Policy Innovation di Universitas Gadjah Mada, Kak Fia aktif mendedikasikan dirinya sebagai teman cerita bagi anak muda di media sosial.</p>
                    <p>Melalui konten-kontennya, ia konsisten mengedukasi dan merangkul generasi muda untuk terus bertumbuh dalam kepemimpinan dan pengembangan diri.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey -->
    <section class="hi-block" style="padding-top:2rem">
        <div class="hi-wrap-wide" style="max-width:1224px">
            <h2 class="hi-title">Our Journey</h2>
            <p class="hi-lead">Cerita House Ilmu Indonesia dari ruang belajar di masa pandemi hingga terus bertumbuh bersama generasi muda.</p>

            <div class="hi-tl">
                <!-- 2020 -->
                <article class="hi-tl-item">
                    <div class="hi-tl-card">
                        <p class="hi-year">2020</p>
                        <h3>Awal Perjalanan House Ilmu Indonesia</h3>
                        <h4>Cerita Singkat</h4>
                        <p>House Ilmu Indonesia terbentuk di tengah masa COVID-19. Founder House Ilmu Indonesia memiliki keinginan untuk membangun organisasi yang tetap dapat membawa dampak meskipun aktivitas masyarakat banyak dilakukan dari rumah.</p>
                        <p>House Ilmu Indonesia mulai menjadi ruang untuk tetap belajar, berkembang, dan mendapatkan akses ilmu di tengah keterbatasan mobilitas.</p>
                        <h4>Fokus Pengembangan</h4>
                        <ul><li>Self Development</li><li>Self Love</li><li>Education</li><li>Personal Development</li></ul>
                        <h4>Program yang Berkembang</h4>
                        <ul><li>Webinar</li><li>Instagram Live</li><li>Workshop persiapan lomba debat</li><li>Program edukasi online</li></ul>
                        <h4>Kerja Sama</h4>
                        <ul><li>Cakap</li><li>Phillip Sekuritas</li><li>RISYIK Collaboration</li></ul>
                    </div>
                    <div class="hi-tl-media" role="img" aria-label="Dokumentasi 2020">
                        <img src="{{ asset('img/about-us/history/2020-phillip-sekuritas.png') }}" alt="Poster kolaborasi Phillip Sekuritas Indonesia x House Ilmu Indonesia 2020" loading="lazy">
                    </div>
                </article>

                <!-- 2021 -->
                <article class="hi-tl-item">
                    <div class="hi-tl-card">
                        <p class="hi-year">2021</p>
                        <h3>Memperluas Kolaborasi dan Dampak</h3>
                        <h4>Cerita Singkat</h4>
                        <p>Pada 2021, House Ilmu Indonesia mulai memperluas jaringan kolaborasi melalui berbagai media partnership dan event collaboration.</p>
                        <p>Fokus kegiatan berkembang menjadi tiga topik utama yang dekat dengan kehidupan generasi muda.</p>
                        <h4>Fokus Pengembangan</h4>
                        <ul><li>Education</li><li>Environment</li><li>Lifestyle</li></ul>
                        <h4>Program yang Berkembang</h4>
                        <ul><li>Instagram Live</li><li>Webinar</li><li>Collaborative Events</li></ul>
                        <h4>Kerja Sama</h4>
                        <ul><li>Pemimpin.id</li><li>Social Connect</li><li>Media Partners</li><li>Event Collaborations</li></ul>
                    </div>
                    <div class="hi-tl-media" role="img" aria-label="Dokumentasi 2021">
                        <img src="{{ asset('img/about-us/history/2021-pemimpin-risyik.png') }}" alt="Poster program Risyik 5.0 bersama Pemimpin.id 2021" loading="lazy">
                    </div>
                </article>

                <!-- 2022 -->
                <article class="hi-tl-item">
                    <div class="hi-tl-card">
                        <p class="hi-year">2022</p>
                        <h3>Memulai Perjalanan Volunteer</h3>
                        <h4>Cerita Singkat</h4>
                        <p>Pada 2022, House Ilmu Indonesia resmi meluncurkan open recruitment untuk volunteer.</p>
                        <p>House Ilmu Indonesia terus mempertahankan program dan event yang sudah berjalan sambil mulai mengembangkan format program baru.</p>
                        <h4>Fokus Pengembangan</h4>
                        <ul><li>Youth Development</li><li>Education</li><li>Social Impact</li><li>Skill Development</li></ul>
                        <h4>Program yang Berkembang</h4>
                        <ul><li>Volunteer Program</li><li>Podcast</li><li>Campaign</li><li>Development Programs</li></ul>
                        <h4>Kerja Sama</h4>
                        <ul><li>Community Collaboration</li><li>Social Impact Collaboration</li><li>Program Collaboration untuk penyandang disabilitas</li></ul>
                    </div>
                    <div class="hi-tl-media" role="img" aria-label="Dokumentasi 2022">
                        <img src="{{ asset('img/about-us/history/2022-open-recruitment-volunteer.png') }}" alt="Poster open recruitment volunteer House Ilmu Indonesia 2022" loading="lazy">
                    </div>
                </article>

                <!-- 2023 -->
                <article class="hi-tl-item">
                    <div class="hi-tl-card">
                        <p class="hi-year">2023</p>
                        <h3>HI Fest dan Pengembangan Internal</h3>
                        <h4>Cerita Singkat</h4>
                        <p>Pada 2023, House Ilmu Indonesia mulai menghadirkan program-program baru yang memperluas pengalaman belajar dan interaksi generasi muda.</p>
                        <h4>Fokus Pengembangan</h4>
                        <ul><li>Youth Development</li><li>Career</li><li>Personal Growth</li></ul>
                        <h4>Program yang Berkembang</h4>
                        <ul><li>HI Fest</li><li>Growth at House Ilmu</li><li>Staff &amp; Volunteer Development</li></ul>
                        <h4>Kerja Sama</h4>
                        <ul><li>Event Collaboration</li><li>Community Collaboration</li><li>Media Partnership</li></ul>
                    </div>
                    <div class="hi-tl-media" role="img" aria-label="Dokumentasi 2023">
                        <img src="{{ asset('img/about-us/history/2023-hi-fest.png') }}" alt="Poster HI Fest House Ilmu Indonesia 2023" loading="lazy">
                    </div>
                </article>

                <!-- 2024 -->
                <article class="hi-tl-item">
                    <div class="hi-tl-card">
                        <p class="hi-year">2024</p>
                        <h3>Career Development</h3>
                        <h4>Cerita Singkat</h4>
                        <p>Pada 2024, House Ilmu Indonesia semakin memperkuat fokus pada persiapan generasi muda menghadapi dunia kerja dan pengembangan skill.</p>
                        <h4>Fokus Pengembangan</h4>
                        <ul><li>Career Preparation</li><li>Career Development</li><li>Skill Development</li></ul>
                        <h4>Program yang Berkembang</h4>
                        <ul><li>Sudut Karir</li><li>Review CV</li><li>Webskill</li><li>Reels Challenge</li><li>Career-related programs</li></ul>
                        <h4>Kerja Sama</h4>
                        <ul><li>Career-related collaborations</li><li>Community Collaboration</li><li>Event Collaboration</li></ul>
                    </div>
                    <div class="hi-tl-media" role="img" aria-label="Dokumentasi 2024">
                        <img src="{{ asset('img/about-us/history/2024-cv-review.png') }}" alt="Poster professional CV review House Ilmu Indonesia 2024" loading="lazy">
                    </div>
                </article>

                <!-- 2025 -->
                <article class="hi-tl-item">
                    <div class="hi-tl-card">
                        <p class="hi-year">2025</p>
                        <h3>Memperluas Akses dan Eksplorasi Karier</h3>
                        <h4>Cerita Singkat</h4>
                        <p>Pada 2025, House Ilmu Indonesia terus mengembangkan program yang membantu generasi muda mengenal dunia karier, membangun skill, dan mendapatkan exposure terhadap berbagai peluang.</p>
                        <h4>Fokus Pengembangan</h4>
                        <ul><li>Career Development</li><li>Self Development</li><li>Skill Development</li></ul>
                        <h4>Program yang Berkembang</h4>
                        <ul><li>Career Chapter</li><li>Brand Ambassador</li><li>Career-related programs</li><li>Skill Development Programs</li></ul>
                        <h4>Kerja Sama</h4>
                        <ul><li>Community Collaboration</li><li>Event Collaboration</li><li>Media Partnership</li></ul>
                    </div>
                    <div class="hi-tl-media" role="img" aria-label="Dokumentasi 2025">
                        <img src="{{ asset('img/about-us/history/2025-hi-festival.png') }}" alt="Poster festival House Ilmu Indonesia 2025" loading="lazy">
                    </div>
                </article>

                <!-- 2026 -->
                <article class="hi-tl-item">
                    <div class="hi-tl-card">
                        <p class="hi-year">2026</p>
                        <h3>Fokus pada Persiapan Masa Depan</h3>
                        <h4>Cerita Singkat</h4>
                        <p>Memasuki 2026, House Ilmu Indonesia semakin memfokuskan arah pengembangan pada persiapan karier dan pengembangan diri generasi muda.</p>
                        <p>House Ilmu Indonesia ingin menjadi ruang yang membantu Kawaners mengenali dirinya, menemukan arah, mengembangkan skill, dan mempersiapkan masa depan.</p>
                        <h4>Fokus Pengembangan</h4>
                        <ul><li>Career Preparation</li><li>Career Development</li><li>Self Development</li></ul>
                        <h4>Program yang Berkembang</h4>
                        <ul><li>Webskill</li><li>Workskill</li><li>Opportunity Corners</li><li>Sudut Karir</li><li>Chill-Ups</li><li>#MainkeKantor</li></ul>
                        <h4>Kerja Sama</h4>
                        <ul><li>Community Collaboration</li><li>Event Collaboration</li><li>Media Partnership</li><li>Strategic Partnerships</li></ul>
                    </div>
                    <div class="hi-tl-media" role="img" aria-label="Dokumentasi 2026">
                        <img src="{{ asset('img/about-us/history/2026-webinar-career.png') }}" alt="Poster webinar dan career opportunities House Ilmu Indonesia 2026" loading="lazy">
                    </div>
                </article>
            </div>

            <div class="hi-actions">
                <a class="hi-btn" href="{{ route('about.our-team') }}">Kenali Tim Kami →</a>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="hi-cta">
        <div class="hi-wrap">
            <h2>Be Part of House Ilmu</h2>
            <p>Mari belajar, terhubung, dan tumbuh bersama House Ilmu Indonesia.</p>
            <a class="hi-btn" href="{{ route('career.index') }}">Gabung Sekarang ↗</a>
        </div>
    </section>
</main>
@endsection
