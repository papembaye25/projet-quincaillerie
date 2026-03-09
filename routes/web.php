<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produits', [ProductController::class, 'index'])->name('products.index');
Route::get('/produits/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/a-propos', function() {
    return view('pages.about');
})->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Routes Admin protégées
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Produits
    Route::resource('products', AdminProductController::class);

    // Messages
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

});

// Auth Breeze
require __DIR__.'/auth.php';