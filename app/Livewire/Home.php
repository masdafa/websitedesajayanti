<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Home extends Component
{
    public function render()
    {
        $latestPosts = Post::where('is_published', true)->latest()->take(3)->get();
        $staffs = \App\Models\Staff::orderBy('order')->take(4)->get();
        $galleries = \App\Models\Gallery::latest()->whereNotNull('image')->take(6)->get();

        return view('livewire.home', [
            'latestPosts' => $latestPosts,
            'staffs' => $staffs,
            'galleries' => $galleries
        ])->layout('layouts.app');
    }
}
