<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siskamling;

class Keamanan extends Component
{
    public function render()
    {
        $siskamlings = Siskamling::orderBy('sort_order')->get();
        return view('livewire.keamanan', compact('siskamlings'))
            ->layout('layouts.app', ['title' => 'Keamanan & Darurat']);
    }
}
