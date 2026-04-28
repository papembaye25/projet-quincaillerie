@extends('layouts.app')
@section('title', 'Nos Produits - Quincaillerie Ibrahima Gaye')
@section('content')

<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Nos Produits</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden">
                @if($product->primaryImage)
                    <img src="{{ asset('storage/' . $product->primaryImage->image_path) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover">
                @else
                    <span class="text-gray-400 text-4xl">🔧</span>
                @endif
        </div>
            <div class="p-4">
                <span class="text-xs text-orange-500 font-semibold uppercase">
                    {{ $product->category->name ?? 'Sans catégorie' }}
                </span>
                <h3 class="font-bold text-gray-800 mt-1">{{ $product->name }}</h3>
                <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $product->description }}</p>
                @if($product->price)
                <p class="text-orange-500 font-bold mt-2">
                    {{ number_format($product->price, 0, ',', ' ') }} FCFA
                </p>
                @endif
            </div>
        </div>
        @empty
        <p class="text-gray-500 col-span-4">Aucun produit disponible.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>

@endsection