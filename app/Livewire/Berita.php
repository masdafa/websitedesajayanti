<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\Post;

class Berita extends Component
{
    use WithPagination;

    public $search = '';

    #[Url(as: 'tab')]
    public $activeTab = 'semua'; // semua | berita | pengumuman

    #[Url]
    public $month = '';

    #[Url]
    public $year = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingActiveTab()
    {
        $this->resetPage();
    }

    public function updatingMonth()
    {
        $this->resetPage();
    }

    public function updatingYear()
    {
        $this->resetPage();
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }

    public function render()
    {
        $query = Post::where('is_published', true)
            ->when($this->search, function ($q) {
                $q->where(function($subQ) {
                    $subQ->where('title', 'like', '%' . $this->search . '%')
                         ->orWhere('content', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->activeTab !== 'semua', function ($q) {
                $q->where('type', $this->activeTab);
            })
            ->when($this->month, function ($q) {
                $q->whereMonth('created_at', $this->month);
            })
            ->when($this->year, function ($q) {
                $q->whereYear('created_at', $this->year);
            })
            ->latest();

        $posts         = $query->paginate(9);
        $totalBerita   = Post::where('is_published', true)->where('type', 'berita')->count();
        $totalPengumuman = Post::where('is_published', true)->where('type', 'pengumuman')->count();

        return view('livewire.berita', compact('posts', 'totalBerita', 'totalPengumuman'))
            ->layout('layouts.app', ['title' => 'Berita & Pengumuman']);
    }
}
