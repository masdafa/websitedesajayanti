<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhbiEvent extends Model
{
    protected $fillable = ['title', 'icon', 'description', 'images'];

    protected $casts = [
        'images' => 'array',
    ];
}
