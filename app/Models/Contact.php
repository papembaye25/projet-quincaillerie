<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'is_read'
    ];

    //Maintenant, ici on recupere seulement les messages non lus
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }
}
