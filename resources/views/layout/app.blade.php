<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link rel="icon" type="image/webp" href="{{ asset('img/logo.webp') }}" />
    <link rel="apple-touch-icon" href="{{ asset('img/logo.webp') }}" />
    <title>@yield('title', 'House Ilmu Indonesia')</title>
    @include('partials.head')

    <!-- Schema.org JSON-LD Base Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "House Ilmu Indonesia",
        "url": "https://houseilmuindonesia.biz.id",
        "logo": "{{ asset('img/logo.webp') }}",
        "description": "Platform mentoring, webinar karir, review CV, dan peluang program untuk mempersiapkan karir mahasiswa dan anak muda Indonesia.",
        "sameAs": [
            "https://www.instagram.com/houseilmu.id",
            "https://www.linkedin.com/company/house-ilmu-indonesia",
            "https://www.tiktok.com/@houseilmu.id"
        ]
    }
    </script>
    @yield('structured_data')
    @yield('head')
</head>
<body>

    @include('partials.navbar-homepage')

    @include('partials.scrolltotop')

    <main>
        @yield('content')
    </main>

    @unless(request()->routeIs('home', 'article.*') || request()->is('article', 'article/*'))
    @unless(View::hasSection('hide_comments'))
        @include('partials.comments')
    @endunless

    @include('partials.footer-homepage')

    @include('partials.cdn')
    
    @yield('scripts')
</body>
</html>