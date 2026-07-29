<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResidentReport;
use App\Models\ServiceInfo;
use Livewire\Attributes\Validate;

class Layanan extends Component
{
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('nullable|string|max:20')]
    public string $phone = '';

    #[Validate('nullable|string|max:255')]
    public string $address = '';

    #[Validate('required|string')]
    public string $category = 'Umum';

    #[Validate('required|string|min:20')]
    public string $message = '';

    public bool $submitted = false;

    public function submit()
    {
        $this->validate();

        ResidentReport::create([
            'name'     => $this->name,
            'phone'    => $this->phone,
            'address'  => $this->address,
            'category' => $this->category,
            'message'  => $this->message,
        ]);

        $this->reset(['name', 'phone', 'address', 'category', 'message']);
        $this->submitted = true;
    }

    public function render()
    {
        $services = ServiceInfo::orderBy('sort_order')->get();
        return view('livewire.layanan', compact('services'))
            ->layout('layouts.app', ['title' => 'Layanan Warga - Perumahan Jayanti Residence']);
    }
}
