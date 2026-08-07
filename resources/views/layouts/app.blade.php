<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Perumahan Jayanti Residence' : 'Website Resmi Perumahan Jayanti Residence' }}</title>
    <meta name="description" content="Website resmi Perumahan Jayanti Residence, Kabupaten Tangerang. Informasi, berita, layanan warga, dan agenda kegiatan perumahan.">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="{{ asset('js/chart.js') }}"></script>
    <!-- Leaflet Maps (free, no API key) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>


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
<body class="antialiased text-slate-800 bg-slate-50 overflow-x-hidden flex flex-col min-h-screen">

        <!-- Navigation -->
        <header x-data="{ scrolled: false, mobileMenuOpen: false }"
                @scroll.window="scrolled = (window.pageYOffset > 20)"
                class="fixed z-50 transition-all duration-300 left-0 right-0 top-0 nav-glass"
                :class="scrolled ? 'py-2 shadow-sm' : 'py-2.5'">
            <nav class="w-full px-4 sm:px-6 lg:px-10 flex items-center justify-between">
                <!-- Logo & Brand -->
                <div class="flex items-center gap-2.5">
                    <img src="{{ asset('images/logo-transparent.png') }}" alt="Logo Jayanti Residence" class="h-12 sm:h-14 w-auto object-contain">
                    <div class="text-slate-800 mt-0.5">
                        <a href="/" class="text-base sm:text-lg font-bold leading-none block tracking-tight hover:text-emerald-600 transition-colors" wire:navigate>
                            Perumahan Jayanti Residence
                        </a>
                        <span class="text-[10px] sm:text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Kab. Tangerang</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden xl:flex items-center gap-1 justify-center flex-wrap">
                    <a href="/" wire:navigate
                       class="whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs('home') ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                        Beranda
                    </a>

                    <!-- Tentang Kami -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs(['profil', 'pengurus']) ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                            Tentang Kami
                            <svg class="w-3.5 h-3.5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-full left-0 mt-1 min-w-[200px] bg-white border border-slate-100 shadow-xl rounded-xl py-2 z-50" style="display: none;">
                            <a href="/profil" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Profil Perumahan</a>
                            <a href="/pengurus" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Struktur Pengurus</a>
                        </div>
                    </div>

                    <!-- DKM Musholla -->
                    <a href="/dkm" wire:navigate
                       class="whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs('dkm') ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                        DKM Al-Muqimin
                    </a>

                    <!-- Posyandu -->
                    <a href="/posyandu" wire:navigate
                       class="whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs('posyandu') ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                        Posyandu Tulip 1
                    </a>

                    <!-- Karang Taruna -->
                    <a href="/karang-taruna" wire:navigate
                       class="whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs('karang-taruna') ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                        Karang Taruna
                    </a>

                    <!-- UMKM -->
                    <a href="/umkm" wire:navigate
                       class="whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs('umkm') ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                        UMKM Warga
                    </a>

                    <!-- Layanan & Keuangan -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs(['layanan', 'keamanan', 'iuran-rw', 'iuran-ruko']) ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                            Layanan Warga
                            <svg class="w-3.5 h-3.5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-full left-0 mt-1 min-w-[200px] bg-white border border-slate-100 shadow-xl rounded-xl py-2 z-50" style="display: none;">
                            <a href="/layanan" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Layanan & Pengaduan</a>
                            <a href="/keamanan" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Keamanan & Darurat</a>
                            <div class="border-t border-slate-100 my-1"></div>
                            <a href="/iuran-rw" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Info Iuran Warga</a>
                            <a href="/iuran-ruko" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Info Iuran Ruko</a>
                            <a href="/iuran-k3" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Info Iuran K3</a>
                        </div>
                    </div>

                    <!-- Publikasi -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs(['berita', 'agenda', 'galeri']) ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                            Publikasi
                            <svg class="w-3.5 h-3.5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-full left-0 mt-1 min-w-[210px] bg-white border border-slate-100 shadow-xl rounded-xl py-2 z-50" style="display: none;">
                            <a href="/berita" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Berita</a>
                            <a href="/berita?tab=pengumuman" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-orange-50 hover:text-orange-600 transition font-medium whitespace-nowrap">Pengumuman</a>
                            <div class="border-t border-slate-100 my-1"></div>
                            <a href="/agenda" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Agenda Kegiatan</a>
                            <a href="/galeri" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Galeri Foto</a>
                        </div>
                    </div>

                    <!-- Bantuan -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1 whitespace-nowrap font-medium text-[13px] px-2.5 lg:px-3 py-2 rounded-lg transition-all {{ request()->routeIs(['dokumen', 'faq', 'kontak']) ? 'text-emerald-700 font-bold bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100' }}">
                            Pusat Bantuan
                            <svg class="w-3.5 h-3.5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-full right-0 mt-1 min-w-[200px] bg-white border border-slate-100 shadow-xl rounded-xl py-2 z-50" style="display: none;">
                            <a href="/dokumen" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Download Dokumen</a>
                            <a href="/faq" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Tanya Jawab (FAQ)</a>
                            <a href="/kontak" wire:navigate class="block px-4 py-2.5 text-sm text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 transition font-medium whitespace-nowrap">Hubungi Kami</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="xl:hidden text-slate-700 p-2 rounded-lg hover:bg-slate-100 transition focus:outline-none">
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenuOpen" style="display:none;" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </nav>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="xl:hidden bg-white border-t border-slate-100 shadow-lg absolute w-full left-0 z-50" style="display: none;">
                <div class="px-4 py-4 flex flex-col space-y-1 max-h-[70vh] overflow-y-auto">
                    
                    <a href="/" class="text-slate-700 font-bold px-4 py-3 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Beranda
                    </a>

                    <!-- Tentang Kami -->
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = !expanded" class="w-full text-left text-slate-700 font-bold px-4 py-3 rounded-xl hover:bg-slate-50 flex items-center justify-between gap-2 transition focus:outline-none">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                Tentang Kami
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="expanded" class="pl-11 pr-4 py-1 space-y-1" style="display: none;">
                            <a href="/profil" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Profil Perumahan</a>
                            <a href="/pengurus" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Struktur Pengurus</a>
                        </div>
                    </div>

                    <a href="/dkm" class="text-slate-700 font-bold px-4 py-3 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        DKM Al-Muqimin
                    </a>

                    <a href="/posyandu" class="text-slate-700 font-bold px-4 py-3 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        Posyandu Tulip 1
                    </a>

                    <a href="/karang-taruna" class="text-slate-700 font-bold px-4 py-3 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        Karang Taruna
                    </a>

                    <a href="/umkm" class="text-slate-700 font-bold px-4 py-3 rounded-xl hover:bg-slate-50 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        UMKM Warga
                    </a>

                    <!-- Layanan Warga -->
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = !expanded" class="w-full text-left text-slate-700 font-bold px-4 py-3 rounded-xl hover:bg-slate-50 flex items-center justify-between gap-2 transition focus:outline-none">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                Layanan & Keuangan
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="expanded" class="pl-11 pr-4 py-1 space-y-1" style="display: none;">
                            <a href="/layanan" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Layanan & Pengaduan</a>
                            <a href="/keamanan" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Keamanan & Darurat</a>
                            <a href="/iuran-rw" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Info Iuran Warga</a>
                            <a href="/iuran-ruko" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Info Iuran Ruko</a>
                            <a href="/iuran-k3" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Info Iuran K3</a>
                        </div>
                    </div>

                    <!-- Publikasi -->
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = !expanded" class="w-full text-left text-slate-700 font-bold px-4 py-3 rounded-xl hover:bg-slate-50 flex items-center justify-between gap-2 transition focus:outline-none">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                Publikasi
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="expanded" class="pl-11 pr-4 py-1 space-y-1" style="display: none;">
                            <a href="/berita" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Berita</a>
                            <a href="/berita?tab=pengumuman" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-orange-500" wire:navigate @click="mobileMenuOpen=false">Pengumuman</a>
                            <a href="/agenda" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Agenda Kegiatan</a>
                            <a href="/galeri" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Galeri Foto</a>
                        </div>
                    </div>

                    <!-- Bantuan -->
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = !expanded" class="w-full text-left text-slate-700 font-bold px-4 py-3 rounded-xl hover:bg-slate-50 flex items-center justify-between gap-2 transition focus:outline-none">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Pusat Bantuan
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="expanded" class="pl-11 pr-4 py-1 space-y-1" style="display: none;">
                            <a href="/dokumen" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Download Dokumen</a>
                            <a href="/faq" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Tanya Jawab (FAQ)</a>
                            <a href="/kontak" class="block py-2.5 text-sm font-medium text-slate-600 hover:text-emerald-600" wire:navigate @click="mobileMenuOpen=false">Hubungi Kami</a>
                        </div>
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
                            <img src="{{ asset('images/logo-transparent.png') }}" alt="Logo" class="h-14 sm:h-16 w-auto object-contain grayscale brightness-200">
                            <div>
                                <h3 class="text-white text-lg font-bold leading-tight">Jayanti Residence</h3>
                                <span class="text-emerald-400 text-xs font-semibold">Kab. Tangerang</span>
                            </div>
                        </div>
                        <p class="text-sm text-slate-400 leading-relaxed">Membangun lingkungan yang cerdas, aman, nyaman, dan harmonis untuk seluruh warga.</p>
                        <p class="text-xs font-bold text-white mt-4 border-t border-slate-700/50 pt-4">
                            Dibuat Oleh Kelompok Kuliah Kerja Mahasiswa (KKM) 91 Desa Jayanti Universitas Bina Bangsa
                        </p>
                    </div>

                    <!-- Tentang & Publikasi -->
                    <div>
                        <h4 class="text-white font-semibold text-sm tracking-wider mb-6">Tentang & Publikasi</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="/profil" class="hover:text-emerald-400 transition-colors" wire:navigate>Profil Perumahan</a></li>
                            <li><a href="/pengurus" class="hover:text-emerald-400 transition-colors" wire:navigate>Struktur Pengurus</a></li>
                            <li><a href="/berita" class="hover:text-emerald-400 transition-colors" wire:navigate>Berita & Pengumuman</a></li>
                            <li><a href="/agenda" class="hover:text-emerald-400 transition-colors" wire:navigate>Agenda Kegiatan</a></li>
                            <li><a href="/galeri" class="hover:text-emerald-400 transition-colors" wire:navigate>Galeri Foto</a></li>
                        </ul>
                    </div>

                    <!-- Layanan Warga -->
                    <div>
                        <h4 class="text-white font-semibold text-sm tracking-wider mb-6">Layanan Warga</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="/layanan" class="hover:text-emerald-400 transition-colors" wire:navigate>Layanan & Pengaduan</a></li>
                            <li><a href="/keamanan" class="hover:text-emerald-400 transition-colors" wire:navigate>Keamanan & Darurat</a></li>
                            <li><a href="/iuran-rw" class="hover:text-emerald-400 transition-colors" wire:navigate>Info Iuran Warga</a></li>
                            <li><a href="/iuran-ruko" class="hover:text-emerald-400 transition-colors" wire:navigate>Info Iuran Ruko</a></li>
                            <li><a href="/iuran-k3" class="hover:text-emerald-400 transition-colors" wire:navigate>Info Iuran K3</a></li>
                            <li><a href="/posyandu" class="hover:text-emerald-400 transition-colors" wire:navigate>Posyandu Tulip 1</a></li>
                            <li><a href="/karang-taruna" class="hover:text-emerald-400 transition-colors" wire:navigate>Karang Taruna</a></li>
                            <li><a href="/umkm" class="hover:text-emerald-400 transition-colors" wire:navigate>UMKM Warga</a></li>
                            <li><a href="/dkm" class="hover:text-emerald-400 transition-colors" wire:navigate>DKM Al-Muqimin</a></li>
                            <li><a href="/dokumen" class="hover:text-emerald-400 transition-colors" wire:navigate>Download Dokumen</a></li>
                            <li><a href="/faq" class="hover:text-emerald-400 transition-colors" wire:navigate>Tanya Jawab (FAQ)</a></li>
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

                <div class="border-t border-slate-800 pt-8 flex justify-center items-center text-center">
                    <p class="text-xs text-slate-500">&copy; {{ date('Y') }} Perumahan Jayanti Residence. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </footer>

    @livewireScripts

    <!-- AOS Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        var aosOptions = { once: true, offset: 50, duration: 750, easing: 'ease-out-cubic' };
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
