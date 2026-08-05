<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class K3Deposit extends Model
{
    protected $fillable = [
        'year',
        'month',
        'rt_23',
        'rt_24',
        'rt_25',
        'jumlah'
    ];
}
