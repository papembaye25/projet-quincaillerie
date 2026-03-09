@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')

    <h1 class="text-2xl font-bold text-gray-800 mb-8">
        Bienvenue, {{ auth()->user()->name }} ! 👋
    </h1>

    {{-- Statistiques --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-orange-500">
            <p class="text-gray-500 text-sm">Total Produits</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $stats['products'] }}</p>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-blue-500">
            <p class="text-gray-500 text-sm">Catégories</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $stats['categories'] }}</p>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-green-500">
            <p class="text-gray-500 text-sm">Messages reçus</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $stats['contacts'] }}</p>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-red-500">
            <p class="text-gray-500 text-sm">Messages non lus</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $stats['unread_contacts'] }}</p>
        </div>

    </div>

    {{-- Raccourcis --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <a href="{{ route('admin.products.create') }}"
           class="bg-orange-500 hover:bg-orange-600 text-white rounded-xl p-6 shadow-sm transition-all hover:scale-105 flex items-center gap-4">
            <span class="text-3xl">➕</span>
            <div>
                <h3 class="font-bold">Ajouter un produit</h3>
                <p class="text-orange-100 text-sm">Nouveau produit</p>
            </div>
        </a>

        <a href="{{ route('admin.products.index') }}"
           class="bg-white hover:bg-gray-50 rounded-xl p-6 shadow-sm transition-all hover:scale-105 flex items-center gap-4">
            <span class="text-3xl">📦</span>
            <div>
                <h3 class="font-bold text-gray-800">Gérer les produits</h3>
                <p class="text-gray-500 text-sm">Liste complète</p>
            </div>
        </a>

        <a href="{{ route('admin.contacts.index') }}"
           class="bg-white hover:bg-gray-50 rounded-xl p-6 shadow-sm transition-all hover:scale-105 flex items-center gap-4">
            <span class="text-3xl">📬</span>
            <div>
                <h3 class="font-bold text-gray-800">Messages clients</h3>
                <p class="text-gray-500 text-sm">{{ $stats['unread_contacts'] }} non lu(s)</p>
            </div>
        </a>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Derniers produits --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="font-bold text-gray-800 mb-4">📦 Derniers produits</h2>
            @forelse($latestProducts as $product)
            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                <div>
                    <p class="font-medium text-gray-800 text-sm">{{ $product->name }}</p>
                    <p class="text-gray-400 text-xs">{{ $product->category->name ?? '-' }}</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs px-2 py-1 rounded-full {{ $product->is_active ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                        {{ $product->is_active ? 'Actif' : 'Inactif' }}
                    </span>
                    <a href="{{ route('admin.products.edit', $product) }}"
                       class="text-orange-500 hover:text-orange-600 text-xs font-medium">
                        Modifier
                    </a>
                </div>
            </div>
            @empty
            <p class="text-gray-400 text-sm">Aucun produit.</p>
            @endforelse
        </div>

        {{-- Derniers messages --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="font-bold text-gray-800 mb-4">📬 Derniers messages</h2>
            @forelse($latestContacts as $contact)
            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                <div>
                    <p class="font-medium text-gray-800 text-sm flex items-center gap-2">
                        {{ $contact->name }}
                        @if(!$contact->is_read)
                        <span class="bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">Nouveau</span>
                        @endif
                    </p>
                    <p class="text-gray-400 text-xs">{{ Str::limit($contact->message, 40) }}</p>
                </div>
                <a href="{{ route('admin.contacts.show', $contact) }}"
                   class="text-blue-500 hover:text-blue-600 text-xs font-medium">
                    Voir
                </a>
            </div>
            @empty
            <p class="text-gray-400 text-sm">Aucun message.</p>
            @endforelse
        </div>

    </div>

@endsection