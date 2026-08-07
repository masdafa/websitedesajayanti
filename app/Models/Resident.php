<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'block',
        'rt',
        'nama_ayah',
        'nama_ibu',
        'nama_anak_1',
        'nama_anak_2',
        'nama_anak_3',
        'nama_anak_4',
        'nama_anak_5',
        'nama_anak_6',
        'keterangan'
    ];
}
