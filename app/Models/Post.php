<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'images', 'is_published', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'images' => 'array',
    ];
}
