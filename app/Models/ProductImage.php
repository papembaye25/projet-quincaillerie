<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_path',
        'is_primary',
        'order'
    ];

    //une image appartient à un produit
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Retourne l'URL complète de l'image
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }   
}
