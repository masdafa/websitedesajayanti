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

        $heroItems = collect();
        
        foreach($latestPosts as $post) {
            $heroItems->push((object)[
                'type' => 'post',
                'title' => $post->title,
                'description' => \Illuminate\Support\Str::limit(strip_tags($post->content), 150),
                'image' => $post->image,
                'link' => route('berita.detail', $post->slug),
                'button_text' => 'Baca Selengkapnya',
                'badge' => 'Berita & Pengumuman',
                'badge_color' => 'bg-green-600/90'
            ]);
        }
        
        foreach($galleries->take(3) as $gallery) {
            $heroItems->push((object)[
                'type' => 'gallery',
                'title' => $gallery->title,
                'description' => $gallery->description ?? 'Dokumentasi kegiatan warga.',
                'image' => $gallery->image,
                'link' => route('galeri'),
                'button_text' => 'Lihat Galeri',
                'badge' => 'Galeri Foto',
                'badge_color' => 'bg-orange-600/90'
            ]);
        }

        return view('livewire.home', [
            'latestPosts'     => $latestPosts,
            'staffs'          => $staffs,
            'galleries'       => $galleries,
            'upcomingAgendas' => $upcomingAgendas,
            'facilities'      => $facilities,
            'settings'        => $settings,
            'heroItems'       => $heroItems,
        ])->layout('layouts.app', ['title' => 'Beranda']);
    }
}
