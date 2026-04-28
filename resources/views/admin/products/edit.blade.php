@extends('admin.layouts.app')
@section('title', 'Modifier ' . $product->name)

@section('content')

    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.products.index') }}"
           class="text-gray-500 hover:text-gray-700 transition-colors">
            ← Retour
        </a>
        <h1 class="text-2xl font-bold text-gray-800">✏️ Modifier : {{ $product->name }}</h1>
    </div>

    {{-- Images existantes HORS du formulaire principal --}}
    @if($product->images->count() > 0)
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-3">
            Images actuelles
        </label>
        <div class="flex flex-wrap gap-3">
            @foreach($product->images as $image)
            <div class="relative w-24 h-24">
                <img src="{{ asset('storage/' . $image->image_path) }}"
                     class="w-24 h-24 object-cover rounded-xl border border-gray-200">
                @if($image->is_primary)
                <span class="absolute bottom-1 left-1 bg-orange-500 text-white text-xs px-1.5 py-0.5 rounded-md">
                    ⭐
                </span>
                @endif
                <form method="POST"
                      action="{{ route('admin.products.images.destroy', $image) }}"
                      onsubmit="return confirm('Supprimer cette image ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="absolute top-1 right-1 bg-red-500 hover:bg-red-600 text-white text-xs w-6 h-6 rounded-full flex items-center justify-center font-bold">
                        ×
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Formulaire principal --}}
    <div class="bg-white rounded-xl shadow-sm p-8">

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

        <form method="POST"
              action="{{ route('admin.products.update', $product) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nom --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nom du produit <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $product->name) }}"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all">
                </div>

                {{-- Catégorie --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Catégorie <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all">
                        <option value="">-- Choisir une catégorie --</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Prix --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Prix (FCFA)
                    </label>
                    <input type="number"
                           name="price"
                           value="{{ old('price', $product->price) }}"
                           min="0"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all">
                    <p class="text-gray-400 text-xs mt-1">Laisser vide = "Prix sur demande"</p>
                </div>

                {{-- Options --}}
                <div class="flex flex-col justify-center gap-4">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                               class="w-5 h-5 text-orange-500 rounded">
                        <span class="text-sm font-medium text-gray-700">✅ Produit actif</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                               class="w-5 h-5 text-orange-500 rounded">
                        <span class="text-sm font-medium text-gray-700">⭐ Produit vedette</span>
                    </label>
                </div>

                {{-- Description --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea name="description"
                              rows="4"
                              class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all resize-none">{{ old('description', $product->description) }}</textarea>
                </div>

                {{-- Nouvelles images --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Ajouter de nouvelles images
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-orange-400 transition-colors">
                        <input type="file"
                               name="images[]"
                               multiple
                               accept="image/*"
                               class="hidden"
                               id="images"
                               onchange="previewImages(event)">
                        <label for="images" class="cursor-pointer">
                            <span class="text-4xl block mb-2">📸</span>
                            <p class="text-gray-600 font-medium">Cliquez pour ajouter des images</p>
                            <p class="text-gray-400 text-sm mt-1">JPG, PNG, WEBP</p>
                        </label>
                    </div>
                    <div id="preview" class="flex flex-wrap gap-3 mt-4"></div>
                </div>

            </div>

            {{-- Boutons --}}
            <div class="flex items-center gap-4 mt-8 pt-6 border-t border-gray-100">
                <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-8 py-3 rounded-xl transition-all hover:scale-105">
                    💾 Enregistrer les modifications
                </button>
                <a href="{{ route('admin.products.index') }}"
                   class="text-gray-500 hover:text-gray-700 font-medium transition-colors">
                    Annuler
                </a>
            </div>

        </form>
    </div>

<script>
function previewImages(event) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';
    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative';
            div.innerHTML = `
                <img src="${e.target.result}"
                     class="w-24 h-24 object-cover rounded-xl border-2 border-orange-400">
            `;
            preview.appendChild(div);
        }
        reader.readAsDataURL(files[i]);
    }
}
</script>

@endsection