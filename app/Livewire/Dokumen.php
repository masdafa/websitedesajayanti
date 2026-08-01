<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Document as DocumentModel;

class Dokumen extends Component
{
    public string $category = 'all';
    public string $search = '';

    public function render()
    {
        $documents = DocumentModel::where('is_published', true)
            ->when($this->category !== 'all', fn($q) => $q->where('category', $this->category))
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(12);

        $categories = DocumentModel::where('is_published', true)
            ->distinct()
            ->pluck('category');

        return view('livewire.dokumen', compact('documents', 'categories'))
            ->layout('layouts.app', ['title' => 'Download Dokumen']);
    }
}
