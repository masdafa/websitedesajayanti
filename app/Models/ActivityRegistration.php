<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityRegistration extends Model
{
    protected $fillable = ['name', 'phone', 'activity_name', 'notes', 'status'];
}
