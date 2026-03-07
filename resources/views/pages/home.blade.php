@extends('layouts.app')
@section('title', 'Accueil - Quincaillerie Ibrahima Gaye')
@section('description', 'Quincaillerie Ibrahima Gaye - Votre partenaire de confiance pour tous vos travaux à Dakar')

@section('content')

{{-- ============================================
     SECTION HERO
     ============================================ --}}
<section class="relative bg-gray-900 text-white overflow-hidden">

    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800 to-orange-900 opacity-90"></div>

    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-orange-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-48 h-48 bg-orange-400 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="max-w-3xl">

            <span class="inline-block bg-orange-500 text-white text-sm font-semibold px-4 py-1 rounded-full mb-6">
                🏪 Dakar, Sénégal
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                Votre partenaire
                <span class="text-orange-400"> de confiance</span>
                pour tous vos travaux
            </h1>

            <p class="text-gray-300 text-lg md:text-xl mb-8 leading-relaxed">
                Quincaillerie Ibrahima Gaye vous propose une large gamme d'outils,
                matériaux de construction et équipements à prix compétitifs.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('products.index') }}"
                   class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 hover:scale-105 text-center shadow-lg">
                    🔧 Voir nos produits
                </a>
                <a href="https://wa.me/221775555618?text=Bonjour%2C%20je%20souhaite%20avoir%20des%20informations%20sur%20vos%20produits."
                   target="_blank"
                   class="bg-green-500 hover:bg-green-600 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 hover:scale-105 text-center shadow-lg">
                    💬 WhatsApp
                </a>
            </div>

            <div class="flex flex-wrap gap-8 mt-12">
                <div>
                    <p class="text-3xl font-extrabold text-orange-400">500+</p>
                    <p class="text-gray-400 text-sm">Produits disponibles</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-orange-400">10+</p>
                    <p class="text-gray-400 text-sm">Années d'expérience</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-orange-400">1000+</p>
                    <p class="text-gray-400 text-sm">Clients satisfaits</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================
     SECTION PRODUITS VEDETTES
     ============================================ --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <span class="text-orange-500 font-semibold text-sm uppercase tracking-wider">Notre catalogue</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mt-2">
                Nos produits vedettes
            </h2>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto">
                Découvrez notre sélection de produits de qualité pour tous vos projets
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredProducts as $product)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden border border-gray-100">

                <div class="bg-gradient-to-br from-gray-100 to-gray-200 h-48 flex items-center justify-center relative">
                    @if($product->primaryImage)
                        <img src="{{ $product->primaryImage->url }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover">
                    @else
                        <span class="text-6xl">🔧</span>
                    @endif
                    <span class="absolute top-3 left-3 bg-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                        {{ $product->category->name ?? 'Produit' }}
                    </span>
                </div>

                <div class="p-5">
                    <h3 class="font-bold text-gray-800 text-lg">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $product->description }}</p>

                    <div class="flex items-center justify-between mt-4">
                        @if($product->price)
                        <span class="text-orange-500 font-extrabold text-lg">
                            {{ number_format($product->price, 0, ',', ' ') }} FCFA
                        </span>
                        @else
                        <span class="text-gray-400 text-sm">Prix sur demande</span>
                        @endif
                        <a href="{{ route('products.show', $product->slug) }}"
                           class="bg-orange-50 hover:bg-orange-500 text-orange-500 hover:text-white text-sm font-semibold px-4 py-2 rounded-lg transition-all duration-300">
                            Voir →
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-400 text-lg">Aucun produit disponible pour le moment.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('products.index') }}"
               class="inline-block border-2 border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white font-bold px-8 py-3 rounded-xl transition-all duration-300">
                Voir tous nos produits →
            </a>
        </div>

    </div>
</section>

{{-- ============================================
     SECTION POURQUOI NOUS CHOISIR
     ============================================ --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <span class="text-orange-500 font-semibold text-sm uppercase tracking-wider">Nos avantages</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mt-2">
                Pourquoi nous choisir ?
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white rounded-2xl p-8 text-center shadow-md hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-xl mb-3">Qualité garantie</h3>
                <p class="text-gray-500 leading-relaxed">
                    Tous nos produits sont sélectionnés avec soin pour vous garantir
                    la meilleure qualité au meilleur prix.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 text-center shadow-md hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-xl mb-3">Prix compétitifs</h3>
                <p class="text-gray-500 leading-relaxed">
                    Nous vous proposons les meilleurs prix du marché avec des
                    promotions régulières pour nos clients fidèles.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 text-center shadow-md hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-xl mb-3">Livraison rapide</h3>
                <p class="text-gray-500 leading-relaxed">
                    Livraison rapide à domicile sur Dakar et environs.
                    Votre commande livrée directement sur votre chantier.
                </p>
            </div>

        </div>
    </div>
</section>

{{-- ============================================
     SECTION SERVICES
     ============================================ --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <span class="text-orange-500 font-semibold text-sm uppercase tracking-wider">Ce qu'on propose</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mt-2">
                Nos services
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($services as $service)
            <div class="border border-gray-100 rounded-2xl p-6 text-center hover:border-orange-300 hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    @switch($service->icon)
                        @case('wrench')
                            <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            @break
                        @case('building')
                            <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            @break
                        @case('chat')
                            <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            @break
                        @case('truck')
                            <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                            </svg>
                            @break
                        @default
                            <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                    @endswitch
                </div>
                <h3 class="font-bold text-gray-800 mb-2">{{ $service->title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $service->description }}</p>
            </div>
            @empty
            <p class="text-gray-400 col-span-4 text-center">Aucun service disponible.</p>
            @endforelse
        </div>

    </div>
</section>

{{-- ============================================
     SECTION CTA WHATSAPP
     ============================================ --}}
<section class="py-16 bg-gradient-to-r from-orange-500 to-orange-600">
    <div class="max-w-4xl mx-auto px-4 text-center">

        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">
            Besoin d'un conseil ou d'un devis ?
        </h2>
        <p class="text-orange-100 text-lg mb-8">
            Contactez-nous directement sur WhatsApp, nous répondons rapidement !
        </p>

        <a href="https://wa.me/221775555618?text=Bonjour%2C%20je%20souhaite%20avoir%20des%20informations%20sur%20vos%20produits."
           target="_blank"
           class="inline-flex items-center gap-3 bg-white text-orange-500 hover:bg-gray-100 font-extrabold text-lg px-10 py-4 rounded-2xl transition-all duration-300 hover:scale-105 shadow-xl">
            <svg class="w-7 h-7 fill-current text-green-500" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Contactez-nous sur WhatsApp
        </a>

    </div>
</section>

@endsection