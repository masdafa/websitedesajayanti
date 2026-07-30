<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    protected $fillable = ['name', 'phone', 'origin', 'purpose', 'visit_date', 'status'];
    protected $casts = ['visit_date' => 'datetime'];
}
