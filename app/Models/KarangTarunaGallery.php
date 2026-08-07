<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KarangTarunaGallery extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $casts = [
        'images' => 'array',
        'published_date' => 'date',
    ];
}
