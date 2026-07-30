<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IuranInfo extends Model
{
    protected $fillable = ['title', 'description', 'amount', 'is_active', 'sort_order'];
}
