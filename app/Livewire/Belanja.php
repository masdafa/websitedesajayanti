<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Belanja extends Component
{
    public function render()
    {
        return view('livewire.belanja', [
            'products' => Product::latest()->get()
        ]);
    }
}
