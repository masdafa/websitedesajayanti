<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Staff;
use App\Models\SiteSetting;

class Profil extends Component
{
    public function render()
    {
        $staffs   = Staff::orderBy('order', 'asc')->get();
        $settings = SiteSetting::pluck('value', 'key');
        return view('livewire.profil', [
            'staffs'   => $staffs,
            'settings' => $settings,
        ])->layout('layouts.app');
    }
}
