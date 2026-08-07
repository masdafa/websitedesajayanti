<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KarangTarunaProfile;
use App\Models\KarangTarunaStaff;
use App\Models\KarangTarunaActivity;
use App\Models\KarangTarunaGallery;

class KarangTaruna extends Component
{
    public $selectedMonth = '';
    public $selectedYear = '';

    public function render()
    {
        $profile = KarangTarunaProfile::firstOrCreate(
            ['id' => 1],
            ['title' => 'Profil Karang Taruna', 'content' => 'Data profil belum tersedia.']
        );
        $staffs = KarangTarunaStaff::orderBy('sort_order')->get();
        $activities = KarangTarunaActivity::orderByRaw('COALESCE(date, created_at) desc')->get();
        
        $galleryQuery = KarangTarunaGallery::query();
        
        if ($this->selectedMonth) {
            $galleryQuery->whereMonth('published_date', $this->selectedMonth);
        }
        
        if ($this->selectedYear) {
            $galleryQuery->whereYear('published_date', $this->selectedYear);
        }
        
        $galleries = $galleryQuery->orderByRaw('COALESCE(published_date, created_at) desc')->get();
        
        $availableYears = KarangTarunaGallery::selectRaw('YEAR(COALESCE(published_date, created_at)) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('livewire.karang-taruna', compact('profile', 'staffs', 'activities', 'galleries', 'availableYears'))
            ->layout('layouts.app');
    }
}
