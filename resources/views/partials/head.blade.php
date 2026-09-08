    {{-- SEO --}}

    <!-- ✅ Meta SEO -->
    <meta name="description" content="@yield('meta_description', 'Deskripsi default website kamu di sini.')">
    <meta name="keywords" content="@yield('meta_keywords', 'house ilmu indonesia, career, mentoring, internship, karir, cv, volunteer, mahasiswa, pengembangan karir, mahasiswa')">
    <meta name="author" content="House Ilmu Indonesia">

    <!-- ✅ Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- ✅ Open Graph (untuk Facebook & media sosial lain) -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', 'Mentoring, Review CV, & Webinar Karir – House Ilmu Indonesia')">
    <meta property="og:description" content="@yield('og_description', 'Platform mentoring buat persiapin karir kamu! Yuk bergabung bersama House Ilmu Indonesia!')">
    <meta property="og:image" content="@yield('og_image', asset('img/house-ilmu-indonesia.webp'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">

    <!-- ✅ Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Mentoring, Review CV, & Webinar Karir – House Ilmu Indonesia')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Platform mentoring buat persiapin karir kamu! Yuk bergabung bersama House Ilmu Indonesia!')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('img/house-ilmu-indonesia.webp'))">
    
    {{-- SEO --}}

    <!-- Link CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

