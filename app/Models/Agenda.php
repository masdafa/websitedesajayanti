<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'event_date', 'event_time',
        'location', 'category', 'is_published',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_published' => 'boolean',
    ];
}
