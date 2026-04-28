@extends('layouts.app')
@section('title', 'Contact - Quincaillerie Ibrahima Gaye')

@section('content')

{{-- Header --}}
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-extrabold mb-4">Contactez-Nous</h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto">
            Une question ? Un devis ? Nous sommes là pour vous aider !
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

        {{-- Infos de contact --}}
        <div class="space-y-6">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Nos coordonnées</h2>

            <div class="flex items-start gap-4">
                <div class="bg-orange-100 p-3 rounded-xl shrink-0">
                    <span class="text-xl">📍</span>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Adresse</p>
                    <p class="text-gray-600 text-sm">Dakar, Sénégal</p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="bg-orange-100 p-3 rounded-xl shrink-0">
                    <span class="text-xl">📱</span>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">WhatsApp</p>
                    <a href="https://wa.me/221775555618"
                       class="text-orange-500 hover:text-orange-600 text-sm font-medium">
                        +221 77 555 56 18
                    </a>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="bg-orange-100 p-3 rounded-xl shrink-0">
                    <span class="text-xl">🕐</span>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Horaires</p>
                    <p class="text-gray-600 text-sm">Lun - Sam : 8h00 - 19h00</p>
                </div>
            </div>

            {{-- Bouton WhatsApp --}}
            <a href="https://wa.me/221775555618?text=Bonjour%2C%20je%20souhaite%20avoir%20des%20informations%20sur%20vos%20produits."
               target="_blank"
               class="flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-xl transition-all hover:scale-105 w-full">
                💬 Écrire sur WhatsApp
            </a>

        </div>

        {{-- Formulaire --}}
        <div class="md:col-span-2 bg-white rounded-2xl shadow-sm p-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Envoyez-nous un message</h2>

            {{-- Message succès --}}
            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
                ✅ {{ session('success') }}
            </div>
            @endif

            {{-- Erreurs --}}
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                <p class="font-medium mb-2">❌ Veuillez corriger les erreurs :</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nom --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nom complet <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Votre nom"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all text-sm">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="votre@email.com"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all text-sm">
                    </div>

                    {{-- Téléphone --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Téléphone
                        </label>
                        <input type="tel"
                               name="phone"
                               value="{{ old('phone') }}"
                               placeholder="+221 77 000 00 00"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all text-sm">
                    </div>

                    {{-- Sujet --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Sujet
                        </label>
                        <select name="subject"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 transition-all bg-white text-sm">
                            <option value="">-- Choisir un sujet --</option>
                            <option value="devis" {{ old('subject') == 'devis' ? 'selected' : '' }}>Demande de devis</option>
                            <option value="commande" {{ old('subject') == 'commande' ? 'selected' : '' }}>Commande</option>
                            <option value="livraison" {{ old('subject') == 'livraison' ? 'selected' : '' }}>Livraison</option>
                            <option value="autre" {{ old('subject') == 'autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                    </div>

                    {{-- Message --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea name="message"
                                  rows="5"
                                  placeholder="Décrivez votre demande..."
                                  class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all resize-none text-sm">{{ old('message') }}</textarea>
                    </div>

                </div>

                <button type="submit"
                        class="mt-6 w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition-all hover:scale-105">
                    📩 Envoyer le message
                </button>

            </form>
        </div>
    </div>
</div>

@endsection