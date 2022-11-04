<!doctype html>
<html lang="en" class="pxp-root">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="shortcut icon" href="{{ asset('public/img/favicon.png') }}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500;600&display=swap" rel="stylesheet">
        <link href="{{ asset('public/site/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/site/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/style.css') }}">

        <title>@yield('title')</title>
    </head>
    <body>

        @include('site.partials.preloader')

        @yield('main')

        <script src="{{ asset('public/site/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('public/site/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/site/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('public/site/js/nav.js') }}"></script>
        <script src="{{ asset('public/site/js/main.js') }}"></script>
    </body>
</html>
