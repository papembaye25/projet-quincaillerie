<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Récupère les 6 produits mis en avant
        $featuredProducts = Product::active()
                                   ->featured()
                                   ->with('primaryImage', 'category')
                                   ->take(6)
                                   ->get();

        // Récupère tous les services actifs
        $services = Service::active()
                           ->orderBy('order')
                           ->get();

        // Récupère toutes les catégories actives
        $categories = Category::active()->get();

        return view('pages.home', compact(
            'featuredProducts',
            'services',
            'categories'
        ));
    }
}