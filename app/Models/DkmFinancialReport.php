<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DkmFinancialReport extends Model
{
    protected $fillable = ['month', 'year', 'income', 'expense', 'balance'];
}
