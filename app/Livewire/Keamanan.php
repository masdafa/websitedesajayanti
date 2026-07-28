<?php

namespace App\Livewire;

use Livewire\Component;

class Keamanan extends Component
{
    public function render()
    {
        return view('livewire.keamanan')
            ->layout('layouts.app', ['title' => 'Keamanan & Darurat - Perumahan Jayanti Residence']);
    }
}
