<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products'         => Product::count(),
            'categories'       => Category::count(),
            'contacts'         => Contact::count(),
            'unread_contacts'  => Contact::unread()->count(),
        ];

        $latestContacts = Contact::latest()->take(5)->get();
        $latestProducts = Product::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestContacts', 'latestProducts'));
    }
}