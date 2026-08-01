<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Faq as FaqModel;

class Faq extends Component
{
    public function render()
    {
        $faqs = FaqModel::where('is_published', true)->orderBy('order')->get();
        return view('livewire.faq', compact('faqs'))
            ->layout('layouts.app', ['title' => 'FAQ']);
    }
}
