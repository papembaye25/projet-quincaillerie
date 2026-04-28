@extends('layouts.app')
@section('title', 'Nos Services - Quincaillerie Ibrahima Gaye')

@section('content')

{{-- Header --}}
<div class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-extrabold mb-4">Nos Services</h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto">
            Quincaillerie Ibrahima Gaye vous offre bien plus que des produits —
            nous vous accompagnons dans tous vos projets de construction et rénovation.
        </p>
    </div>
</div>

{{-- Services --}}
<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse($services as $service)
        <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 p-8 flex gap-6 group">

            {{-- Icône --}}
            <div class="bg-orange-100 group-hover:bg-orange-500 w-16 h-16 rounded-2xl flex items-center justify-center shrink-0 transition-all duration-300">
                @switch($service->icon)
                    @case('wrench')
                        <svg class="w-8 h-8 text-orange-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        @break
                    @case('building')
                        <svg class="w-8 h-8 text-orange-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        @break
                    @case('chat')
                        <svg class="w-8 h-8 text-orange-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        @break
                    @case('truck')
                        <svg class="w-8 h-8 text-orange-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2 2h10l2-2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 8h4l3 5v3h-2"/>
                        </svg>
                        @break
                    @default
                        <span class="text-3xl">🔧</span>
                @endswitch
            </div>

            {{-- Contenu --}}
            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-orange-500 transition-colors">
                    {{ $service->title }}
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ $service->description }}
                </p>
            </div>

        </div>
        @empty
        <div class="col-span-2 text-center py-16">
            <p class="text-gray-400">Aucun service disponible.</p>
        </div>
        @endforelse
    </div>
</div>

{{-- CTA --}}
<div class="bg-orange-500 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-extrabold text-white mb-4">
            Besoin d'un service particulier ?
        </h2>
        <p class="text-orange-100 text-lg mb-8">
            Contactez-nous via WhatsApp pour un devis gratuit et rapide !
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/221775555618?text=Bonjour%2C%20je%20souhaite%20avoir%20des%20informations%20sur%20vos%20services."
               target="_blank"
               class="bg-white text-orange-500 hover:bg-orange-50 font-bold py-4 px-8 rounded-xl transition-all hover:scale-105">
                💬 WhatsApp
            </a>
            <a href="{{ route('contact') }}"
               class="border-2 border-white text-white hover:bg-white hover:text-orange-500 font-bold py-4 px-8 rounded-xl transition-all">
                📩 Formulaire de contact
            </a>
        </div>
    </div>
</div>

@endsection