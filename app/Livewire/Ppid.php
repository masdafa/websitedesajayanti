<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PublicDocument;

class Ppid extends Component
{
    public function render()
    {
        return view('livewire.ppid', [
            'documents' => PublicDocument::latest()->get()
        ]);
    }
}
