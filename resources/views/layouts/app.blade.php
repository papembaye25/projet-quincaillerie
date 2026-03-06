<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Quincaillerie Ibrahima Gaye - Votre partenaire de confiance pour tous vos travaux à Dakar')">
    <title>@yield('title', 'Quincaillerie Ibrahima Gaye')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')
    @include('components.whatsapp-button')

</body>
</html>