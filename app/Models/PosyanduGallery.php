<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosyanduGallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'images', 'date'];

    protected $casts = [
        'date' => 'date',
        'images' => 'array',
    ];
}
