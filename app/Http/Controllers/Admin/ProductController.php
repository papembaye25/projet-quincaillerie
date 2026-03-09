<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Liste des produits
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // Formulaire création
    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.products.create', compact('categories'));
    }

    // Enregistrer nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
            'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product = Product::create([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price'       => $request->price,
            'is_featured' => $request->boolean('is_featured'),
            'is_active'   => $request->boolean('is_active', true),
        ]);

        // Upload images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                    'order'      => $index,
                ]);
            }
        }

        return redirect()->route('admin.products.index')
                         ->with('success', 'Produit créé avec succès !');
    }

    // Formulaire modification
    public function edit(Product $product)
    {
        $categories = Category::active()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Mettre à jour
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
            'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product->update([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price'       => $request->price,
            'is_featured' => $request->boolean('is_featured'),
            'is_active'   => $request->boolean('is_active'),
        ]);

        // Nouvelles images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_primary' => $product->images()->count() === 0 && $index === 0,
                    'order'      => $product->images()->count() + $index,
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Produit modifié avec succès !');
    }

    // Supprimer
    public function destroy(Product $product)
    {
        // Supprimer les images du storage
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produit supprimé avec succès !');
    }
}