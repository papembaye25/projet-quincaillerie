<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'order',
        'is_active'
    ];

    //Maintenant, ici on recupere seulement les services actifs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
