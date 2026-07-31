<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Website Resmi Perumahan Jayanti Residence' }}</title>
    <meta name="description" content="Website resmi Perumahan Jayanti Residence, Kabupaten Tangerang. Informasi, berita, layanan warga, dan agenda kegiatan perumahan.">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        :root {
            --primary: #1a5c38;
            --primary-light: #22c55e;
            --accent: #f59e0b;
        }
        .nav-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #064e3b 0%, #0f766e 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05), 0 8px 10px -6px rgba(0,0,0,0.01);
        }
        .btn-primary {
            background-color: #059669;
            transition: all 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #047857;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(5, 150, 105, 0.2);
        }
        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="antialiased text-slate-800 bg-slate-50">
    <div class="min-h-screen flex flex-col relative">

        <!-- Navigation -->
        <header x-data="{ scrolled: false, mobileMenuOpen: false }"
                @scroll.window="scrolled = (window.pageYOffset > 20)"
                class="fixed z-50 transition-all duration-300 w-full left-0 right-0 top-0 nav-glass"
                :class="scrolled ? 'py-3 shadow-sm' : 'py-4'">
            <nav class="w-full px-4 sm:px-6 lg:px-10 flex items-center justify-between">
                <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Jayanti Residence" class="w-10 h-10 object-contain">
                    <div class="text-slate-800 mt-1">
                        <a href="/" class="text-lg font-bold leading-none block tracking-tight hover:text-emerald-600 transition-colors" wire:navigate>
                            Perumahan Jayanti Residence
                        </a>
                        <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Kab. Tangerang</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden xl:flex items-center gap-0.5 justify-center flex-wrap">
                    @php
                        $navItems = [
                            ['href' => '/', 'route' => 'home', 'label' => 'Beranda'],
                            ['href' => '/profil', 'route' => 'profil', 'label' => 'Profil'],
                            ['href' => '/pengurus', 'route' => 'pengurus', 'label' => 'Pengurus RT/RW'],
                            ['href' => '/dkm', 'route' => 'dkm', 'label' => 'DKM Masjid'],
                            ['href' => '/berita', 'route' => 'berita', 'label' => 'Berita'],
                            ['href' => '/agenda', 'route' => 'agenda', 'label' => 'Agenda'],
                            ['href' => '/galeri', 'route' => 'galeri', 'label' => 'Galeri'],
                            ['href' => '/layanan', 'route' => 'layanan', 'label' => 'Layanan'],
                            ['href' => '/keamanan', 'route' => 'keamanan', 'label' => 'Keamanan'],
                            ['href' => '/umkm', 'route' => 'umkm', 'label' => 'UMKM'],
                            ['href' => '/dokumen', 'route' => 'dokumen', 'label' => 'Dokumen'],
                            ['href' => '/faq', 'route' => 'faq', 'label' => 'FAQ'],
                            ['href' => '/kontak', 'route' => 'kontak', 'label' => 'Kontak'],
                        ];
                    @endphp
                    @foreach($navItems as $item)
                        <a href="{{ $item['href'] }}" wire:navigate
                           class="whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs($item['route']) ? 'text-emerald-700 font-bold underline underline-offset-8 decoration-[3px] decoration-emerald-500' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="xl:hidden text-slate-700 p-2 rounded-lg hover:bg-slate-100 transition">
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </nav>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="xl:hidden bg-white border-t border-slate-100 shadow-lg absolute w-full left-0">
                <div class="px-4 py-4 flex flex-col space-y-1 max-h-[70vh] overflow-y-auto">
                    <a href="/" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Beranda
                    </a>
                    <a href="/profil" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        Profil Perumahan
                    </a>
                    <a href="/pengurus" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        Struktur Pengurus
                    </a>
                    <a href="/dkm" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        DKM Masjid
                    </a>
                    <a href="/berita" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        Berita & Pengumuman
                    </a>
                    <a href="/agenda" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Agenda Kegiatan
                    </a>
                    <a href="/galeri" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Galeri
                    </a>
                    <div class="mt-1 border-t border-slate-100 pt-1">
                        <a href="/layanan" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            Layanan Warga
                        </a>
                        <a href="/keamanan" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            Keamanan & Darurat
                        </a>
                        <a href="/umkm" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            UMKM Warga
                        </a>
                        <a href="/dokumen" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Download Dokumen
                        </a>
                        <a href="/faq" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            FAQ
                        </a>
                        <a href="/kontak" class="text-slate-700 font-medium px-4 py-2.5 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            Kontak
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Floating Widgets -->
        <!-- Visitor Counter -->
        <div class="fixed bottom-5 left-4 sm:left-5 z-40">
            <livewire:visitor-counter />
        </div>

        <!-- Pengaduan / Report Button -->
        <div class="fixed bottom-5 right-4 sm:right-5 z-40">
            <a href="/pengaduan" wire:navigate
               class="bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 sm:px-4 sm:py-2.5 rounded-xl shadow-md flex items-center gap-1.5 sm:gap-2 transition-all hover:-translate-y-1">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                <span class="font-semibold text-xs sm:text-sm">Pengaduan</span>
            </a>
        </div>

        <!-- Footer -->
        <footer class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    <!-- Brand -->
                    <div class="md:col-span-1">
                        <div class="flex items-center gap-3 mb-5">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain grayscale brightness-200">
                            <div>
                                <h3 class="text-white text-lg font-bold leading-tight">Jayanti Residence</h3>
                                <span class="text-emerald-400 text-xs font-semibold">Kab. Tangerang</span>
                            </div>
                        </div>
                        <p class="text-sm text-slate-400 leading-relaxed">Membangun lingkungan yang cerdas, aman, nyaman, dan harmonis untuk seluruh warga.</p>
                    </div>

                    <!-- Menu -->
                    <div>
                        <h4 class="text-white font-semibold text-sm tracking-wider mb-6">Navigasi</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="/profil" class="hover:text-emerald-400 transition-colors" wire:navigate>Profil Perumahan</a></li>
                            <li><a href="/berita" class="hover:text-emerald-400 transition-colors" wire:navigate>Berita & Pengumuman</a></li>
                            <li><a href="/agenda" class="hover:text-emerald-400 transition-colors" wire:navigate>Agenda Kegiatan</a></li>
                            <li><a href="/galeri" class="hover:text-emerald-400 transition-colors" wire:navigate>Galeri</a></li>
                        </ul>
                    </div>

                    <!-- Layanan -->
                    <div>
                        <h4 class="text-white font-semibold text-sm tracking-wider mb-6">Layanan</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="/layanan" class="hover:text-emerald-400 transition-colors" wire:navigate>Layanan Warga</a></li>
                            <li><a href="/keamanan" class="hover:text-emerald-400 transition-colors" wire:navigate>Keamanan & Darurat</a></li>
                            <li><a href="/umkm" class="hover:text-emerald-400 transition-colors" wire:navigate>UMKM Warga</a></li>
                            <li><a href="/dokumen" class="hover:text-emerald-400 transition-colors" wire:navigate>Download Dokumen</a></li>
                            <li><a href="/faq" class="hover:text-emerald-400 transition-colors" wire:navigate>FAQ</a></li>
                        </ul>
                    </div>

                    <!-- Kontak -->
                    <div>
                        <h4 class="text-white font-semibold text-sm tracking-wider mb-6">Kontak</h4>
                        <ul class="space-y-4 text-sm">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <a href="https://maps.google.com/?q=-6.2198758,106.3852812" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-emerald-400 transition-colors leading-relaxed">Sekretariat Pengurus Perumahan Jayanti Residence Blok E, Jl. Jayanti Residence RW 09 Desa Jayanti, Kab. Tangerang, Banten</a>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <a href="mailto:admin@jayantiresidence.co.id" class="text-slate-400 hover:text-emerald-400 transition-colors">admin@jayantiresidence.co.id</a>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                <a href="https://wa.me/628xxxxxxxxxx" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-emerald-400 transition-colors">08xxxxxxxxxx</a>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span class="text-slate-400">Senin – Jumat<br>08.00 – 16.00 WIB</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-slate-800 pt-8 text-center md:text-left flex flex-col md:flex-row justify-between items-center">
                    <p class="text-xs text-slate-500">&copy; {{ date('Y') }} Perumahan Jayanti Residence. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </footer>
    </div>

    @livewireScripts

    <!-- AOS Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        const aosOptions = { once: true, offset: 50, duration: 750, easing: 'ease-out-cubic' };
        AOS.init(aosOptions);
        
        document.addEventListener('livewire:navigated', () => {
            document.querySelectorAll('.aos-init').forEach(el => el.classList.remove('aos-init','aos-animate'));
            AOS.init(aosOptions);
            setTimeout(() => AOS.refreshHard(), 100);
        });

        // Mencegah elemen menghilang saat auto-update (wire:poll)
        document.addEventListener('livewire:initialized', () => {
            Livewire.hook('morph.updating', ({ el, toEl }) => {
                if (el instanceof HTMLElement && toEl instanceof HTMLElement) {
                    if (el.hasAttribute('data-aos') && el.classList.contains('aos-animate')) {
                        toEl.classList.add('aos-init', 'aos-animate');
                    }
                }
            });

            Livewire.hook('commit', ({ succeed }) => {
                succeed(() => {
                    setTimeout(() => AOS.refreshHard(), 50);
                });
            });
        });
    </script>
</body>
</html>
