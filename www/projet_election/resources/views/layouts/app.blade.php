<!DOCTYPE html>
<html>
    <head>
        <title>Coding Factory</title>
    </head>

    <body style="margin: 0; padding: 0;">
    @include('layouts.header')
    <div style="background-color: white; height:100px"></div>
    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <!-- Scripts communs -->
    @stack('scripts')
    </body>
</html>
