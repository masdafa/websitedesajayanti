<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResidentReport;
use App\Models\ServiceInfo;
use Livewire\Attributes\Validate;

class Layanan extends Component
{
    public function render()
    {
        $services = ServiceInfo::orderBy('sort_order')->get();
        return view('livewire.layanan', compact('services'))
            ->layout('layouts.app', ['title' => 'Layanan Warga - Perumahan Jayanti Residence']);
    }
}
