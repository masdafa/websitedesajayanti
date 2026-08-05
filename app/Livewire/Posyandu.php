<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PosyanduProfile;
use App\Models\PosyanduActivity;
use App\Models\PosyanduGallery;

class Posyandu extends Component
{
    public $selectedMonth = '';
    public $selectedYear = '';

    public function render()
    {
        $profile = PosyanduProfile::firstOrCreate(
            ['id' => 1],
            ['title' => 'Profil Posyandu', 'content' => 'Data profil belum tersedia.']
        );
        $activities = PosyanduActivity::orderBy('schedule')->get();
        
        $galleryQuery = PosyanduGallery::query();
        
        if ($this->selectedMonth) {
            $galleryQuery->whereMonth('published_date', $this->selectedMonth);
        }
        
        if ($this->selectedYear) {
            $galleryQuery->whereYear('published_date', $this->selectedYear);
        }
        
        $galleries = $galleryQuery->orderByRaw('COALESCE(published_date, created_at) desc')->get();
        
        $availableYears = PosyanduGallery::selectRaw('YEAR(COALESCE(published_date, created_at)) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('livewire.posyandu', compact('profile', 'activities', 'galleries', 'availableYears'))
            ->layout('layouts.app');
    }
}
