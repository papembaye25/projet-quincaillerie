<footer class="bg-gray-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Colonne 1 : Logo + Description --}}
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="bg-orange-500 text-white font-bold text-xl px-3 py-1 rounded">
                        QIG
                    </div>
                    <div>
                        <p class="font-bold text-sm leading-tight">QUINCAILLERIE</p>
                        <p class="text-orange-400 text-xs font-semibold">IBRAHIMA GAYE</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Votre partenaire de confiance pour tous vos travaux à Dakar.
                    Qualité, disponibilité et prix compétitifs.
                </p>
            </div>

            {{-- Colonne 2 : Liens rapides --}}
            <div>
                <h3 class="font-bold text-lg mb-4 text-orange-400">Liens rapides</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}"
                           class="text-gray-400 hover:text-orange-400 text-sm transition-colors">
                            → Accueil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}"
                           class="text-gray-400 hover:text-orange-400 text-sm transition-colors">
                            → Produits
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}"
                           class="text-gray-400 hover:text-orange-400 text-sm transition-colors">
                            → Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                           class="text-gray-400 hover:text-orange-400 text-sm transition-colors">
                            → Contact
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Colonne 3 : Contact --}}
            <div>
                <h3 class="font-bold text-lg mb-4 text-orange-400">Contactez-nous</h3>
                <ul class="space-y-3">
                    <li class="flex items-center space-x-2 text-gray-400 text-sm">
                        <span>📍</span>
                        <span>Dakar, Sénégal</span>
                    </li>
                    <li class="flex items-center space-x-2 text-gray-400 text-sm">
                        <span>📱</span>
                        <span>+221 77 555 56 18</span>
                    </li>
                    <li>
                        <a href="https://wa.me/221775555618"
                           class="flex items-center space-x-2 text-green-400 hover:text-green-300 text-sm transition-colors">
                            <span>💬</span>
                            <span>WhatsApp</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        {{-- Copyright --}}
        <div class="border-t border-gray-800 mt-8 pt-6 text-center">
            <p class="text-gray-500 text-sm">
                © {{ date('Y') }} Quincaillerie Ibrahima Gaye. Tous droits réservés.
            </p>
        </div>
    </div>
</footer>