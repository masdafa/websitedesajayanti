<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\IuranInfo;

class IuranInfoView extends Component
{
    public function render()
    {
        $iurans = IuranInfo::where('is_active', true)->orderBy('sort_order')->get();
        return view('livewire.iuran-info-view', compact('iurans'))->layout('layouts.app');
    }
}
