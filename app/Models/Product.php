<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'seller_name', 'price', 'description', 'whatsapp_number', 'social_media_link', 'ecommerce_link', 'images', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
        'images' => 'array',
    ];
}
