<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Staff;
use App\Models\Gallery;
use App\Models\Agenda as AgendaModel;
use App\Models\SiteSetting;
use App\Models\Facility;
use App\Models\Resident;

class Home extends Component
{
    public function render()
    {
        $totalResidents  = Resident::count();
        $totalFacilities = Facility::count();
        $latestPosts     = Post::where('is_published', true)->where('type', 'berita')->latest()->take(3)->get();
        $latestPengumuman = Post::where('is_published', true)->where('type', 'pengumuman')->latest()->first();
        $staffs          = Staff::orderBy('order')->take(4)->get();
        // Mengambil foto galeri 1-2 foto per tahun, maksimal 8 foto
        $allGalleries = Gallery::whereNotNull('images')
            ->orderByRaw('COALESCE(published_date, created_at) desc')
            ->get();
            
        $galleriesByYear = [];
        foreach ($allGalleries as $g) {
            $year = date('Y', strtotime($g->published_date ?? $g->created_at));
            $galleriesByYear[$year][] = $g;
        }
        
        $selectedGalleries = collect();
        foreach ($galleriesByYear as $yearGalleries) {
            $selectedGalleries = $selectedGalleries->merge(collect($yearGalleries)->take(2));
            if ($selectedGalleries->count() >= 8) {
                $selectedGalleries = $selectedGalleries->take(8);
                break;
            }
        }
        $galleries = $selectedGalleries;
        $upcomingAgendas = AgendaModel::where('is_published', true)
            ->where('event_date', '>=', today()->subDays(7))
            ->where('event_date', '<=', today()->addDays(30))
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
                'image' => !empty($post->images) && is_array($post->images) ? $post->images[0] : null,
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
                'image' => !empty($gallery->images) && is_array($gallery->images) ? $gallery->images[0] : null,
                'link' => route('galeri'),
                'button_text' => 'Lihat Galeri',
                'badge' => 'Galeri Foto',
                'badge_color' => 'bg-orange-600/90'
            ]);
        }

        return view('livewire.home', [
            'totalResidents'  => $totalResidents,
            'totalFacilities' => $totalFacilities,
            'latestPosts'     => $latestPosts,
            'latestPengumuman'=> $latestPengumuman,
            'staffs'          => $staffs,
            'galleries'       => $galleries,
            'upcomingAgendas' => $upcomingAgendas,
            'facilities'      => $facilities,
            'settings'        => $settings,
            'heroItems'       => $heroItems,
        ])->layout('layouts.app', ['title' => 'Beranda']);
    }
}
