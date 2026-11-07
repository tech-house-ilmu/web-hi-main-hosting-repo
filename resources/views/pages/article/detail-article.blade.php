@extends('layout.app')

@php
    // Normalisasi Kategori
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

    // Resolusi Gambar
    $resolveImg = function($img) {
        if (empty($img)) {
            return null;
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
        return null;
    };

    $catSlug = $normalizeCat($article->category ?? 'pengembangan-karier');
    $catLabel = $labelCat($article->category ?? 'Pengembangan Karier');
    $imgSrc = $resolveImg($article->img ?? '');
    $articleUrl = route('article.show', $article->slug);

    // Parsing Headings (H2) dari teks artikel untuk Table of Contents
    $rawText = $article->text ?? '';
    $tocItems = [];
    $processedText = $rawText;

    if (!empty($rawText)) {
        // Cari semua tag <h2>
        if (preg_match_all('/<h2([^>]*)>(.*?)<\/h2>/is', $rawText, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $idx => $match) {
                $attrs = $match[1];
                $titleText = strip_tags($match[2]);
                $titleTextClean = trim($titleText);

                // Ambil atau buat ID anchor
                $id = '';
                if (preg_match('/id=["\']([^"\']+)["\']/i', $attrs, $idMatch)) {
                    $id = $idMatch[1];
                } else {
                    $id = 'section-' . ($idx + 1) . '-' . \Illuminate\Support\Str::slug(substr($titleTextClean, 0, 40));
                    // Inject ID ke heading jika belum ada
                    $replacement = '<h2 id="' . $id . '"' . $attrs . '>' . $match[2] . '</h2>';
                    $processedText = str_replace($match[0], $replacement, $processedText);
                }

                $tocItems[] = [
                    'id' => $id,
                    'title' => $titleTextClean,
                ];
            }
        }
    }
@endphp

@section('title', $article->title . ' | House Ilmu Indonesia')
@section('meta_description', Str::limit(strip_tags($article->text), 155))
@section('og_title', $article->title)
@section('og_description', Str::limit(strip_tags($article->text), 155))
@section('og_image', $imgSrc)
@section('twitter_title', $article->title)
@section('twitter_description', Str::limit(strip_tags($article->text), 155))
@section('twitter_image', $imgSrc)

@section('content')
<!-- ==========================================================================
     ARTICLE DETAIL PAGE (1:1 Pixel-Perfect Figma Implementation)
     Section Background: #FFF9F0
     Max-Width: 1140px Centered
     ========================================================================== -->
<div class="article-detail-page">
    <div class="article-detail-container">

        <!-- ==================================================================
             TOP BAR: Back Button & Breadcrumbs
             ================================================================== -->
        <div class="article-top-bar">
            <!-- Back Button: W: 134, H: 30, Poppins 700 12px/18px #0A2D5C -->
            <a href="{{ route('article.index') }}" class="article-back-link" aria-label="Kembali ke Artikel HI">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                <span>Kembali ke Artikel HI</span>
            </a>

            <!-- Breadcrumbs: Poppins 400 11px/16.5px #61718A -->
            <nav class="article-breadcrumb-nav" aria-label="Breadcrumb">
                <ol class="article-breadcrumb-list">
                    <li>
                        <a href="{{ route('article.index') }}" class="breadcrumb-link">Artikel HI</a>
                    </li>
                    <li class="breadcrumb-separator">/</li>
                    <li>
                        <a href="{{ route('article.index', ['category' => $catSlug]) }}" class="breadcrumb-link">{{ $catLabel }}</a>
                    </li>
                    <li class="breadcrumb-separator">/</li>
                    <li class="breadcrumb-current" aria-current="page">
                        {{ Str::limit($article->title, 45) }}
                    </li>
                </ol>
            </nav>
        </div>

        <!-- ==================================================================
             ARTICLE HEADER: Title (H1) & Meta Row
             ================================================================== -->
        <header class="article-header">
            <!-- Title: Libre Baskerville 700, 46px / 53.4px, -1px, #0B2853, W: max 900px -->
            <h1 class="article-main-title">
                {{ $article->title }}
            </h1>

            <!-- Meta Row: Author / Date (Left) & Share Action (Right) -->
            <div class="article-meta-row">
                <div class="article-meta-left">
                    <span class="article-brand-author">
                        {{ $article->author ?? 'House Ilmu Indonesia' }}
                    </span>
                    <span class="article-meta-dot">•</span>
                    <time datetime="{{ \Carbon\Carbon::parse($article->date)->toDateString() }}" class="article-meta-date">
                        {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }}
                    </time>
                </div>

                <div class="article-meta-right">
                    <button type="button"
                            id="articleShareBtn"
                            class="article-share-btn"
                            onclick="handleArticleShare('{{ addslashes($article->title) }}', '{{ $articleUrl }}')"
                            aria-label="Bagikan artikel ini">
                        <span>Bagikan</span>
                        <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- ==================================================================
             HERO BANNER IMAGE: W: 1140px, H: 365px, Radius: 6px, Bg: #DDE4ED
             ================================================================== -->
        <div class="article-hero-banner">
            @if(!empty($imgSrc))
                <img src="{{ $imgSrc }}"
                     alt="{{ $article->title }}"
                     class="article-hero-img"
                     loading="eager"
                     decoding="async" />
            @else
                <div class="article-placeholder-inner">
                    <i class="fa-regular fa-image article-placeholder-icon" aria-hidden="true"></i>
                    <span class="article-placeholder-label">GAMBAR ARTIKEL</span>
                </div>
            @endif
        </div>

        <!-- ==================================================================
             MAIN 2-COLUMN SECTION: Content (Left W: 730px) + Sidebar (Right W: 350px)
             ================================================================== -->
        <div class="article-body-layout">

            <!-- ==============================================================
                 LEFT COLUMN: Article Body (Max W: 730px)
                 ============================================================== -->
            <main class="article-content-column">
                <div class="article-typography-content">
                    {!! $processedText !!}
                </div>

                <!-- Social Media Sharing & Engagement Footnote -->
                <div class="article-social-footer">
                    <span class="social-footer-label">Bagikan artikel ini:</span>
                    <div class="social-footer-icons">
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($articleUrl) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-icon-btn linkedin"
                           aria-label="Bagikan ke LinkedIn">
                            <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode($articleUrl) }}&text={{ urlencode($article->title) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-icon-btn twitter"
                           aria-label="Bagikan ke Twitter / X">
                            <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . $articleUrl) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="social-icon-btn whatsapp"
                           aria-label="Bagikan ke WhatsApp">
                            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                        </a>
                        <button type="button"
                                class="social-icon-btn copy"
                                onclick="copyArticleUrl('{{ $articleUrl }}')"
                                aria-label="Salin tautan artikel"
                                title="Salin Tautan">
                            <i class="fa-solid fa-link" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </main>

            <!-- ==============================================================
                 RIGHT COLUMN: Sticky Sidebar Table of Contents (W: 350px)
                 ============================================================== -->
            <aside class="article-sidebar-column">
                <div class="article-toc-box" id="articleTocBox">
                    <div class="article-toc-header">
                        <h2 class="article-toc-title">
                            Daftar Isi
                        </h2>
                        <!-- Mobile Accordion Toggle -->
                        <button type="button"
                                class="article-toc-mobile-toggle"
                                id="tocMobileToggle"
                                aria-expanded="false"
                                aria-controls="tocListNav"
                                onclick="toggleMobileToc()">
                            <span id="tocToggleText">Buka</span>
                            <i class="fa-solid fa-chevron-down" id="tocToggleIcon" aria-hidden="true"></i>
                        </button>
                    </div>

                    <nav class="article-toc-nav" id="tocListNav" aria-label="Daftar Isi Artikel">
                        @if(count($tocItems) > 0)
                            <ul class="article-toc-list">
                                @foreach($tocItems as $item)
                                    <li class="article-toc-item">
                                        <a href="#{{ $item['id'] }}"
                                           class="article-toc-link"
                                           data-target="{{ $item['id'] }}">
                                            {{ $item['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            {{-- Fallback jika artikel tanpa tag H2 terstruktur --}}
                            <ul class="article-toc-list">
                                <li class="article-toc-item">
                                    <a href="#" class="article-toc-link active">
                                        {{ Str::limit($article->title, 40) }}
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </nav>

                    <div class="article-toc-divider"></div>

                    <!-- Bottom Link: ← Semua Artikel (Poppins 700 11px #FF8A18) -->
                    <a href="{{ route('article.index') }}" class="article-all-link">
                        <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                        <span>Semua Artikel</span>
                    </a>
                </div>
            </aside>

        </div>

        <!-- ==================================================================
             MORE RELATED ARTICLES SECTION:
             Title: Libre Baskerville 700 27px/32.4px -0.68px #FB7D0B
             Divider: 48px x 3px orange #FF8B18
             Grid: 3 Cards (W: 362px, H: 165px)
             ================================================================== -->
        @if(isset($relatedArticles) && $relatedArticles->count() > 0)
            <section class="related-articles-section" aria-labelledby="relatedArticlesTitle">
                <div class="related-articles-header">
                    <h2 id="relatedArticlesTitle" class="related-articles-title">
                        MORE RELATED ARTICLES
                    </h2>
                    <div class="related-articles-divider"></div>
                </div>

                <div class="related-articles-grid">
                    @foreach($relatedArticles as $rel)
                        @php
                            $relCatSlug = $normalizeCat($rel->category ?? 'pengembangan-karier');
                            $relCatLabel = $labelCat($rel->category ?? 'Pengembangan Karier');
                            $relImg = $resolveImg($rel->img ?? '');
                            $relExcerpt = Str::limit(strip_tags($rel->text ?? ''), 115);
                            $relUrl = route('article.show', $rel->slug);
                        @endphp

                        <article class="related-card">
                            <!-- Card Thumbnail (W: 362, H: 165) -->
                            <a href="{{ $relUrl }}" class="related-card-thumb-wrap" aria-label="{{ $rel->title }}">
                                @if(!empty($relImg))
                                    <img src="{{ $relImg }}"
                                         alt="{{ $rel->title }}"
                                         class="related-card-thumb"
                                         loading="lazy"
                                         decoding="async" />
                                @else
                                    <div class="related-card-placeholder-inner">
                                        <i class="fa-regular fa-image" aria-hidden="true"></i>
                                        <span>GAMBAR ARTIKEL</span>
                                    </div>
                                @endif
                            </a>

                            <!-- Card Body (Padding: 22px) -->
                            <div class="related-card-body">
                                <span class="related-card-badge">
                                    {{ $relCatLabel }}
                                </span>

                                <h3 class="related-card-title">
                                    <a href="{{ $relUrl }}" class="related-card-title-link">
                                        {{ $rel->title }}
                                    </a>
                                </h3>

                                <p class="related-card-desc">
                                    {{ $relExcerpt }}
                                </p>

                                <a href="{{ $relUrl }}" class="related-card-link">
                                    <span>Baca Selengkapnya</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

    </div>
</div>

<!-- ==========================================================================
     FLOATING BACK TO TOP BUTTON (#0B2247 Circle, White Arrow)
     ========================================================================== -->
<button type="button"
        id="detailScrollTopBtn"
        class="detail-scroll-top-btn"
        onclick="scrollToTopSmooth()"
        aria-label="Kembali ke atas"
        title="Kembali ke atas">
    <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
</button>

<!-- ==========================================================================
     TOAST NOTIFICATION (For Copy Link & Alerts)
     ========================================================================== -->
<div id="articleToast" class="article-toast" role="status" aria-live="polite">
    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
    <span id="articleToastMsg">Tautan berhasil disalin ke papan klip!</span>
</div>

<!-- ==========================================================================
     SCOPED 1:1 FIGMA PIXEL-PERFECT CSS
     ========================================================================== -->
<style>
/* ----------------------------------------------------------------------------
   Page Shell & Background
   ---------------------------------------------------------------------------- */
.article-detail-page {
    width: 100%;
    background-color: #FFF9F0 !important;
    min-height: 100vh;
    padding-top: 36px;
    padding-bottom: 80px;
    box-sizing: border-box;
}

.article-detail-container {
    width: 100%;
    max-width: 1140px;
    margin: 0 auto;
    padding: 0 20px;
    box-sizing: border-box;
}

@media (min-width: 768px) {
    .article-detail-page {
        padding-top: 44px;
        padding-bottom: 96px;
    }
    .article-detail-container {
        padding: 0 24px;
    }
}

/* ----------------------------------------------------------------------------
   Top Bar: Back Link & Breadcrumb
   ---------------------------------------------------------------------------- */
.article-top-bar {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 18px;
}

/* Back Link: Poppins 700, 12px / 18px, #0A2D5C */
.article-back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    height: 30px;
    font-family: 'Poppins', sans-serif !important;
    font-size: 12px !important;
    font-weight: 700 !important;
    line-height: 18px !important;
    color: #0A2D5C !important;
    text-decoration: none;
    transition: color 0.2s ease, transform 0.2s ease;
}

.article-back-link:hover {
    color: #FF8A18 !important;
    transform: translateX(-2px);
}

.article-back-link i {
    font-size: 11px;
}

/* Breadcrumbs: Poppins 400, 11px / 16.5px, #61718A */
.article-breadcrumb-nav {
    width: 100%;
    overflow-x: auto;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
}
.article-breadcrumb-nav::-webkit-scrollbar {
    display: none;
}

.article-breadcrumb-list {
    display: flex;
    align-items: center;
    gap: 6px;
    list-style: none;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif !important;
    font-size: 11px !important;
    font-weight: 400 !important;
    line-height: 16.5px !important;
    color: #61718A !important;
}

.breadcrumb-link {
    color: #61718A !important;
    text-decoration: none;
    transition: color 0.15s ease;
}

.breadcrumb-link:hover {
    color: #0A2D5C !important;
    text-decoration: underline;
}

.breadcrumb-separator {
    color: #8C9BAE !important;
    font-size: 10px;
}

.breadcrumb-current {
    color: #0B2853 !important;
    font-weight: 500;
}

/* ----------------------------------------------------------------------------
   Article Header (Title H1 & Meta Row)
   ---------------------------------------------------------------------------- */
.article-header {
    width: 100%;
    margin-bottom: 24px;
}

/* H1: Libre Baskerville 700, 46px / 53.4px, -1px, #0B2853, W: max 900px */
.article-main-title {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 26px !important;
    line-height: 1.25 !important;
    letter-spacing: -0.5px !important;
    color: #0B2853 !important;
    max-width: 900px;
    margin: 0 0 14px 0;
    word-break: break-word;
}

@media (min-width: 640px) {
    .article-main-title {
        font-size: 34px !important;
        line-height: 42px !important;
        letter-spacing: -0.8px !important;
    }
}

@media (min-width: 1024px) {
    .article-main-title {
        font-size: 46px !important;
        line-height: 53.4px !important;
        letter-spacing: -1px !important;
    }
}

/* Meta Row */
.article-meta-row {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex-wrap: wrap;
}

.article-meta-left {
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: 'Poppins', sans-serif !important;
    font-size: 12px !important;
    font-weight: 400 !important;
    line-height: 18px !important;
    color: #5E708A !important;
}

.article-brand-author {
    font-weight: 500;
    color: #5E708A !important;
}

.article-meta-dot {
    color: #A0AEC0;
}

.article-meta-date {
    color: #5E708A !important;
}

/* Share Button: Poppins 700, 12px / 18px, #FF8315 */
.article-share-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 4px 8px;
    font-family: 'Poppins', sans-serif !important;
    font-size: 12px !important;
    font-weight: 700 !important;
    line-height: 18px !important;
    color: #FF8315 !important;
    transition: transform 0.2s ease, opacity 0.2s ease;
}

.article-share-btn:hover {
    opacity: 0.85;
    transform: translateY(-1px);
}

.article-share-btn i {
    font-size: 11px;
}

/* ----------------------------------------------------------------------------
   Hero Banner Image (W: 1140px, H: 365px, Radius: 6px, Bg: #DDE4ED)
   ---------------------------------------------------------------------------- */
.article-hero-banner {
    width: 100%;
    max-width: 1140px;
    height: 220px;
    background-color: #DDE4ED;
    border-radius: 6px;
    overflow: hidden;
    margin-bottom: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
}

@media (min-width: 640px) {
    .article-hero-banner {
        height: 290px;
    }
}

@media (min-width: 1024px) {
    .article-hero-banner {
        height: 365px;
    }
}

.article-hero-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    border-radius: 6px;
    display: block;
}

.article-placeholder-inner {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
    color: #8C9BAE;
}

.article-placeholder-icon {
    font-size: 38px;
    color: #8C9BAE;
}

.article-placeholder-label {
    font-family: 'Poppins', sans-serif !important;
    font-size: 11px !important;
    font-weight: 700 !important;
    letter-spacing: 0.08em !important;
    color: #8C9BAE !important;
}

.related-card-placeholder-inner {
    width: 100%;
    height: 100%;
    background-color: #DDE4ED;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
    color: #8C9BAE;
}

.related-card-placeholder-inner i {
    font-size: 26px;
    color: #8C9BAE;
}

.related-card-placeholder-inner span {
    font-family: 'Poppins', sans-serif !important;
    font-size: 10px !important;
    font-weight: 700 !important;
    letter-spacing: 0.06em !important;
    color: #8C9BAE !important;
}

/* ----------------------------------------------------------------------------
   2-Column Layout (Content Left W: 730px, Sidebar Right W: 350px, Gap: 60px)
   ---------------------------------------------------------------------------- */
.article-body-layout {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 36px;
    align-items: flex-start;
}

@media (min-width: 1024px) {
    .article-body-layout {
        display: grid;
        grid-template-columns: minmax(0, 730px) minmax(0, 350px);
        gap: 60px;
    }
}

/* ----------------------------------------------------------------------------
   Left Column: Article Typography & Styles
   ---------------------------------------------------------------------------- */
.article-content-column {
    width: 100%;
    max-width: 730px;
    box-sizing: border-box;
}

/* Lead text: Poppins 400, 16px / 30.4px, #233959 */
.article-lead,
.article-typography-content > p:first-of-type {
    font-family: 'Poppins', sans-serif !important;
    font-size: 16px !important;
    font-weight: 400 !important;
    line-height: 30.4px !important;
    color: #233959 !important;
    margin-top: 0;
    margin-bottom: 22px;
}

/* Headings H2: Libre Baskerville 700, 24px / 31.2px, -0.6px, #0B2853 */
.article-typography-content h2 {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 24px !important;
    line-height: 31.2px !important;
    letter-spacing: -0.6px !important;
    color: #0B2853 !important;
    margin-top: 36px;
    margin-bottom: 14px;
    scroll-margin-top: 100px; /* Offset for sticky header/TOC navigation */
}

/* Headings H3: Libre Baskerville 700, 18px / 24px, #0B2853 */
.article-typography-content h3 {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 18px !important;
    line-height: 24px !important;
    color: #0B2853 !important;
    margin-top: 24px;
    margin-bottom: 10px;
    scroll-margin-top: 100px;
}

/* Body Paragraphs: Poppins 400, 14px / 26.6px, #233959 */
.article-typography-content p {
    font-family: 'Poppins', sans-serif !important;
    font-size: 14px !important;
    font-weight: 400 !important;
    line-height: 26.6px !important;
    color: #233959 !important;
    margin-top: 0;
    margin-bottom: 18px;
}

/* Callout Box ("Catatan"): Bg: #FFF2DF, Border-Left: 4px solid #EF7B0E, Radius: 4px, Padding: 16px 20px */
.article-callout,
.article-typography-content blockquote {
    background-color: #FFF2DF !important;
    border-left: 4px solid #EF7B0E !important;
    border-radius: 4px !important;
    padding: 16px 20px !important;
    margin: 22px 0 26px 0 !important;
    box-sizing: border-box;
}

.article-callout .callout-title {
    font-family: 'Poppins', sans-serif !important;
    font-size: 16px !important;
    font-weight: 700 !important;
    line-height: 24px !important;
    color: #EF7B0E !important;
    display: block;
    margin-bottom: 4px;
}

.article-callout p,
.article-typography-content blockquote p {
    font-family: 'Poppins', sans-serif !important;
    font-size: 14px !important;
    font-weight: 400 !important;
    line-height: 26.6px !important;
    color: #233959 !important;
    margin: 0 !important;
}

/* Lists & Tables inside Content */
.article-typography-content ul,
.article-typography-content ol {
    font-family: 'Poppins', sans-serif !important;
    font-size: 14px !important;
    font-weight: 400 !important;
    line-height: 26.6px !important;
    color: #233959 !important;
    padding-left: 24px;
    margin: 14px 0 20px 0;
}

.article-typography-content li {
    margin-bottom: 8px;
}

.article-typography-content img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
    margin: 20px 0;
    display: block;
}

/* Social Media Share Footer */
.article-social-footer {
    display: flex;
    align-items: center;
    gap: 16px;
    padding-top: 28px;
    margin-top: 36px;
    border-top: 1px solid #E5E9F0;
    flex-wrap: wrap;
}

.social-footer-label {
    font-family: 'Poppins', sans-serif !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    color: #0A2D5C !important;
}

.social-footer-icons {
    display: flex;
    align-items: center;
    gap: 10px;
}

.social-icon-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    color: #FFFFFF !important;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: transform 0.2s ease, opacity 0.2s ease;
}

.social-icon-btn:hover {
    transform: translateY(-2px);
    opacity: 0.9;
}

.social-icon-btn.linkedin {
    background-color: #0A66C2;
}

.social-icon-btn.twitter {
    background-color: #111827;
}

.social-icon-btn.whatsapp {
    background-color: #25D366;
}

.social-icon-btn.copy {
    background-color: #FF8A18;
}

/* ----------------------------------------------------------------------------
   Right Column: Sticky Sidebar Table of Contents
   Box: Bg: #FFFFFF, Border: 1px solid #E1E5EC, Radius: 7px, Padding: 23px
   ---------------------------------------------------------------------------- */
.article-sidebar-column {
    width: 100%;
    max-width: 350px;
    position: relative;
}

@media (min-width: 1024px) {
    .article-sidebar-column {
        position: sticky;
        top: 100px;
    }
}

.article-toc-box {
    width: 100%;
    background-color: #FFFFFF;
    border: 1px solid #E1E5EC;
    border-radius: 7px;
    padding: 23px;
    box-sizing: border-box;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
}

.article-toc-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
}

/* Title: Poppins 700, 15px / 22px, #0B2853 */
.article-toc-title {
    font-family: 'Poppins', sans-serif !important;
    font-size: 15px !important;
    font-weight: 700 !important;
    line-height: 22px !important;
    color: #0B2853 !important;
    margin: 0;
}

/* Mobile Accordion Toggle */
.article-toc-mobile-toggle {
    display: none;
    background: transparent;
    border: none;
    font-family: 'Poppins', sans-serif !important;
    font-size: 12px !important;
    font-weight: 600 !important;
    color: #FF8A18;
    cursor: pointer;
    align-items: center;
    gap: 6px;
    padding: 0;
}

@media (max-width: 1023px) {
    .article-toc-mobile-toggle {
        display: inline-flex;
    }
    .article-toc-nav {
        display: none;
        margin-top: 10px;
    }
    .article-toc-nav.open {
        display: block;
    }
}

/* TOC Links: Poppins 400, 11px / 16.5px, #23466E */
.article-toc-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.article-toc-item {
    margin: 0;
    padding: 0;
}

.article-toc-link {
    display: block;
    font-family: 'Poppins', sans-serif !important;
    font-size: 11px !important;
    font-weight: 400 !important;
    line-height: 16.5px !important;
    color: #23466E !important;
    text-decoration: none;
    transition: color 0.15s ease, padding-left 0.15s ease;
    padding: 3px 0;
    word-break: break-word;
}

.article-toc-link:hover {
    color: #FF8A18 !important;
    padding-left: 4px;
}

.article-toc-link.active {
    color: #FF8A18 !important;
    font-weight: 700 !important;
    border-left: 2px solid #FF8A18;
    padding-left: 8px;
}

/* Divider: 1px solid #E1E5EC */
.article-toc-divider {
    width: 100%;
    height: 1px;
    background-color: #E1E5EC;
    margin: 16px 0;
}

/* Bottom Link: ← Semua Artikel (Poppins 700, 11px / 16.5px, #FF8A18) */
.article-all-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: 'Poppins', sans-serif !important;
    font-size: 11px !important;
    font-weight: 700 !important;
    line-height: 16.5px !important;
    color: #FF8A18 !important;
    text-decoration: none;
    transition: transform 0.2s ease, opacity 0.2s ease;
}

.article-all-link:hover {
    text-decoration: underline;
    transform: translateX(-2px);
}

.article-all-link i {
    font-size: 10px;
}

/* ----------------------------------------------------------------------------
   MORE RELATED ARTICLES Section
   Title: Libre Baskerville 700, 27px / 32.4px, -0.68px, #FB7D0B, uppercase
   Divider: 48px x 3px orange #FF8B18
   3 Cards Grid: W: 362px, H: 165px
   ---------------------------------------------------------------------------- */
.related-articles-section {
    width: 100%;
    margin-top: 64px;
    padding-top: 48px;
    border-top: 1px solid #E8E2D8;
}

@media (min-width: 768px) {
    .related-articles-section {
        margin-top: 80px;
        padding-top: 56px;
    }
}

.related-articles-header {
    width: 100%;
    margin-bottom: 32px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.related-articles-title {
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 22px !important;
    line-height: 28px !important;
    letter-spacing: -0.5px !important;
    color: #FB7D0B !important;
    text-transform: uppercase;
    text-align: center;
    margin: 0;
}

@media (min-width: 640px) {
    .related-articles-title {
        font-size: 27px !important;
        line-height: 32.4px !important;
        letter-spacing: -0.68px !important;
    }
}

.related-articles-divider {
    width: 48px;
    height: 3px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin-top: 10px;
    margin-left: auto;
    margin-right: auto;
}

/* Grid: 3 Kolom */
.related-articles-grid {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
}

@media (min-width: 640px) {
    .related-articles-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .related-articles-grid {
        grid-template-columns: repeat(3, minmax(0, 362px));
        justify-content: space-between;
    }
}

/* Card: Background #FFFFFF, Border: 1px solid #E8EEF5, Radius: 10px */
.related-card {
    background-color: #FFFFFF;
    border: 1px solid #E8EEF5;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.related-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.related-card-thumb-wrap {
    width: 100%;
    height: 165px;
    overflow: hidden;
    background-color: #E2E8F0;
    display: block;
}

.related-card-thumb {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.35s ease;
}

.related-card:hover .related-card-thumb {
    transform: scale(1.05);
}

.related-card-body {
    padding: 20px 22px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

/* Badge: Poppins 700, 10px / 12px, #1656A5, Bg: #EAF2FF */
.related-card-badge {
    align-self: flex-start;
    background-color: #EAF2FF;
    color: #1656A5 !important;
    font-family: 'Poppins', sans-serif !important;
    font-size: 10px !important;
    font-weight: 700 !important;
    line-height: 12px !important;
    padding: 4px 10px;
    border-radius: 4px;
    text-transform: uppercase;
    letter-spacing: 0.02em;
    margin-bottom: 12px;
}

/* Title: Libre Baskerville 700, 15px / 20.3px, -0.38px, #0A2A58 */
.related-card-title {
    margin: 0 0 8px 0;
    font-family: 'Libre Baskerville', Georgia, serif !important;
    font-weight: 700 !important;
    font-size: 15px !important;
    line-height: 20.3px !important;
    letter-spacing: -0.38px !important;
}

.related-card-title-link {
    color: #0A2A58 !important;
    text-decoration: none;
    transition: color 0.15s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.related-card-title-link:hover {
    color: #FF8A18 !important;
}

/* Excerpt: Poppins 400, 11px / 16.5px, #526078 */
.related-card-desc {
    font-family: 'Poppins', sans-serif !important;
    font-size: 11px !important;
    font-weight: 400 !important;
    line-height: 16.5px !important;
    color: #526078 !important;
    margin: 0 0 16px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
}

/* Link: Poppins 800, 11px / 16.5px, #EE7A0B */
.related-card-link {
    margin-top: auto;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-family: 'Poppins', sans-serif !important;
    font-size: 11px !important;
    font-weight: 800 !important;
    line-height: 16.5px !important;
    color: #EE7A0B !important;
    text-decoration: none;
    transition: transform 0.2s ease, color 0.2s ease;
}

.related-card-link:hover {
    color: #D96A04 !important;
    transform: translateX(3px);
}

.related-card-link i {
    font-size: 10px;
}

/* ----------------------------------------------------------------------------
   Floating Back To Top Button (#0B2247 Circle, White Arrow)
   ---------------------------------------------------------------------------- */
.detail-scroll-top-btn {
    position: fixed;
    right: 20px;
    bottom: 24px;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background-color: #0B2247;
    color: #FFFFFF;
    border: none;
    box-shadow: 0 4px 16px rgba(11, 34, 71, 0.3);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.25s ease, visibility 0.25s ease, background-color 0.2s ease, transform 0.2s ease;
    z-index: 40;
}

.detail-scroll-top-btn.visible {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

.detail-scroll-top-btn:hover {
    background-color: #FF8A18;
    transform: translateY(-3px);
}

/* ----------------------------------------------------------------------------
   Toast Notification
   ---------------------------------------------------------------------------- */
.article-toast {
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%) translateY(20px);
    background-color: #0B2247;
    color: #FFFFFF;
    padding: 12px 22px;
    border-radius: 8px;
    font-family: 'Poppins', sans-serif !important;
    font-size: 13px !important;
    font-weight: 500;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    gap: 10px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s ease;
    z-index: 100;
}

.article-toast.show {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

.article-toast i {
    color: #22C55E;
    font-size: 15px;
}
</style>

<!-- ==========================================================================
     INTERACTIVE JAVASCRIPT: ScrollSpy, Mobile TOC, Share, Scroll-To-Top
     ========================================================================== -->
<script>
    // Smooth Scroll to Top
    function scrollToTopSmooth() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Toggle Mobile Table of Contents
    function toggleMobileToc() {
        const nav = document.getElementById('tocListNav');
        const btn = document.getElementById('tocMobileToggle');
        const text = document.getElementById('tocToggleText');
        const icon = document.getElementById('tocToggleIcon');

        if (!nav || !btn) return;

        const isOpen = nav.classList.contains('open');
        if (isOpen) {
            nav.classList.remove('open');
            btn.setAttribute('aria-expanded', 'false');
            if (text) text.innerText = 'Buka';
            if (icon) icon.className = 'fa-solid fa-chevron-down';
        } else {
            nav.classList.add('open');
            btn.setAttribute('aria-expanded', 'true');
            if (text) text.innerText = 'Tutup';
            if (icon) icon.className = 'fa-solid fa-chevron-up';
        }
    }

    // Toast Messenger
    function showArticleToast(message) {
        const toast = document.getElementById('articleToast');
        const msgEl = document.getElementById('articleToastMsg');
        if (!toast) return;

        if (msgEl && message) {
            msgEl.innerText = message;
        }

        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    // Native Share or Clipboard Fallback
    function handleArticleShare(title, url) {
        if (navigator.share) {
            navigator.share({
                title: title,
                url: url
            }).catch((err) => {
                if (err.name !== 'AbortError') {
                    copyArticleUrl(url);
                }
            });
        } else {
            copyArticleUrl(url);
        }
    }

    // Copy URL to Clipboard
    function copyArticleUrl(url) {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url).then(() => {
                showArticleToast('Tautan artikel berhasil disalin!');
            }).catch(() => {
                fallbackCopyText(url);
            });
        } else {
            fallbackCopyText(url);
        }
    }

    function fallbackCopyText(text) {
        const textArea = document.createElement("textarea");
        textArea.value = text;
        textArea.style.position = "fixed";
        textArea.style.left = "-999999px";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
            document.execCommand('copy');
            showArticleToast('Tautan artikel berhasil disalin!');
        } catch (err) {
            showArticleToast('Gagal menyalin tautan.');
        }
        document.body.removeChild(textArea);
    }

    // Scroll Listener for Back To Top Button & ScrollSpy for TOC
    document.addEventListener('DOMContentLoaded', function () {
        const backToTopBtn = document.getElementById('detailScrollTopBtn');
        const tocLinks = document.querySelectorAll('.article-toc-link');
        const headings = document.querySelectorAll('.article-typography-content h2[id]');

        // Floating Back-to-Top Toggle
        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) {
                backToTopBtn?.classList.add('visible');
            } else {
                backToTopBtn?.classList.remove('visible');
            }
        }, { passive: true });

        // ScrollSpy using IntersectionObserver
        if (headings.length > 0 && tocLinks.length > 0) {
            const observerOptions = {
                root: null,
                rootMargin: '-80px 0px -70% 0px',
                threshold: 0
            };

            const headingObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        const activeId = entry.target.getAttribute('id');
                        tocLinks.forEach(function (link) {
                            if (link.getAttribute('data-target') === activeId) {
                                link.classList.add('active');
                            } else {
                                link.classList.remove('active');
                            }
                        });
                    }
                });
            }, observerOptions);

            headings.forEach(function (h2) {
                headingObserver.observe(h2);
            });
        }

        // Smooth TOC link click handling
        tocLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                const targetId = this.getAttribute('data-target');
                if (!targetId) return;

                const targetEl = document.getElementById(targetId);
                if (targetEl) {
                    e.preventDefault();
                    targetEl.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // Update URL hash without jumping
                    if (history.pushState) {
                        history.pushState(null, null, '#' + targetId);
                    }

                    // On mobile, close accordion after clicking a section
                    const nav = document.getElementById('tocListNav');
                    if (window.innerWidth < 1024 && nav?.classList.contains('open')) {
                        toggleMobileToc();
                    }
                }
            });
        });
    });
</script>
@endsection
