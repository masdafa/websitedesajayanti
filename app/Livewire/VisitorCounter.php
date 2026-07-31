<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Visitor;

class VisitorCounter extends Component
{
    public function render()
    {
        $count = Visitor::whereDate('date', today())->count();
        return view('livewire.visitor-counter', compact('count'));
    }
}
