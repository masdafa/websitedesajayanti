<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZiswafReport extends Model
{
    protected $fillable = ['month_name', 'income', 'expense', 'balance'];
}
