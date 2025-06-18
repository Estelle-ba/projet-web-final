<!DOCTYPE html>
<html>
    <head>
        <title>Coding Factory</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <meta name="viewport" content="width=device-width,initial-scale=1" />
    </head>

    <body>
    @include('layouts.header')

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>



    <!-- Scripts communs -->
    @stack('scripts')
    </body>
</html>
