@extends('layout.app')

@section('title', 'Artikel & Wawasan Karir | House Ilmu Indonesia')
@section('meta_description', 'Kumpulan artikel, tips karir, kewirausahaan, dan pengembangan keterampilan bagi mahasiswa dan generasi muda Indonesia.')

@section('content')
<!-- ==========================================================================
     HI ARTICLES Hero & Search/Filter Banner (Figma Exact Implementation)
     ========================================================================== -->
<section id="articles-hero" class="articles-hero-section">
    <div class="articles-hero-container">
        <!-- H1 Title: Libre Baskerville 700, 40px / 60px, -1px, #FFFFFF -->
        <h1 class="articles-hero-title">
            HI ARTICLES
        </h1>

        <!-- Subtitle: Poppins 400, 13.5px / 20px, #FFFFFF -->
        <p class="articles-hero-subtitle">
            Inspirasi dan informasi untuk menemani perjalanan belajar dan kariermu.
        </p>

        <!-- Search Input Box: W: 520px, H: 41px, rounded-full, #FFFFFF -->
        <div class="articles-search-wrap">
            <i class="fa-solid fa-magnifying-glass articles-search-icon" aria-hidden="true"></i>
            <input type="text"
                   id="articleSearchInput"
                   class="articles-search-input"
                   placeholder="Cari artikel..."
                   aria-label="Cari artikel..." />
        </div>

        <!-- Category Filter Pills: H: 35px, rounded-full -->
        <div class="articles-filter-wrap" role="tablist" aria-label="Filter Kategori Artikel">
            <button type="button"
                    class="articles-filter-pill active"
                    data-category="all"
                    role="tab"
                    aria-selected="true">
                Semua
            </button>
            <button type="button"
                    class="articles-filter-pill"
                    data-category="kewirausahaan"
                    role="tab"
                    aria-selected="false">
                Kewirausahaan
            </button>
            <button type="button"
                    class="articles-filter-pill"
                    data-category="pengembangan-keterampilan"
                    role="tab"
                    aria-selected="false">
                Pengembangan Keterampilan
            </button>
            <button type="button"
                    class="articles-filter-pill"
                    data-category="pengembangan-karier"
                    role="tab"
                    aria-selected="false">
                Pengembangan Karier
            </button>
        </div>
    </div>
</section>

<!-- ==========================================================================
     FEATURED ARTICLES Section & Articles Grid (#FFF9F0)
     ========================================================================== -->
<section id="articles-content" class="articles-content-section">
    <div class="articles-content-container">

        @php
            // Normalisasi kategori ke slug baku
            $normalizeCat = function($cat) {
                $c = strtolower(trim((string)$cat));
                if (str_contains($c, 'entrepreneur') || str_contains($c, 'wirausaha')) return 'kewirausahaan';
                if (str_contains($c, 'skill') || str_contains($c, 'keterampilan')) return 'pengembangan-keterampilan';
                if (str_contains($c, 'career') || str_contains($c, 'karier')) return 'pengembangan-karier';
                return \Illuminate\Support\Str::slug($cat);
            };

            $labelCat = function($cat) use ($normalizeCat) {
                $slug = $normalizeCat($cat);
                return match($slug) {
                    'kewirausahaan' => 'Kewirausahaan',
                    'pengembangan-keterampilan' => 'Pengembangan Keterampilan',
                    'pengembangan-karier' => 'Pengembangan Karier',
                    default => ucwords(str_replace('-', ' ', $slug))
                };
            };

            // Resolusi URL gambar artikel
            $resolveImg = function($img) {
                if (empty($img)) {
                    return asset('img/homepage/article/research1.webp');
                }
                if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://')) {
                    return $img;
                }
                if (file_exists(public_path('storage/' . $img))) {
                    return asset('storage/' . $img);
                }
                if (file_exists(public_path($img))) {
                    return asset($img);
                }
                return asset('img/homepage/article/research1.webp');
            };

            // Featured Article (Artikel Unggulan)
            $featured = $featuredArticle ?? ($articles->first() ?? null);
        @endphp

        <!-- Section Header: FEATURED ARTICLES -->
        <div class="featured-articles-header">
            <h2 class="featured-articles-title">
                FEATURED ARTICLES
            </h2>
            <div class="featured-articles-divider"></div>
        </div>

        <!-- Featured Article Big Card (2 Kolom: Gambar Kiri, Konten Kanan) -->
        @if($featured)
            @php
                $fCatSlug = $normalizeCat($featured->category ?? 'pengembangan-karier');
                $fCatLabel = $labelCat($featured->category ?? 'Pengembangan Karier');
                $fImg = $resolveImg($featured->img ?? '');
                $fTitle = $featured->title ?? 'Panduan Lengkap Menembus Magang Idaman di Perusahaan Top Tier untuk Fresh Graduate 2025';
                $fExcerpt = Str::limit(strip_tags($featured->text ?? 'Panduan untuk mempersiapkan langkah awal menuju kesempatan magang.'), 160);
                $fSlug = $featured->slug ?? 'panduan-lengkap-menembus-magang-idaman-di-perusahaan-top-tier-untuk-fresh-graduate-2025';
            @endphp

            <article class="featured-card">
                <!-- Thumbnail Kiri (W: 621, H: 275) -->
                <a href="{{ route('article.show', $fSlug) }}" class="featured-card-thumb-wrap">
                    <img src="{{ $fImg }}"
                         alt="{{ $fTitle }}"
                         class="featured-card-thumb"
                         loading="lazy"
                         decoding="async" />
                </a>

                <!-- Konten Kanan -->
                <div class="featured-card-body">
                    <span class="article-category-badge">
                        {{ $fCatLabel }}
                    </span>

                    <h3 class="featured-card-title">
                        <a href="{{ route('article.show', $fSlug) }}" class="featured-card-title-link">
                            {{ $fTitle }}
                        </a>
                    </h3>

                    <p class="featured-card-desc">
                        {{ $fExcerpt }}
                    </p>

                    <div class="featured-card-action-wrap">
                        <a href="{{ route('article.show', $fSlug) }}" class="featured-card-link">
                            <span>Baca Artikel</span>
                            <span class="link-arrow">&#8599;</span>
                        </a>
                    </div>
                </div>
            </article>
        @else
            <!-- Mock Fallback jika database belum berisi data artikel -->
            <article class="featured-card">
                <div class="featured-card-thumb-wrap">
                    <img src="{{ asset('img/homepage/article/skill-development1.webp') }}"
                         alt="Panduan Magang Top Tier"
                         class="featured-card-thumb"
                         loading="lazy" />
                </div>
                <div class="featured-card-body">
                    <span class="article-category-badge">
                        Pengembangan Karier
                    </span>
                    <h3 class="featured-card-title">
                        Panduan Lengkap Menembus Magang Idaman di Perusahaan Top Tier untuk Fresh Graduate 2025
                    </h3>
                    <p class="featured-card-desc">
                        Panduan untuk mempersiapkan langkah awal menuju kesempatan magang.
                    </p>
                    <div class="featured-card-action-wrap">
                        <a href="#" class="featured-card-link">
                            <span>Baca Artikel</span>
                            <span class="link-arrow">&#8599;</span>
                        </a>
                    </div>
                </div>
            </article>
        @endif

        <!-- ==================================================================
             All Articles Grid (Filterable 3 Kolom)
             ================================================================== -->
        <!-- Heading: Artikel Terbaru -->
        <div class="latest-articles-header">
            <h2 class="latest-articles-title">
                Artikel Terbaru
            </h2>
        </div>

        <div id="articlesGrid" class="articles-grid">
            @forelse($articles as $item)
                @php
                    $catSlug = $normalizeCat($item->category ?? 'kewirausahaan');
                    $catLabel = $labelCat($item->category ?? 'Kewirausahaan');
                    $imgSrc = $resolveImg($item->img ?? '');
                    $excerpt = Str::limit(strip_tags($item->text ?? ''), 110);
                @endphp

                <article class="article-card"
                         data-category="{{ $catSlug }}"
                         data-title="{{ strtolower($item->title) }}"
                         data-desc="{{ strtolower($excerpt) }}">
                    <!-- Card Thumbnail (W: 362, H: 165) -->
                    <a href="{{ route('article.show', $item->slug) }}" class="article-card-thumb-link">
                        <img src="{{ $imgSrc }}"
                             alt="{{ $item->title }}"
                             class="article-card-thumb"
                             loading="lazy"
                             decoding="async" />
                    </a>

                    <!-- Card Body (W: 362, H: Hug 194, Padding: 22) -->
                    <div class="article-card-body">
                        <span class="article-category-badge">
                            {{ $catLabel }}
                        </span>

                        <h3 class="article-card-title">
                            <a href="{{ route('article.show', $item->slug) }}" class="article-card-title-link">
                                {{ $item->title }}
                            </a>
                        </h3>

                        <p class="article-card-desc">
                            {{ $excerpt }}
                        </p>

                        <a href="{{ route('article.show', $item->slug) }}" class="article-card-link">
                            <span>Baca Selengkapnya</span>
                            <span class="link-arrow">&#8599;</span>
                        </a>
                    </div>
                </article>
            @empty
                <!-- Fallback 6 Mock Cards Sesuai Figma Prototype -->
                <article class="article-card" data-category="pengembangan-karier" data-title="panduan lengkap menembus magang idaman di perusahaan top tier untuk fresh graduate 2025">
                    <div class="article-card-thumb-link">
                        <img src="{{ asset('img/homepage/article/skill-development1.webp') }}" alt="Panduan Magang" class="article-card-thumb" />
                    </div>
                    <div class="article-card-body">
                        <span class="article-category-badge">Pengembangan Karier</span>
                        <h3 class="article-card-title">Panduan Lengkap Menembus Magang Idaman di Perusahaan Top Tier untuk Fresh Graduate 2025</h3>
                        <p class="article-card-desc">Jelajahi informasi dan tips dari House Ilmu Indonesia.</p>
                        <span class="article-card-link"><span>Baca Selengkapnya</span><span class="link-arrow">&#8599;</span></span>
                    </div>
                </article>

                <article class="article-card" data-category="kewirausahaan" data-title="membangun ide bisnis yang relevan untuk generasi muda">
                    <div class="article-card-thumb-link">
                        <img src="{{ asset('img/homepage/article/education1.webp') }}" alt="Ide Bisnis" class="article-card-thumb" />
                    </div>
                    <div class="article-card-body">
                        <span class="article-category-badge">Kewirausahaan</span>
                        <h3 class="article-card-title">Membangun Ide Bisnis yang Relevan untuk Generasi Muda</h3>
                        <p class="article-card-desc">Jelajahi informasi dan tips dari House Ilmu Indonesia.</p>
                        <span class="article-card-link"><span>Baca Selengkapnya</span><span class="link-arrow">&#8599;</span></span>
                    </div>
                </article>

                <article class="article-card" data-category="pengembangan-keterampilan" data-title="skill praktis untuk menunjang karier masa kini">
                    <div class="article-card-thumb-link">
                        <img src="{{ asset('img/homepage/article/research1.webp') }}" alt="Skill Praktis" class="article-card-thumb" />
                    </div>
                    <div class="article-card-body">
                        <span class="article-category-badge">Pengembangan Keterampilan</span>
                        <h3 class="article-card-title">Skill Praktis untuk Menunjang Karier Masa Kini</h3>
                        <p class="article-card-desc">Jelajahi informasi dan tips dari House Ilmu Indonesia.</p>
                        <span class="article-card-link"><span>Baca Selengkapnya</span><span class="link-arrow">&#8599;</span></span>
                    </div>
                </article>

                <article class="article-card" data-category="pengembangan-karier" data-title="mempersiapkan langkah awal menuju dunia kerja">
                    <div class="article-card-thumb-link">
                        <img src="{{ asset('img/homepage/article/skill-development1.webp') }}" alt="Dunia Kerja" class="article-card-thumb" />
                    </div>
                    <div class="article-card-body">
                        <span class="article-category-badge">Pengembangan Karier</span>
                        <h3 class="article-card-title">Mempersiapkan Langkah Awal Menuju Dunia Kerja</h3>
                        <p class="article-card-desc">Jelajahi informasi dan tips dari House Ilmu Indonesia.</p>
                        <span class="article-card-link"><span>Baca Selengkapnya</span><span class="link-arrow">&#8599;</span></span>
                    </div>
                </article>

                <article class="article-card" data-category="kewirausahaan" data-title="dari ide menjadi aksi: memulai project pertamamu">
                    <div class="article-card-thumb-link">
                        <img src="{{ asset('img/homepage/article/education1.webp') }}" alt="Project Pertama" class="article-card-thumb" />
                    </div>
                    <div class="article-card-body">
                        <span class="article-category-badge">Kewirausahaan</span>
                        <h3 class="article-card-title">Dari Ide Menjadi Aksi: Memulai Project Pertamamu</h3>
                        <p class="article-card-desc">Jelajahi informasi dan tips dari House Ilmu Indonesia.</p>
                        <span class="article-card-link"><span>Baca Selengkapnya</span><span class="link-arrow">&#8599;</span></span>
                    </div>
                </article>

                <article class="article-card" data-category="pengembangan-keterampilan" data-title="cara belajar skill baru dengan lebih terarah">
                    <div class="article-card-thumb-link">
                        <img src="{{ asset('img/homepage/article/research1.webp') }}" alt="Belajar Skill Baru" class="article-card-thumb" />
                    </div>
                    <div class="article-card-body">
                        <span class="article-category-badge">Pengembangan Keterampilan</span>
                        <h3 class="article-card-title">Cara Belajar Skill Baru dengan Lebih Terarah</h3>
                        <p class="article-card-desc">Jelajahi informasi dan tips dari House Ilmu Indonesia.</p>
                        <span class="article-card-link"><span>Baca Selengkapnya</span><span class="link-arrow">&#8599;</span></span>
                    </div>
                </article>
            @endforelse
        </div>

        <!-- No Results Feedback -->
        <div id="noResultsMsg" class="articles-no-results" style="display: none;">
            <i class="fa-regular fa-folder-open articles-no-results-icon"></i>
            <p>Tidak ada artikel yang sesuai dengan filter atau kata kunci pencarian Anda.</p>
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div id="articlesPagination" class="articles-pagination-wrap">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</section>

<!-- ==========================================================================
     Scoped CSS: 1:1 Pixel-Perfect Figma Specification
     ========================================================================== -->
<style>
/* --------------------------------------------------------------------------
   Hero & Search Section (#205EB6)
   -------------------------------------------------------------------------- */
.articles-hero-section {
    width: 100%;
    background-color: #205EB6;
    padding-top: 52px;
    padding-bottom: 50px;
    color: #FFFFFF;
    box-sizing: border-box;
    overflow: hidden;
}

.articles-hero-container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

/* H1: Libre Baskerville 700, 40px / 60px, -1px, #FFFFFF */
.articles-hero-title {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 40px !important;
    line-height: 60px !important;
    letter-spacing: -1px !important;
    color: #FFFFFF !important;
    text-transform: uppercase;
    margin: 0 0 14px 0;
    text-align: center;
}

/* Subtitle: Poppins 400, 13px / 19.5px, #FFFFFF */
.articles-hero-subtitle {
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
    font-size: 13px !important;
    line-height: 19.5px !important;
    letter-spacing: 0 !important;
    color: #FFFFFF !important;
    margin: 0 0 24px 0;
    max-width: 600px;
    text-align: center;
}

/* Search Box: W: 520px, H: 41px, rounded-full, #FFFFFF */
.articles-search-wrap {
    position: relative;
    width: 100%;
    max-width: 520px;
    margin-bottom: 18px;
}

.articles-search-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #94A3B8;
    font-size: 14px;
    pointer-events: none;
}

.articles-search-input {
    width: 100%;
    height: 41px;
    background-color: #FFFFFF;
    border-radius: 9999px;
    border: none;
    outline: none;
    padding-left: 44px;
    padding-right: 18px;
    font-family: 'Poppins', sans-serif !important;
    font-size: 13px !important;
    line-height: 19.5px !important;
    color: #0A2A59;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    box-sizing: border-box;
    transition: box-shadow 0.2s ease;
}

.articles-search-input:focus {
    box-shadow: 0 0 0 2px #FF8716, 0 4px 14px rgba(0, 0, 0, 0.12);
}

.articles-search-input::placeholder {
    color: #94A3B8;
    font-family: 'Poppins', sans-serif !important;
    font-size: 13px !important;
}

/* Category Filter Pills: H: 35px, Poppins 700 11px / 16.5px */
.articles-filter-wrap {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.articles-filter-pill {
    height: 35px;
    padding: 0 18px;
    border-radius: 9999px;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 700 !important;
    font-size: 11px !important;
    line-height: 16.5px !important;
    letter-spacing: 0 !important;
    cursor: pointer;
    background-color: #FFFFFF;
    color: #15549F;
    border: 1px solid #CFDBEA;
    box-sizing: border-box;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    user-select: none;
}

.articles-filter-pill:hover {
    color: #FF8716;
    border-color: #FF8716;
}

.articles-filter-pill.active {
    background-color: #FF8716;
    color: #FFFFFF;
    border-color: #FF8716;
    box-shadow: 0 2px 8px rgba(255, 135, 22, 0.35);
}

/* --------------------------------------------------------------------------
   Featured Articles & Grid Content (#FFF9F0)
   -------------------------------------------------------------------------- */
.articles-content-section {
    width: 100%;
    background-color: #FFF9F0;
    padding-top: 50px;
    padding-bottom: 70px;
    box-sizing: border-box;
    overflow: hidden;
}

.articles-content-container {
    width: 100%;
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
}

/* Featured Header */
.featured-articles-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 34px;
}

.featured-articles-title {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 27px !important;
    line-height: 32.4px !important;
    letter-spacing: -0.68px !important;
    color: #FB7D0B !important;
    text-transform: uppercase;
    margin: 0;
    text-align: center;
}

.featured-articles-divider {
    width: 48px;
    height: 3px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin-top: 12px;
    margin-bottom: 0;
}

/* Featured Big Card (2 Kolom: Gambar Kiri W: 621, Konten Kanan) */
.featured-card {
    background-color: #FFFFFF;
    border-radius: 12px;
    border: 1px solid #ECEEF2;
    box-shadow: 0 4px 18px rgba(10, 42, 89, 0.06);
    overflow: hidden;
    display: grid;
    grid-template-columns: 1fr;
    margin-bottom: 44px;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

@media (min-width: 992px) {
    .featured-card {
        grid-template-columns: minmax(0, 621px) minmax(0, 1fr);
    }
}

.featured-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(10, 42, 89, 0.12);
}

.featured-card-thumb-wrap {
    display: block;
    width: 100%;
    height: 275px;
    overflow: hidden;
    background-color: #E8EBEF;
    text-decoration: none;
}

.featured-card-thumb {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.35s ease;
}

.featured-card:hover .featured-card-thumb {
    transform: scale(1.03);
}

.featured-card-body {
    padding: 30px 38px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    box-sizing: border-box;
}

@media (max-width: 640px) {
    .featured-card-body {
        padding: 22px 20px;
    }
}

/* Category Badge (Light Blue Pill: W: hug, H: 23px, rounded 15px, Poppins 700 10px / 15px) */
.article-category-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #EAF2FF !important;
    color: #1656A5 !important;
    font-family: 'Poppins', sans-serif !important;
    font-weight: 700 !important;
    font-size: 10px !important;
    line-height: 15px !important;
    letter-spacing: 0 !important;
    padding: 4px 9px;
    border-radius: 15px;
    width: fit-content;
    margin-bottom: 12px;
}

/* Featured Title: Libre Baskerville 700 22px / 28.6px -0.55px #0A2B56 */
.featured-card-title,
.featured-card-title a,
.featured-card-title-link {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 22px !important;
    line-height: 28.6px !important;
    letter-spacing: -0.55px !important;
    color: #0A2B56 !important;
}

.featured-card-title {
    margin: 0 0 15px 0;
}

.featured-card-title-link {
    text-decoration: none;
    transition: color 0.15s ease;
}

.featured-card-title-link:hover {
    color: #EE7A0B !important;
}

/* Featured Excerpt: Poppins 400 12px / 20.4px #5F6D81 */
.featured-card-desc {
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
    font-size: 12px !important;
    line-height: 20.4px !important;
    letter-spacing: 0 !important;
    color: #5F6D81 !important;
    margin: 0 0 18px 0;
}

.featured-card-action-wrap {
    display: flex;
    align-items: center;
    margin-top: auto;
}

/* Featured Action Link: "Baca Artikel ↗", Poppins 800 11px / 16.5px #EE7A0B */
.featured-card-link,
.featured-card-link span {
    font-family: 'Poppins', sans-serif !important;
    font-weight: 800 !important;
    font-size: 11px !important;
    line-height: 16.5px !important;
    letter-spacing: 0 !important;
    color: #EE7A0B !important;
}

.featured-card-link {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    text-decoration: none;
    width: fit-content;
    transition: color 0.15s ease;
}

.featured-card-link:hover,
.featured-card-link:hover span {
    color: #D96C07 !important;
}

.featured-card-link .link-arrow {
    font-size: 11px !important;
    line-height: 1 !important;
    transition: transform 0.15s ease;
}

.featured-card-link:hover .link-arrow {
    transform: translate(2px, -2px);
}

/* Heading: Artikel Terbaru, Libre Baskerville 700 16px / 24px -0.4px #0B2853 */
.latest-articles-header {
    width: 100%;
    margin-bottom: 22px;
}

.latest-articles-title {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 16px !important;
    line-height: 24px !important;
    letter-spacing: -0.4px !important;
    color: #0B2853 !important;
    margin: 0;
    text-align: left;
}

/* --------------------------------------------------------------------------
   Articles 3-Col Grid (W: 362, Gap: 27px)
   -------------------------------------------------------------------------- */
.articles-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 27px;
    width: 100%;
}

@media (min-width: 640px) {
    .articles-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .articles-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

/* Article Card */
.article-card {
    background-color: #FFFFFF;
    border-radius: 12px;
    border: 1px solid #ECEEF2;
    box-shadow: 0 4px 14px rgba(10, 42, 89, 0.05);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.article-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 24px rgba(10, 42, 89, 0.12);
}

.article-card-thumb-link {
    display: block;
    width: 100%;
    height: 165px;
    overflow: hidden;
    background-color: #E8EBEF;
    text-decoration: none;
}

.article-card-thumb {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.35s ease;
}

.article-card:hover .article-card-thumb {
    transform: scale(1.04);
}

.article-card-body {
    padding: 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
    box-sizing: border-box;
}

/* Grid Card Title: Libre Baskerville 700 15px / 20.3px -0.38px #0A2A58 */
.article-card-title,
.article-card-title a,
.article-card-title-link {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 15px !important;
    line-height: 20.3px !important;
    letter-spacing: -0.38px !important;
    color: #0A2A58 !important;
}

.article-card-title {
    margin: 0 0 8px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 41px;
}

.article-card-title-link {
    text-decoration: none;
    transition: color 0.15s ease;
}

.article-card-title-link:hover {
    color: #EE7A0B !important;
}

/* Grid Card Excerpt: Poppins 400 11px / 17.6px #526078 */
.article-card-desc {
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
    font-size: 11px !important;
    line-height: 17.6px !important;
    letter-spacing: 0 !important;
    color: #526078 !important;
    margin: 0 0 16px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Article Card Action Link: "Baca Selengkapnya ↗", Poppins 800 11px / 16.5px #EE7A0B */
.article-card-link,
.article-card-link span {
    font-family: 'Poppins', sans-serif !important;
    font-weight: 800 !important;
    font-size: 11px !important;
    line-height: 16.5px !important;
    letter-spacing: 0 !important;
    color: #EE7A0B !important;
}

.article-card-link {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    margin-top: auto;
    text-decoration: none;
    width: fit-content;
    transition: color 0.15s ease;
}

.article-card-link:hover,
.article-card-link:hover span {
    color: #D96C07 !important;
}

.article-card-link .link-arrow {
    font-size: 11px !important;
    line-height: 1 !important;
    transition: transform 0.15s ease;
}

.article-card-link:hover .link-arrow {
    transform: translate(2px, -2px);
}

/* No Results Notification */
.articles-no-results {
    text-align: center;
    padding: 48px 20px;
    color: #68778C;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
}

.articles-no-results-icon {
    font-size: 38px;
    color: #CBD5E1;
    margin-bottom: 12px;
    display: block;
}

/* Pagination Wrap */
.articles-pagination-wrap {
    margin-top: 48px;
    display: flex;
    justify-content: center;
}

@media (max-width: 640px) {
    .articles-hero-section {
        padding-top: 36px;
        padding-bottom: 36px;
    }

    .articles-hero-title {
        font-size: 26px !important;
        line-height: 36px !important;
        margin-bottom: 10px !important;
    }

    .articles-hero-subtitle {
        font-size: 12.5px !important;
        line-height: 18.5px !important;
        margin-bottom: 18px !important;
    }

    .articles-search-wrap {
        max-width: 100%;
        margin-bottom: 14px;
    }

    .articles-filter-wrap {
        gap: 8px;
    }

    .articles-filter-pill {
        height: 32px;
        padding: 0 14px;
        font-size: 11px !important;
    }

    .articles-content-section {
        padding-top: 36px;
        padding-bottom: 50px;
    }

    .featured-articles-header {
        margin-bottom: 22px;
    }

    .featured-articles-title {
        font-size: 22px !important;
        line-height: 28px !important;
    }

    .featured-card {
        margin-bottom: 32px;
    }

    .featured-card-thumb-wrap {
        height: auto;
        aspect-ratio: 16 / 10;
        min-height: 180px;
    }

    .featured-card-body {
        padding: 20px 18px;
    }

    .featured-card-title,
    .featured-card-title a,
    .featured-card-title-link {
        font-size: 18px !important;
        line-height: 25px !important;
    }

    .featured-card-desc {
        font-size: 12px !important;
        line-height: 19px !important;
        margin-bottom: 14px !important;
    }

    .articles-grid {
        gap: 20px;
    }

    .article-card-thumb-link {
        height: auto;
        aspect-ratio: 16 / 9;
        min-height: 160px;
    }

    .article-card-body {
        padding: 18px;
    }

    .article-card-title,
    .article-card-title a,
    .article-card-title-link {
        font-size: 14.5px !important;
        line-height: 20px !important;
    }

    .article-card-desc {
        font-size: 11px !important;
        line-height: 17px !important;
        margin-bottom: 14px !important;
    }

    .articles-pagination-wrap {
        margin-top: 32px;
    }
}
</style>
@endsection

<!-- ==========================================================================
     Interactive Instant Filter & Search Script
     ========================================================================== -->
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('articleSearchInput');
    const filterPills = document.querySelectorAll('.articles-filter-pill');
    const articleCards = document.querySelectorAll('.article-card');
    const noResultsMsg = document.getElementById('noResultsMsg');
    const paginationWrap = document.getElementById('articlesPagination');

    let currentCategory = 'all';
    let searchQuery = '';

    function filterArticles() {
        let visibleCount = 0;

        articleCards.forEach(card => {
            const cardCat = card.getAttribute('data-category') || '';
            const cardTitle = card.getAttribute('data-title') || '';
            const cardDesc = card.getAttribute('data-desc') || '';

            const matchCat = (currentCategory === 'all') || (cardCat === currentCategory);
            const matchSearch = !searchQuery || cardTitle.includes(searchQuery) || cardDesc.includes(searchQuery);

            if (matchCat && matchSearch) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (noResultsMsg) {
            noResultsMsg.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        if (paginationWrap) {
            paginationWrap.style.display = (currentCategory === 'all' && !searchQuery) ? 'flex' : 'none';
        }
    }

    // Filter Pill Click
    filterPills.forEach(pill => {
        pill.addEventListener('click', function () {
            filterPills.forEach(p => {
                p.classList.remove('active');
                p.setAttribute('aria-selected', 'false');
            });

            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');

            currentCategory = this.getAttribute('data-category');
            filterArticles();
        });
    });

    // Real-time Instant Search
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            searchQuery = this.value.trim().toLowerCase();
            filterArticles();
        });

        searchInput.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                this.value = '';
                searchQuery = '';
                filterArticles();
            }
        });
    }
});
</script>
@endsection
