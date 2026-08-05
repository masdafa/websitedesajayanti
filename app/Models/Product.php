<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'owner_name', 'description', 'whatsapp_number', 'images', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
        'images' => 'array',
    ];
}
