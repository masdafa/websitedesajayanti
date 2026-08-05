<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DkmGallery extends Model
{
    protected $fillable = [
        'title',
        'images',
        'description',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
        'images' => 'array',
    ];
}
