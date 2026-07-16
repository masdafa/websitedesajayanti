<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Infographic;

class Infografis extends Component
{
    public function render()
    {
        return view('livewire.infografis', [
            'infographics' => Infographic::latest()->get()
        ]);
    }
}
