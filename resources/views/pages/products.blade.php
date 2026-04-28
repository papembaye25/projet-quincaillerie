@extends('layouts.app')
@section('title', 'Nos Produits - Quincaillerie Ibrahima Gaye')

@section('content')

{{-- Header --}}
<div class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-extrabold mb-2">Nos Produits</h1>
        <p class="text-gray-400">Découvrez notre gamme complète d'outils et matériaux</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- Recherche + Filtres --}}
    <form method="GET" action="{{ route('products.index') }}" class="mb-8">
        <div class="flex flex-col md:flex-row gap-4">

            {{-- Barre de recherche --}}
            <div class="flex-1 relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></span>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Rechercher un produit..."
                       class="w-full border border-gray-300 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all">
            </div>

            {{-- Filtre catégorie --}}
            <select name="category"
                    onchange="this.form.submit()"
                    class="border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 transition-all bg-white">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $category)
                <option value="{{ $category->slug }}"
                    {{ request('category') == $category->slug ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>

            {{-- Bouton recherche --}}
            <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-6 py-3 rounded-xl transition-all">
                Rechercher
            </button>

            {{-- Reset --}}
            @if(request('search') || request('category'))
            <a href="{{ route('products.index') }}"
               class="border border-gray-300 text-gray-600 hover:bg-gray-50 font-medium px-6 py-3 rounded-xl transition-all text-center">
                ✕ Réinitialiser
            </a>
            @endif

        </div>
    </form>

    {{-- Résultats --}}
    <div class="flex items-center justify-between mb-6">
        <p class="text-gray-500 text-sm">
            {{ $products->total() }} produit(s) trouvé(s)
            @if(request('search'))
                pour "<strong>{{ request('search') }}</strong>"
            @endif
            @if(request('category'))
                dans "<strong>{{ $categories->where('slug', request('category'))->first()->name ?? '' }}</strong>"
            @endif
        </p>
    </div>

    {{-- Grille produits --}}
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden group">

            {{-- Image --}}
            <div class="bg-gray-100 h-48 overflow-hidden relative">
                @if($product->primaryImage)
                    <img src="{{ asset('storage/' . $product->primaryImage->image_path) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <span class="text-5xl">🔧</span>
                    </div>
                @endif

                {{-- Badge vedette --}}
                @if($product->is_featured)
                <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-lg">
                    ⭐ Vedette
                </span>
                @endif
            </div>

            {{-- Infos --}}
            <div class="p-4">
                <span class="text-xs text-orange-500 font-semibold uppercase tracking-wide">
                    {{ $product->category->name ?? 'Sans catégorie' }}
                </span>
                <h3 class="font-bold text-gray-800 mt-1 line-clamp-1">{{ $product->name }}</h3>
                <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $product->description }}</p>

                <div class="flex items-center justify-between mt-4">
                    @if($product->price)
                    <span class="text-orange-500 font-bold">
                        {{ number_format($product->price, 0, ',', ' ') }} FCFA
                    </span>
                    @else
                    <span class="text-gray-400 text-sm">Prix sur demande</span>
                    @endif

                    <a href="{{ route('products.show', $product->slug) }}"
                       class="bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold px-3 py-2 rounded-lg transition-all">
                        Voir →
                    </a>
                </div>
            </div>

        </div>
        @empty
        <div class="col-span-4 text-center py-16">
            <span class="text-6xl block mb-4">🔍</span>
            <p class="text-gray-500 text-lg">Aucun produit trouvé.</p>
            <a href="{{ route('products.index') }}"
               class="text-orange-500 hover:text-orange-600 font-medium mt-2 inline-block">
                Voir tous les produits
            </a>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-10">
        {{ $products->links() }}
    </div>

</div>

@endsection