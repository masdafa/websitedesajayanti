<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class BeritaDetail extends Component
{
    public $post;

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.berita-detail')->layout('layouts.app', ['title' => $this->post->title]);
    }
}
