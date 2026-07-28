<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Profil;
use App\Livewire\Berita;
use App\Livewire\BeritaDetail;
use App\Livewire\Galeri;
use App\Livewire\Agenda;
use App\Livewire\Layanan;
use App\Livewire\Keamanan;
use App\Livewire\Dokumen;
use App\Livewire\Kontak;
use App\Livewire\Faq;
use App\Livewire\Umkm;

// Public routes
Route::get('/', Home::class)->name('home');
Route::get('/profil', Profil::class)->name('profil');
Route::get('/berita', Berita::class)->name('berita');
Route::get('/berita/{slug}', BeritaDetail::class)->name('berita.detail');
Route::get('/galeri', Galeri::class)->name('galeri');
Route::get('/agenda', Agenda::class)->name('agenda');
Route::get('/layanan', Layanan::class)->name('layanan');
Route::get('/keamanan', Keamanan::class)->name('keamanan');
Route::get('/dokumen', Dokumen::class)->name('dokumen');
Route::get('/kontak', Kontak::class)->name('kontak');
Route::get('/faq', Faq::class)->name('faq');
Route::get('/umkm', Umkm::class)->name('umkm');

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ResidentReportController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login']);
    });

    Route::middleware('admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('posts', PostController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('products', ProductController::class);
        Route::resource('agendas', AgendaController::class);
        Route::resource('documents', DocumentController::class);
        Route::resource('faqs', FaqController::class);

        // Pengaduan (reports)
        Route::get('reports', [ResidentReportController::class, 'index'])->name('reports.index');
        Route::get('reports/{report}', [ResidentReportController::class, 'show'])->name('reports.show');
        Route::put('reports/{report}', [ResidentReportController::class, 'update'])->name('reports.update');
        Route::delete('reports/{report}', [ResidentReportController::class, 'destroy'])->name('reports.destroy');
    });
});
