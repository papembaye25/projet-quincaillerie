<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Quincaillerie Ibrahima Gaye</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Navbar Admin --}}
    <nav class="bg-gray-900 text-white px-6 py-4 flex justify-between items-center shadow-lg">
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-3">
                <div class="bg-orange-500 font-bold px-3 py-1 rounded">QIG</div>
                <span class="font-bold">Admin</span>
            </div>
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}"
                   class="text-gray-300 hover:text-white text-sm transition-colors {{ request()->routeIs('admin.dashboard') ? 'text-orange-400 font-semibold' : '' }}">
                    🏠 Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}"
                   class="text-gray-300 hover:text-white text-sm transition-colors {{ request()->routeIs('admin.products.*') ? 'text-orange-400 font-semibold' : '' }}">
                    📦 Produits
                </a>
                <a href="{{ route('admin.contacts.index') }}"
                   class="text-gray-300 hover:text-white text-sm transition-colors {{ request()->routeIs('admin.contacts.*') ? 'text-orange-400 font-semibold' : '' }}">
                    📬 Messages
                </a>
                <a href="{{ route('home') }}"
                   target="_blank"
                   class="text-gray-300 hover:text-white text-sm transition-colors">
                    🌐 Voir le site
                </a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-gray-300 text-sm hidden md:block">
                👤 {{ auth()->user()->name }}
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-sm transition-colors">
                    Déconnexion
                </button>
            </form>
        </div>
    </nav>

    {{-- Contenu --}}
    <main class="max-w-7xl mx-auto px-6 py-8">

        {{-- Messages flash --}}
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
            ✅ {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
            ❌ {{ session('error') }}
        </div>
        @endif

        @yield('content')
    </main>

</body>
</html>