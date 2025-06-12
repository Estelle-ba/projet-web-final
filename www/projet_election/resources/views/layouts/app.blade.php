<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Application')</title>
    <!-- Intégration de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
<!-- Barre de navigation -->
<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4">
        <a href="/" class="text-2xl font-bold text-blue-600">Mon Application</a>
    </div>
</nav>

<!-- Contenu principal -->
<main class="container mx-auto p-6">
    @yield('content')
</main>

<!-- Scripts communs -->
@stack('scripts')
</body>
</html>
