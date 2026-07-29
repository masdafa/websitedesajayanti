<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DkmStaff;

class Dkm extends Component
{
    public function render()
    {
        $dkmStaffs = DkmStaff::orderBy('sort_order')->get();
        return view('livewire.dkm', compact('dkmStaffs'))->layout('layouts.app');
    }
}
