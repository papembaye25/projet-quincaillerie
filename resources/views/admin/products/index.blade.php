@extends('admin.layouts.app')
@section('title', 'Produits')

@section('content')

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-gray-800">📦 Gestion des produits</h1>
        <a href="{{ route('admin.products.create') }}"
           class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-6 py-3 rounded-xl transition-all hover:scale-105">
            ➕ Ajouter un produit
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Produit</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Catégorie</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Prix</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Statut</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Vedette</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                <tr class="hover:bg-gray-50 transition-colors">

                    {{-- Produit --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-lg">
                                @if($product->primaryImage)
                                    <img src="{{ asset('storage/' . $product->primaryImage->image_path) }}"
                                         class="w-10 h-10 rounded-lg object-cover">
                                @else
                                    🔧
                                @endif
                            </div>
                            <div>
                                <p class="font-medium text-gray-800 text-sm">{{ $product->name }}</p>
                                <p class="text-gray-400 text-xs">{{ Str::limit($product->description, 40) }}</p>
                            </div>
                        </div>
                    </td>

                    {{-- Catégorie --}}
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-600">
                            {{ $product->category->name ?? '-' }}
                        </span>
                    </td>

                    {{-- Prix --}}
                    <td class="px-6 py-4">
                        <span class="text-sm font-medium text-gray-800">
                            @if($product->price)
                                {{ number_format($product->price, 0, ',', ' ') }} FCFA
                            @else
                                <span class="text-gray-400">Sur demande</span>
                            @endif
                        </span>
                    </td>

                    {{-- Statut --}}
                    <td class="px-6 py-4">
                        <span class="text-xs px-3 py-1 rounded-full font-medium
                            {{ $product->is_active ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                            {{ $product->is_active ? '✅ Actif' : '❌ Inactif' }}
                        </span>
                    </td>

                    {{-- Vedette --}}
                    <td class="px-6 py-4">
                        <span class="text-xs px-3 py-1 rounded-full font-medium
                            {{ $product->is_featured ? 'bg-orange-100 text-orange-600' : 'bg-gray-100 text-gray-400' }}">
                            {{ $product->is_featured ? '⭐ Oui' : 'Non' }}
                        </span>
                    </td>

                    {{-- Actions --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.products.edit', $product) }}"
                               class="bg-blue-50 hover:bg-blue-100 text-blue-600 text-xs font-medium px-3 py-2 rounded-lg transition-colors">
                                ✏️ Modifier
                            </a>
                            <form method="POST"
                                  action="{{ route('admin.products.destroy', $product) }}"
                                  onsubmit="return confirm('Supprimer ce produit ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-50 hover:bg-red-100 text-red-600 text-xs font-medium px-3 py-2 rounded-lg transition-colors">
                                    🗑️ Supprimer
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                        Aucun produit. <a href="{{ route('admin.products.create') }}" class="text-orange-500">Ajouter le premier !</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        @if($products->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $products->links() }}
        </div>
        @endif

    </div>

@endsection