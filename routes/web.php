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

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\InfographicController;
use App\Http\Controllers\Admin\IdmDataController;
use App\Http\Controllers\Admin\PublicDocumentController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login']);
    });

    Route::middleware('admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::resource('posts', PostController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('products', ProductController::class);
        Route::resource('listings', ListingController::class);
        Route::resource('infographics', InfographicController::class);
        Route::resource('idm', IdmDataController::class);
        Route::resource('documents', PublicDocumentController::class);
    });
});
