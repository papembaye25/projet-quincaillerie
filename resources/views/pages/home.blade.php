@extends('layouts.app')

@section('title', 'Accueil - Quincaillerie Ibrahima Gaye')

@section('description', 'Quincaillerie Ibrahima Gaye - Votre partenaire de confiance pour tous vos travaux à Dakar')

@section('content')

<div class="text-center py-20">
    <h1 class="text-4xl font-bold text-orange-500">
        🏗️ Quincaillerie Ibrahima Gaye
    </h1>
    <p class="text-gray-600 mt-4 text-xl">
        Votre partenaire de confiance à Dakar
    </p>
    <a href="{{ route('products.index') }}"
       class="mt-8 inline-block bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
        Voir nos produits
    </a>
</div>

@endsection