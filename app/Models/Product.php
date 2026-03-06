<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id',        // ✅ Corrigé
        'name',
        'slug',
        'description',
        'price',
        'is_featured',
        'is_active'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function($product) {
            $product->slug = Str::slug($product->name);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // ✅ Ajouté
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}