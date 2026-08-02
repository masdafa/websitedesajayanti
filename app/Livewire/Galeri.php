<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gallery;

class Galeri extends Component
{
    public $selectedMonth = '';
    public $selectedYear = '';

    public function render()
    {
        $query = Gallery::query();

        if ($this->selectedMonth) {
            $query->whereMonth('published_date', $this->selectedMonth);
        }
        
        if ($this->selectedYear) {
            $query->whereYear('published_date', $this->selectedYear);
        }

        $galleries = $query->orderByRaw('COALESCE(published_date, created_at) desc')->get();
        
        // Get available years for the dropdown
        $availableYears = Gallery::selectRaw('YEAR(COALESCE(published_date, created_at)) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('livewire.galeri', [
            'galleries' => $galleries,
            'availableYears' => $availableYears
        ])->layout('layouts.app', ['title' => 'Galeri Foto']);
    }
}
