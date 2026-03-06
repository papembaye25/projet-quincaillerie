<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Produits
Route::get('/produits', [ProductController::class, 'index'])->name('products.index');
Route::get('/produits/{slug}', [ProductController::class, 'show'])->name('products.show');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services');

// À propos
Route::get('/a-propos', function() {
    return view('pages.about');
})->name('about');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');