<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DkmActivity extends Model
{
    protected $fillable = ['title', 'schedule', 'icon', 'description'];
}
