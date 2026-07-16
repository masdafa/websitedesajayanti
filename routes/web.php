<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Profil;
use App\Livewire\Berita;
use App\Livewire\Galeri;

Route::get('/', Home::class)->name('home');
Route::get('/profil', Profil::class)->name('profil');
Route::get('/berita', Berita::class)->name('berita');
Route::get('/galeri', Galeri::class)->name('galeri');
