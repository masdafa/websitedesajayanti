<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterRequest extends Model
{
    protected $fillable = ['name', 'nik', 'phone', 'address', 'purpose', 'status', 'notes'];
}
