<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Staff;

class Profil extends Component
{
    public function render()
    {
        $staffs = Staff::orderBy('order', 'asc')->get();
        return view('livewire.profil', [
            'staffs' => $staffs
        ])->layout('layouts.app');
    }
}
