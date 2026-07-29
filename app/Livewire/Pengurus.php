<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;

class Pengurus extends Component
{
    public function render()
    {
        $staffs = Staff::orderBy('order', 'asc')->get();
        return view('livewire.pengurus', compact('staffs'))->layout('layouts.app');
    }
}
