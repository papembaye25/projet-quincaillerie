<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::active()
                           ->with('primaryImage', 'category')
                           ->latest()
                           ->paginate(12);

        $categories = Category::active()->get();

        return view('pages.products', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
                          ->with('images', 'category')
                          ->firstOrFail();

        return view('pages.product-detail', compact('product'));
    }
}