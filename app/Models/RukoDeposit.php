<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RukoDeposit extends Model
{
    protected $fillable = [
        'year',
        'name',
        'ruko_no',
        'january',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december',
        'deposit_count',
        'notes',
    ];

    public function getTotalAttribute()
    {
        return $this->january + $this->february + $this->march + 
               $this->april + $this->may + $this->june + 
               $this->july + $this->august + $this->september + 
               $this->october + $this->november + $this->december;
    }
}
