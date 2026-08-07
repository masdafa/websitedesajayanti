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
use App\Livewire\Pengurus;
use App\Livewire\Dkm;
use App\Livewire\PengaduanForm;
use App\Livewire\LetterRequestForm;
use App\Livewire\ActivityRegistrationForm;
use App\Livewire\GuestBookForm;
use App\Livewire\IuranInfoView;
use App\Livewire\IuranRw;
use App\Livewire\IuranRuko;
use App\Livewire\IuranK3;
use App\Livewire\Posyandu;
// Public routes
Route::get('/', Home::class)->name('home');
Route::get('/profil', Profil::class)->name('profil');
Route::get('/berita', Berita::class)->name('berita');
Route::get('/berita/{slug}', BeritaDetail::class)->name('berita.detail');
Route::get('/galeri', Galeri::class)->name('galeri');
Route::get('/agenda', Agenda::class)->name('agenda');
Route::get('/layanan', Layanan::class)->name('layanan');
Route::get('/keamanan', Keamanan::class)->name('keamanan');
Route::get('/pengaduan', PengaduanForm::class)->name('pengaduan');
Route::get('/dokumen', Dokumen::class)->name('dokumen');
Route::get('/kontak', Kontak::class)->name('kontak');
Route::get('/faq', Faq::class)->name('faq');
Route::get('/umkm', Umkm::class)->name('umkm');
Route::get('/pengurus', Pengurus::class)->name('pengurus');
Route::get('/dkm', Dkm::class)->name('dkm');

Route::get('/layanan/surat-pengantar', LetterRequestForm::class)->name('layanan.surat');
Route::get('/layanan/pendaftaran-kegiatan', ActivityRegistrationForm::class)->name('layanan.kegiatan');
Route::get('/layanan/buku-tamu', GuestBookForm::class)->name('layanan.tamu');
Route::get('/layanan/iuran-warga', IuranInfoView::class)->name('layanan.iuran');
Route::get('/iuran-rw', IuranRw::class)->name('iuran-rw');
Route::get('/iuran-ruko', IuranRuko::class)->name('iuran-ruko');
Route::get('/iuran-k3', IuranK3::class)->name('iuran-k3');
Route::get('/posyandu', App\Livewire\Posyandu::class)->name('posyandu');
Route::get('/karang-taruna', App\Livewire\KarangTaruna::class)->name('karang-taruna');
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
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\RoutineActivityController;
use App\Http\Controllers\Admin\SiskamlingController;
use App\Http\Controllers\Admin\ServiceInfoController;
use App\Http\Controllers\Admin\DkmStaffController;
use App\Http\Controllers\Admin\LetterRequestController;
use App\Http\Controllers\Admin\ActivityRegistrationController;
use App\Http\Controllers\Admin\GuestBookController;
use App\Http\Controllers\Admin\IuranInfoController;
use App\Http\Controllers\Admin\FinancialReportController;
use App\Http\Controllers\Admin\RukoFinancialReportController;
use App\Http\Controllers\Admin\K3DepositController;
use App\Http\Controllers\Admin\K3BudgetController;
use App\Http\Controllers\Admin\PosyanduProfileController;
use App\Http\Controllers\Admin\PosyanduActivityController;
use App\Http\Controllers\Admin\PosyanduGalleryController;
use App\Http\Controllers\Admin\DkmSettingController;
use App\Http\Controllers\Admin\UserController;

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

        // Layanan Warga Tambahan
        Route::resource('letters', LetterRequestController::class)->except(['create', 'store', 'edit']);
        Route::resource('activities-reg', ActivityRegistrationController::class)->except(['create', 'store', 'edit']);
        Route::resource('guests', GuestBookController::class)->except(['create', 'store', 'edit']);
        Route::resource('iuran', IuranInfoController::class)->except(['show']);

        // User Management (Admin & Pengurus RT)
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.edit-password');
        Route::put('users/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update-password');

        // Website Settings
        Route::get('settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SiteSettingController::class, 'update'])->name('settings.update');

        // New Dynamic Content
        Route::resource('facilities', FacilityController::class)->except(['show']);
        Route::resource('routine-activities', RoutineActivityController::class)->except(['show']);
        Route::resource('siskamling', SiskamlingController::class)->except(['show']);
        Route::resource('service-infos', ServiceInfoController::class)->except(['show']);
        Route::resource('dkm-staff', DkmStaffController::class)->except(['show']);
        Route::resource('financial-reports', FinancialReportController::class)->only(['index', 'store', 'destroy']);
        Route::resource('ruko-financial-reports', RukoFinancialReportController::class)->only(['index', 'store', 'destroy']);
        Route::resource('k3-deposits', K3DepositController::class)->only(['index', 'store', 'destroy']);
        Route::resource('ruko-deposits', \App\Http\Controllers\Admin\RukoDepositController::class)->only(['store', 'destroy']);
        Route::resource('k3-budgets', K3BudgetController::class)->except(['show']);
        
        // DKM Musholla Dynamic Content
        Route::resource('dkm-activities', \App\Http\Controllers\Admin\DkmActivityController::class)->except(['show']);
        Route::resource('dkm-financial-reports', \App\Http\Controllers\Admin\DkmFinancialReportController::class)->except(['show']);
        Route::resource('dkm-galleries', \App\Http\Controllers\Admin\DkmGalleryController::class)->except(['show']);
        Route::resource('ziswaf-reports', \App\Http\Controllers\Admin\ZiswafReportController::class)->except(['show']);
        Route::resource('phbi-events', \App\Http\Controllers\Admin\PhbiEventController::class)->except(['show']);
        Route::get('dkm-settings', [DkmSettingController::class, 'edit'])->name('dkm-settings.edit');
        Route::put('dkm-settings', [DkmSettingController::class, 'update'])->name('dkm-settings.update');

        // Posyandu
        Route::get('posyandu-profile', [PosyanduProfileController::class, 'edit'])->name('posyandu-profile.edit');
        Route::put('posyandu-profile', [PosyanduProfileController::class, 'update'])->name('posyandu-profile.update');
        Route::resource('posyandu-activities', PosyanduActivityController::class)->except(['show']);
        Route::resource('posyandu-galleries', PosyanduGalleryController::class)->except(['show']);

        // Data Warga
        Route::post('residents/import', [\App\Http\Controllers\Admin\ResidentController::class, 'import'])->name('residents.import');
        Route::resource('residents', \App\Http\Controllers\Admin\ResidentController::class)->except(['show']);
        
        // Karang Taruna
        Route::get('karang-taruna-profile', [\App\Http\Controllers\Admin\KarangTarunaProfileController::class, 'edit'])->name('karang-taruna-profile.edit');
        Route::put('karang-taruna-profile', [\App\Http\Controllers\Admin\KarangTarunaProfileController::class, 'update'])->name('karang-taruna-profile.update');
        Route::resource('karang-taruna-staff', \App\Http\Controllers\Admin\KarangTarunaStaffController::class)->except(['show']);
        Route::resource('karang-taruna-activities', \App\Http\Controllers\Admin\KarangTarunaActivityController::class)->except(['show']);
        Route::resource('karang-taruna-galleries', \App\Http\Controllers\Admin\KarangTarunaGalleryController::class)->except(['show']);
        Route::delete('karang-taruna-galleries/{karang_taruna_gallery}/image', [\App\Http\Controllers\Admin\KarangTarunaGalleryController::class, 'deleteImage'])->name('karang-taruna-galleries.delete-image');
    });
});
