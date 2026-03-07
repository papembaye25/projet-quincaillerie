@extends('layouts.app')
@section('title', 'À Propos - Quincaillerie Ibrahima Gaye')
@section('content')

<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">À Propos de nous</h1>

    <div class="bg-white rounded-xl shadow-md p-8">
        <h2 class="text-2xl font-bold text-orange-500 mb-4">
            Quincaillerie Ibrahima Gaye
        </h2>
        <p class="text-gray-600 leading-relaxed mb-4">
            Située au cœur de Dakar, la Quincaillerie Ibrahima Gaye est votre
            partenaire de confiance pour tous vos projets de construction et
            de rénovation.
        </p>
        <p class="text-gray-600 leading-relaxed mb-4">
            Nous proposons une large gamme de produits de qualité : outils,
            matériaux de construction, équipements électriques et de plomberie.
        </p>
        <p class="text-blue-600 leading-relaxed mb-4">
            Notre équipe expérimentée est toujours prête à vous conseiller et à
            vous aider à trouver les solutions adaptées à vos besoins.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="text-center p-4 bg-orange-50 rounded-xl">
                <p class="text-4xl font-bold text-orange-500">10+</p>
                <p class="text-gray-600 mt-1">Années d'expérience</p>
            </div>
            <div class="text-center p-4 bg-orange-50 rounded-xl">
                <p class="text-4xl font-bold text-orange-500">500+</p>
                <p class="text-gray-600 mt-1">Produits disponibles</p>
            </div>
            <div class="text-center p-4 bg-orange-50 rounded-xl">
                <p class="text-4xl font-bold text-orange-500">1000+</p>
                <p class="text-gray-600 mt-1">Clients satisfaits</p>
            </div>
        </div>
    </div>
</div>

@endsection