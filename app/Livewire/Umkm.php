<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Umkm extends Component
{
    public string $search = '';

    public function render()
    {
        $products = Product::when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(12);
        return view('livewire.umkm', compact('products'))
            ->layout('layouts.app', ['title' => 'UMKM Warga']);
    }
}
