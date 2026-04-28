@extends('layouts.app')
@section('title', 'À Propos - Quincaillerie Ibrahima Gaye')

@section('content')

{{-- Header --}}
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-extrabold mb-4">À Propos de Nous</h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto">
            Votre partenaire de confiance pour tous vos travaux à Dakar depuis plus de 10 ans.
        </p>
    </div>
</div>

{{-- Histoire --}}
<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        <div>
            <span class="text-orange-500 font-semibold text-sm uppercase tracking-wide">Notre Histoire</span>
            <h2 class="text-3xl font-extrabold text-gray-800 mt-2 mb-6">
                Une quincaillerie née de la passion
            </h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                Fondée par <strong>Ibrahima Gaye</strong>, notre quincaillerie est née d'une passion
                profonde pour la construction et l'artisanat. Depuis notre création, nous nous sommes
                engagés à fournir des produits de qualité à des prix compétitifs.
            </p>
            <p class="text-gray-600 leading-relaxed mb-4">
                Implantés au cœur de <strong>Dakar</strong>, nous servons des particuliers,
                des artisans et des entreprises de construction avec le même niveau d'exigence
                et de professionnalisme.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Notre équipe expérimentée est toujours disponible pour vous conseiller
                et vous aider à trouver les meilleurs produits pour vos projets.
            </p>
        </div>

        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8">
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <p class="text-4xl font-extrabold text-orange-500">10+</p>
                    <p class="text-gray-600 text-sm mt-1">Années d'expérience</p>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <p class="text-4xl font-extrabold text-orange-500">500+</p>
                    <p class="text-gray-600 text-sm mt-1">Produits disponibles</p>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <p class="text-4xl font-extrabold text-orange-500">1000+</p>
                    <p class="text-gray-600 text-sm mt-1">Clients satisfaits</p>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <p class="text-4xl font-extrabold text-orange-500">5★</p>
                    <p class="text-gray-600 text-sm mt-1">Note de satisfaction</p>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Valeurs --}}
<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-orange-500 font-semibold text-sm uppercase tracking-wide">Nos Valeurs</span>
            <h2 class="text-3xl font-extrabold text-gray-800 mt-2">Ce qui nous définit</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white rounded-2xl p-8 text-center shadow-sm hover:shadow-md transition-all">
                <div class="bg-orange-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🏆</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Qualité</h3>
                <p class="text-gray-600">
                    Nous sélectionnons rigoureusement chaque produit pour garantir
                    une qualité optimale à nos clients.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 text-center shadow-sm hover:shadow-md transition-all">
                <div class="bg-orange-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🤝</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Confiance</h3>
                <p class="text-gray-600">
                    La confiance de nos clients est notre priorité. Nous nous engageons
                    à être transparents et honnêtes dans toutes nos transactions.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 text-center shadow-sm hover:shadow-md transition-all">
                <div class="bg-orange-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">⚡</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Réactivité</h3>
                <p class="text-gray-600">
                    Nous répondons rapidement à vos demandes et livrons dans
                    les meilleurs délais sur Dakar et environs.
                </p>
            </div>

        </div>
    </div>
</div>

{{-- Localisation --}}
<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        <div>
            <span class="text-orange-500 font-semibold text-sm uppercase tracking-wide">Nous trouver</span>
            <h2 class="text-3xl font-extrabold text-gray-800 mt-2 mb-6">
                Venez nous rendre visite
            </h2>

            <div class="space-y-4">
                <div class="flex items-start gap-4">
                    <div class="bg-orange-100 p-3 rounded-xl shrink-0">
                        <span class="text-xl">📍</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Adresse</p>
                        <p class="text-gray-600">Dakar, Sénégal</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="bg-orange-100 p-3 rounded-xl shrink-0">
                        <span class="text-xl">📱</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Téléphone / WhatsApp</p>
                        <a href="https://wa.me/221775555618"
                           class="text-orange-500 hover:text-orange-600 font-medium">
                            +221 77 555 56 18
                        </a>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="bg-orange-100 p-3 rounded-xl shrink-0">
                        <span class="text-xl">🕐</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Horaires d'ouverture</p>
                        <p class="text-gray-600">Lundi - Samedi : 8h00 - 19h00</p>
                        {{-- <p class="text-gray-600">Dimanche : 9h00 - 13h00</p> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA --}}
        <div class="bg-gray-900 rounded-2xl p-8 text-white text-center">
            <span class="text-5xl block mb-4">💬</span>
            <h3 class="text-2xl font-bold mb-3">Discutons de votre projet !</h3>
            <p class="text-gray-400 mb-6">
                Notre équipe est disponible pour répondre à toutes vos questions
                et vous accompagner dans vos projets.
            </p>
            <a href="https://wa.me/221775555618?text=Bonjour%2C%20je%20souhaite%20avoir%20des%20informations%20sur%20vos%20produits."
               target="_blank"
               class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-xl transition-all hover:scale-105">
                💬 Contacter via WhatsApp
            </a>
        </div>

    </div>
</div>

@endsection