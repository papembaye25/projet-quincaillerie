<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable =[
        'categorie_id',
        'name',
        'slug',
        'description',
        'price',
        'is_featured',
        'is_active'
    ];

    //generer automatiquement le slug à partir du nom
    protected static function boot()
    {
        parent::boot();
        static::creating(function($product){
            $product->slug = Str::slug($product->name);
        });
    }

    //un produit appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //un produit peut avoir plusieurs images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    //ici on recupere l'image principale du produit
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    //Maintenant, ici on recupere seulement les produits actifs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
