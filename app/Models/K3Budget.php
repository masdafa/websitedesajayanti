<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class K3Budget extends Model
{
    protected $fillable = [
        'year',
        'item',
        'amount',
        'description'
    ];
}
