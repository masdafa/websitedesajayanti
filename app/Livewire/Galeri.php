<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gallery;

class Galeri extends Component
{
    public function render()
    {
        $galleries = Gallery::latest()->get();
        return view('livewire.galeri', [
            'galleries' => $galleries
        ])->layout('layouts.app');
    }
}
