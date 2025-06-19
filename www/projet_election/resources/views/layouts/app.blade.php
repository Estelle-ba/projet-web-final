<!DOCTYPE html>
<html>
    <head>
        <title>Coding Factory</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>@yield('title', 'Mon Application')</title>
        <!-- Intégration de Tailwind CSS via CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
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
