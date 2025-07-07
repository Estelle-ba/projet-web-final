<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Coding Factory by ESIEE-IT - L'école qui bouscule le </code></title>
        @auth
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @endauth
        @guest
            <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        @endguest
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>@yield('title', 'Mon Application')</title>
        <!-- Intégration de Tailwind CSS via CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>

    <body>
    @include('layouts.header')

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>
    @guest
        @include('layouts.footer')
    @endguest



    <!-- Scripts communs -->
    @stack('scripts')
    </body>

</html>
