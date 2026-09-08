<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logo.webp') }}" />
    <title>@yield('title', 'House Ilmu Indonesia')</title>
    @include('partials.head')
    @yield('head')
</head>
<body>

    @include('partials.navbar-homepage')

    @include('partials.scrolltotop')

    <main>
        @yield('content')
    </main>

    @include('partials.comments')

    @include('partials.footer-homepage')

    @include('partials.cdn')
    
    @yield('scripts')
</body>
</html>