<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Profil;
use App\Livewire\Berita;
use App\Livewire\Galeri;
use App\Livewire\Infografis;
use App\Livewire\Listing;
use App\Livewire\Idm;
use App\Livewire\Belanja;
use App\Livewire\Ppid;

Route::get('/', Home::class)->name('home');
Route::get('/profil', Profil::class)->name('profil');
Route::get('/berita', Berita::class)->name('berita');
Route::get('/galeri', Galeri::class)->name('galeri');
Route::get('/infografis', Infografis::class)->name('infografis');
Route::get('/listing', Listing::class)->name('listing');
Route::get('/idm', Idm::class)->name('idm');
Route::get('/belanja', Belanja::class)->name('belanja');
Route::get('/ppid', Ppid::class)->name('ppid');
