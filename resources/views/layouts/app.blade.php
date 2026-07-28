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
            background: rgba(20, 60, 35, 0.97);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #0f3d21 0%, #1a5c38 50%, #0f4c29 100%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.18);
        }
        .btn-primary {
            background: linear-gradient(135deg, #16a34a, #15803d);
            transition: all 0.2s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #15803d, #166534);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(22, 163, 74, 0.3);
        }
        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #16a34a; border-radius: 4px; }
    </style>
</head>
<body class="antialiased text-gray-900 bg-gray-50">
    <div class="min-h-screen flex flex-col relative">
        @php
            $isHome = request()->routeIs('home');
        @endphp

        <!-- Navigation -->
        <header x-data="{ scrolled: false, mobileMenuOpen: false }"
                @scroll.window="scrolled = (window.pageYOffset > 30)"
                class="fixed z-50 transition-all duration-500 left-0 right-0 mx-auto"
                :class="scrolled ? 'w-full top-0 nav-glass shadow-2xl py-4' : 'w-[calc(100%-1.5rem)] max-w-7xl top-4 lg:top-5 rounded-2xl shadow-xl py-4 ' + ($isHome ? 'bg-black/20 backdrop-blur-md border border-white/10' : 'nav-glass')">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Jayanti Residence" class="w-10 h-10 object-contain drop-shadow-lg">
                    <div class="text-white">
                        <a href="/" class="text-lg font-black leading-none block tracking-tight hover:text-green-300 transition-colors" wire:navigate>
                            Jayanti Residence
                        </a>
                        <span class="text-xs text-green-300 font-semibold">Kab. Tangerang</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden xl:flex items-center gap-0.5 justify-center flex-wrap">
                    @php
                        $navItems = [
                            ['href' => '/', 'route' => 'home', 'label' => 'Beranda'],
                            ['href' => '/profil', 'route' => 'profil', 'label' => 'Profil'],
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
                           class="whitespace-nowrap text-white/90 hover:text-white font-semibold text-[13px] px-2 lg:px-2.5 py-2 rounded-lg hover:bg-white/10 transition-all {{ request()->routeIs($item['route']) ? 'bg-white/20 text-white' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="xl:hidden text-white p-2 rounded-lg hover:bg-white/10 transition">
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </nav>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="xl:hidden nav-glass border-t border-white/10">
                <div class="px-4 py-4 flex flex-col space-y-1 max-h-[70vh] overflow-y-auto">
                    <a href="/" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Beranda
                    </a>
                    <a href="/profil" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        Profil Perumahan
                    </a>
                    <a href="/berita" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        Berita & Pengumuman
                    </a>
                    <a href="/agenda" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Agenda Kegiatan
                    </a>
                    <a href="/galeri" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                        <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Galeri
                    </a>
                    <div class="mt-1">
                        <a href="/layanan" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            Layanan Warga
                        </a>
                        <a href="/keamanan" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            Keamanan & Darurat
                        </a>
                        <a href="/umkm" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            UMKM Warga
                        </a>
                        <a href="/dokumen" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Download Dokumen
                        </a>
                        <a href="/faq" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            FAQ
                        </a>
                        <a href="/kontak" class="text-white font-semibold px-4 py-2.5 rounded-xl hover:bg-white/10 flex items-center gap-2 transition" wire:navigate @click="mobileMenuOpen=false">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
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
            <div class="bg-gradient-to-br from-green-600 to-green-800 text-white px-4 py-2.5 rounded-2xl shadow-xl flex items-center gap-2.5 border border-green-500/50">
                <div class="bg-white/20 p-1.5 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <div>
                    <div class="text-[9px] font-bold uppercase tracking-widest text-green-200">Kunjungan Hari Ini</div>
                    <div class="font-black text-lg leading-none mt-0.5">{{ \App\Models\Visitor::whereDate('date', today())->count() }}</div>
                </div>
            </div>
        </div>

        <!-- Pengaduan / Report Button -->
        <div class="fixed bottom-5 right-4 sm:right-5 z-40">
            <a href="/layanan" wire:navigate
               class="bg-gradient-to-br from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white px-4 py-3 rounded-2xl shadow-xl flex items-center gap-2 transition-all hover:scale-105 border border-red-400/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                <span class="font-bold text-sm">Pengaduan</span>
            </a>
        </div>

        <!-- Footer -->
        <footer class="bg-gradient-to-b from-green-950 to-gray-950 text-green-100 pt-14 pb-6 relative z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                    <!-- Brand -->
                    <div class="md:col-span-1">
                        <div class="flex items-center gap-3 mb-4">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain">
                            <div>
                                <h3 class="text-white text-lg font-black leading-tight">Jayanti Residence</h3>
                                <span class="text-green-400 text-xs font-semibold">Kab. Tangerang</span>
                            </div>
                        </div>
                        <p class="text-sm text-green-300 leading-relaxed">"Hunian Nyaman, Aman, dan Harmonis untuk Seluruh Warga"</p>
                    </div>

                    <!-- Menu -->
                    <div>
                        <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-5">Navigasi</h4>
                        <ul class="space-y-2.5 text-sm text-green-300">
                            <li><a href="/profil" class="hover:text-white hover:translate-x-1 inline-flex transition-all" wire:navigate>Profil Perumahan</a></li>
                            <li><a href="/berita" class="hover:text-white hover:translate-x-1 inline-flex transition-all" wire:navigate>Berita & Pengumuman</a></li>
                            <li><a href="/agenda" class="hover:text-white hover:translate-x-1 inline-flex transition-all" wire:navigate>Agenda Kegiatan</a></li>
                            <li><a href="/galeri" class="hover:text-white hover:translate-x-1 inline-flex transition-all" wire:navigate>Galeri</a></li>
                        </ul>
                    </div>

                    <!-- Layanan -->
                    <div>
                        <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-5">Layanan</h4>
                        <ul class="space-y-2.5 text-sm text-green-300">
                            <li><a href="/layanan" class="hover:text-white hover:translate-x-1 inline-flex transition-all" wire:navigate>Layanan Warga</a></li>
                            <li><a href="/keamanan" class="hover:text-white hover:translate-x-1 inline-flex transition-all" wire:navigate>Keamanan & Darurat</a></li>
                            <li><a href="/umkm" class="hover:text-white hover:translate-x-1 inline-flex transition-all" wire:navigate>UMKM Warga</a></li>
                            <li><a href="/dokumen" class="hover:text-white hover:translate-x-1 inline-flex transition-all" wire:navigate>Download Dokumen</a></li>
                            <li><a href="/faq" class="hover:text-white hover:translate-x-1 inline-flex transition-all" wire:navigate>FAQ</a></li>
                        </ul>
                    </div>

                    <!-- Kontak -->
                    <div>
                        <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-5">Kontak</h4>
                        <ul class="space-y-3 text-sm text-green-300">
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Jl. Raya Jayanti, Kecamatan Jayanti, Kab. Tangerang
                            </li>
                            <li class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                info@jayantiresidence.id
                            </li>
                            <li class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                (021) 5955-XXXX
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-green-900/50 pt-6 text-center">
                    <p class="text-sm text-green-500">&copy; {{ date('Y') }} Perumahan Jayanti Residence. Semua hak dilindungi.</p>
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
    </script>
</body>
</html>
