@extends('layouts.app')
@section('title', $product->name . ' - Quincaillerie Ibrahima Gaye')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Fil d'ariane --}}
    <nav class="text-sm text-gray-500 mb-8 flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-orange-500">Accueil</a>
        <span>→</span>
        <a href="{{ route('products.index') }}" class="hover:text-orange-500">Produits</a>
        <span>→</span>
        <span class="text-gray-800 font-medium">{{ $product->name }}</span>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

        {{-- IMAGE --}}
        <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl h-80 flex items-center justify-center overflow-hidden shadow-md">
            @if($product->images->count() > 0)
                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                     alt="{{ $product->name }}"
                     class="w-full h-full object-cover rounded-2xl">
            @else
                <div class="text-center">
                    <span class="text-8xl">🔧</span>
                    <p class="text-gray-400 text-sm mt-2">Pas d'image disponible</p>
                </div>
            @endif
        </div>

        {{-- INFOS PRODUIT --}}
        <div>

            {{-- Catégorie --}}
            <span class="inline-block bg-orange-100 text-orange-600 text-sm font-semibold px-3 py-1 rounded-full mb-4">
                {{ $product->category->name ?? 'Sans catégorie' }}
            </span>

            {{-- Nom --}}
            <h1 class="text-3xl font-extrabold text-gray-800 mb-4">
                {{ $product->name }}
            </h1>

            {{-- Prix --}}
            @if($product->price)
            <div class="mb-4">
                <span class="text-4xl font-extrabold text-orange-500">
                    {{ number_format($product->price, 0, ',', ' ') }}
                </span>
                <span class="text-lg text-gray-500 ml-1">FCFA</span>
            </div>
            @else
            <div class="text-xl text-gray-500 mb-4">Prix sur demande</div>
            @endif

            {{-- Description --}}
            <p class="text-gray-600 leading-relaxed mb-8">
                {{ $product->description }}
            </p>

            {{-- BOUTONS --}}
            <d"iv class="flex flex-col sm:flex-row gap-3">
                <a href="https://wa.me/221775555618?text=Bonjour%2C%20je%20suis%20intéressé%20par%20{{ urlencode($product->name) }}"
                   target="_blank"
                   class="flex-1 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-xl text-center transition-all duration-300">
                    💬 Commander via WhatsApp
                </a>
                <a href="{{ route('contact') }}"
                   class="flex-1 border-2 border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white font-bold py-3 px-6 rounded-xl text-center transition-all duration-300">
                    📩 Nous contacter
                </a>
            </div>

            {{-- Infos supplémentaires --}}
            <div class="mt-6 p-4 bg-orange-50 rounded-xl space-y-2">
                <p class="text-sm text-gray-600">
                    📍 <strong>Disponible</strong> en magasin à Dakar
                </p>
                <p class="text-sm text-gray-600">
                    🚚 <strong>Livraison</strong> possible sur Dakar et environs
                </p>
                <p class="text-sm text-gray-600">
                    📱 <strong>Contact :</strong> +221 77 555 56 18
                </p>
            </div>

        </div>
    </div>

    {{-- Retour --}}
    <div class="mt-12 pt-6 border-t border-gray-200">
        <a href="{{ route('products.index') }}"
           class="text-orange-500 hover:text-orange-600 font-semibold transition-colors">
            ← Retour aux produits
        </a>
    </div>

</div>

@endsection