<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Quincaillerie Ibrahima Gaye</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center" style="background: linear-gradient(135deg, #1f2937 0%, #111827 50%, #1f2937 100%);">

    {{-- Cercles décoratifs --}}
    <div class="absolute top-20 left-20 w-64 h-64 bg-orange-500 rounded-full opacity-5 blur-3xl"></div>
    <div class="absolute bottom-20 right-20 w-96 h-96 bg-orange-400 rounded-full opacity-5 blur-3xl"></div>

    <div class="w-full max-w-md px-6 relative z-10">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center bg-orange-500 text-white font-extrabold text-2xl w-20 h-20 rounded-2xl shadow-2xl mb-4">
                QIG
            </div>
            <h1 class="text-white text-2xl font-bold">Quincaillerie Ibrahima Gaye</h1>
            <p class="text-gray-400 mt-1 text-sm">Espace Administration</p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-2xl p-8">

            <h2 class="text-gray-800 text-xl font-bold mb-6 text-center">
                🔐 Connexion
            </h2>

            {{-- Erreurs --}}
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm flex items-center gap-2">
                ❌ Email ou mot de passe incorrect.
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2 text-sm">
                        Adresse email
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">📧</span>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               placeholder="admin@quincaillerie.sn"
                               class="w-full border border-gray-300 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all text-sm">
                    </div>
                </div>

                {{-- Mot de passe --}}
                <div class="mb-5">
                    <label class="block text-gray-700 font-medium mb-2 text-sm">
                        Mot de passe
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">🔑</span>
                        <input type="password"
                               name="password"
                               required
                               placeholder="••••••••"
                               class="w-full border border-gray-300 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all text-sm">
                    </div>
                </div>

                {{-- Se souvenir --}}
                <div class="flex items-center mb-6">
                    <input type="checkbox"
                           name="remember"
                           id="remember"
                           class="w-4 h-4 rounded accent-orange-500">
                    <label for="remember" class="ml-2 text-gray-600 text-sm cursor-pointer">
                        Se souvenir de moi
                    </label>
                </div>

                {{-- Bouton --}}
                <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition-all duration-300 hover:scale-105 shadow-lg text-sm">
                    Se connecter →
                </button>

            </form>

        </div>

        {{-- Retour site --}}
        <div class="text-center mt-6">
            <a href="{{ route('home') }}"
               class="text-gray-400 hover:text-orange-400 text-sm transition-colors">
                ← Retour au site public
            </a>
        </div>

    </div>

</body>
</html>