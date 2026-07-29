<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Staff;
use App\Models\Gallery;
use App\Models\Agenda as AgendaModel;
use App\Models\SiteSetting;
use App\Models\Facility;

class Home extends Component
{
    public function render()
    {
        $latestPosts     = Post::where('is_published', true)->latest()->take(3)->get();
        $staffs          = Staff::orderBy('order')->take(4)->get();
        $galleries       = Gallery::latest()->whereNotNull('image')->take(6)->get();
        $upcomingAgendas = AgendaModel::where('is_published', true)
            ->where('event_date', '>=', today())
            ->orderBy('event_date')
            ->take(3)
            ->get();
        $facilities      = Facility::orderBy('sort_order')->get();
        $settings        = SiteSetting::pluck('value', 'key');

        return view('livewire.home', [
            'latestPosts'     => $latestPosts,
            'staffs'          => $staffs,
            'galleries'       => $galleries,
            'upcomingAgendas' => $upcomingAgendas,
            'facilities'      => $facilities,
            'settings'        => $settings,
        ])->layout('layouts.app', ['title' => 'Beranda - Perumahan Jayanti Residence']);
    }
}
