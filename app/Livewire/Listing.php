<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Listing as LocalListing;

class Listing extends Component
{
    public function render()
    {
        return view('livewire.listing', [
            'listings' => LocalListing::latest()->get()
        ]);
    }
}
