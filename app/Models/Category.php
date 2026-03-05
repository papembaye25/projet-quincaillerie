<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
    ];
    //generer automatiquement le slug à partir du nom
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category){
            $category->slug = Str::slug($category->name);
        });
    }
    //dans une categorie, on peut avoir plusieurs produits
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    //Maintenant, ici on recupere seulement les catégories actives
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
