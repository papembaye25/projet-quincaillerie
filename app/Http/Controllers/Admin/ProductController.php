<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'images'      => 'nullable|array',
            'images.*'    => 'nullable|file',
        ]);

        $product = Product::create([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price'       => $request->price,
            'is_featured' => $request->boolean('is_featured'),
            'is_active'   => $request->boolean('is_active', true),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $filename = 'products/' . uniqid() . '.webp';
                \Intervention\Image\Laravel\Facades\Image::read($image)
                    ->scale(width: 800)
                    ->toWebp(quality: 80)
                    ->save(storage_path('app/public/' . $filename));
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filename,
                    'is_primary' => $index === 0,
                    'order'      => $index,
                ]);
            }
        }

        return redirect()->route('admin.products.index')
                         ->with('success', 'Produit créé avec succès !');
    }

    public function edit(Product $product)
    {
        $categories = Category::active()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'images'      => 'nullable|array',
            'images.*'    => 'nullable|file',
        ]);

        $product->update([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price'       => $request->price,
            'is_featured' => $request->boolean('is_featured'),
            'is_active'   => $request->boolean('is_active'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $filename = 'products/' . uniqid() . '.webp';
                \Intervention\Image\Laravel\Facades\Image::read($image)
                    ->scale(width: 800)
                    ->toWebp(quality: 80)
                    ->save(storage_path('app/public/' . $filename));
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filename,
                    'is_primary' => $product->images()->count() === 0 && $index === 0,
                    'order'      => $product->images()->count() + $index,
                ]);
            }
        }

        return redirect()->route('admin.products.index')
                ->with('success', 'Produit modifié avec succès !');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        $product->delete();
        return redirect()->route('admin.products.index')
                ->with('success', 'Produit supprimé avec succès !');
    }

    public function destroyImage(ProductImage $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image supprimée !');
    }
}