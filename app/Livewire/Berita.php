<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Berita extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('is_published', true)
            ->when($this->search, function($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                      ->orWhere('content', 'like', '%'.$this->search.'%');
            })
            ->latest()
            ->paginate(9);

        return view('livewire.berita', [
            'posts' => $posts
        ])->layout('layouts.app');
    }
}
