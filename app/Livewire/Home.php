<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Home extends Component
{
    public function render()
    {
        $latestPosts = Post::where('is_published', true)->latest()->take(3)->get();
        return view('livewire.home', [
            'latestPosts' => $latestPosts
        ])->layout('layouts.app');
    }
}
