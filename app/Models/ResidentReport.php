<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'address', 'category', 'message', 'status', 'response', 'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
