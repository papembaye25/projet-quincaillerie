<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <div class="bg-orange-500 text-white font-bold text-xl px-3 py-1 rounded">
                    QIG
                </div>
                <div class="hidden sm:block">
                    <p class="font-bold text-gray-800 text-sm leading-tight">QUINCAILLERIE</p>
                    <p class="text-orange-500 text-xs font-semibold">IBRAHIMA GAYE</p>
                </div>
            </a>

            {{-- MENU DESKTOP --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                   class="text-gray-700 hover:text-orange-500 font-medium transition-colors duration-200">
                    Accueil
                </a>
                <a href="{{ route('products.index') }}"
                   class="text-gray-700 hover:text-orange-500 font-medium transition-colors duration-200">
                    Produits
                </a>
                <a href="{{ route('services') }}"
                   class="text-gray-700 hover:text-orange-500 font-medium transition-colors duration-200">
                    Services
                </a>
                <a href="{{ route('about') }}"
                   class="text-gray-700 hover:text-orange-500 font-medium transition-colors duration-200">
                    À propos
                </a>
                <a href="{{ route('contact') }}"
                   class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                    Contact
                </a>
            </div>

            {{-- MENU MOBILE (hamburger) --}}
            <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

        </div>

        {{-- MENU MOBILE DROPDOWN --}}
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('home') }}"
                   class="text-gray-700 hover:text-orange-500 font-medium py-2 border-b border-gray-100">
                    Accueil
                </a>
                <a href="{{ route('products.index') }}"
                   class="text-gray-700 hover:text-orange-500 font-medium py-2 border-b border-gray-100">
                    Produits
                </a>
                <a href="{{ route('services') }}"
                   class="text-gray-700 hover:text-orange-500 font-medium py-2 border-b border-gray-100">
                    Services
                </a>
                <a href="{{ route('about') }}"
                   class="text-gray-700 hover:text-orange-500 font-medium py-2 border-b border-gray-100">
                    À propos
                </a>
                <a href="{{ route('contact') }}"
                   class="bg-orange-500 text-white px-4 py-2 rounded-lg font-medium text-center">
                    Contact
                </a>
            </div>
        </div>
    </div>
</nav>

{{-- Script menu mobile --}}
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>