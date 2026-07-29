<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DkmStaff extends Model
{
    protected $fillable = ['name', 'position', 'image', 'sort_order'];
}
