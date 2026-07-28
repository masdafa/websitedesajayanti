<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'file_path', 'category', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
