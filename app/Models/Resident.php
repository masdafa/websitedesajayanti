<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'no_kk',
        'blok_rumah',
        'no_hp',
        'status_warga',
        'agama',
        'pekerjaan'
    ];
}
