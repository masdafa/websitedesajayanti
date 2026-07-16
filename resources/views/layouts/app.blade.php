<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Website Desa Jayanti' }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50" style="font-family: 'Inter', sans-serif;">
    <div class="min-h-screen flex flex-col relative">
        @php
            $isHome = request()->routeIs('home');
        @endphp

        <!-- Navigation -->
        <header x-data="{ scrolled: false, mobileMenuOpen: false }" 
                @scroll.window="scrolled = (window.pageYOffset > 20)"
                class="fixed w-full top-0 z-50 transition-all duration-300"
                :class="{ 'bg-emerald-900/95 backdrop-blur-md shadow-lg py-3': scrolled, 'bg-transparent py-5': !scrolled }">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <!-- Placeholder Logo Kab Tangerang -->
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-11 h-11 object-contain drop-shadow-md">
                    <div class="text-white drop-shadow-md">
                        <a href="/" class="text-xl font-bold leading-none block tracking-wide" wire:navigate>Desa Jayanti</a>
                        <span class="text-xs text-gray-100 font-medium">Kabupaten Tangerang</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex gap-1 xl:gap-2 items-center" x-data="{ layananOpen: false }">
                    <a href="/" class="text-white hover:text-emerald-200 font-semibold text-sm px-3 py-2 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('home') ? 'bg-white/20' : '' }}" wire:navigate>Home</a>
                    <a href="/profil" class="text-white hover:text-emerald-200 font-semibold text-sm px-3 py-2 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('profil') ? 'bg-white/20' : '' }}" wire:navigate>Profil</a>
                    <a href="/berita" class="text-white hover:text-emerald-200 font-semibold text-sm px-3 py-2 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('berita') ? 'bg-white/20' : '' }}" wire:navigate>Berita</a>
                    <a href="/galeri" class="text-white hover:text-emerald-200 font-semibold text-sm px-3 py-2 rounded-lg hover:bg-white/10 transition {{ request()->routeIs('galeri') ? 'bg-white/20' : '' }}" wire:navigate>Galeri</a>

                    <!-- Layanan Dropdown -->
                    <div class="relative" @mouseenter="layananOpen = true" @mouseleave="layananOpen = false">
                        <button class="flex items-center gap-1 text-white hover:text-emerald-200 font-semibold text-sm px-3 py-2 rounded-lg hover:bg-white/10 transition {{ request()->routeIs(['infografis','listing','idm','belanja','ppid']) ? 'bg-white/20' : '' }}">
                            Layanan
                            <svg class="w-4 h-4 transition-transform" :class="layananOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="layananOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute top-full right-0 mt-1 w-52 bg-white rounded-xl shadow-2xl border border-gray-100 py-2 z-50">
                            <a href="/infografis" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 font-medium transition {{ request()->routeIs('infografis') ? 'text-emerald-700 bg-emerald-50' : '' }}" wire:navigate>
                                <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                </span>
                                Infografis
                            </a>
                            <a href="/listing" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 font-medium transition {{ request()->routeIs('listing') ? 'text-emerald-700 bg-emerald-50' : '' }}" wire:navigate>
                                <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </span>
                                Listing Desa
                            </a>
                            <a href="/idm" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 font-medium transition {{ request()->routeIs('idm') ? 'text-emerald-700 bg-emerald-50' : '' }}" wire:navigate>
                                <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                </span>
                                IDM
                            </a>
                            <a href="/belanja" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 font-medium transition {{ request()->routeIs('belanja') ? 'text-emerald-700 bg-emerald-50' : '' }}" wire:navigate>
                                <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </span>
                                Belanja Desa
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="/ppid" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 font-medium transition {{ request()->routeIs('ppid') ? 'text-emerald-700 bg-emerald-50' : '' }}" wire:navigate>
                                <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </span>
                                PPID
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white hover:text-emerald-200 focus:outline-none drop-shadow">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </nav>
            
            <!-- Mobile Menu Dropdown -->
            <div x-show="mobileMenuOpen" x-transition class="lg:hidden absolute top-full left-0 w-full bg-emerald-900 shadow-xl border-t border-emerald-800">
                <div class="px-4 py-4 flex flex-col space-y-1">
                    <a href="/" class="text-white font-semibold px-3 py-2.5 rounded-lg hover:bg-white/10" wire:navigate>🏠 Home</a>
                    <a href="/profil" class="text-white font-semibold px-3 py-2.5 rounded-lg hover:bg-white/10" wire:navigate>🏘️ Profil Desa</a>
                    <a href="/berita" class="text-white font-semibold px-3 py-2.5 rounded-lg hover:bg-white/10" wire:navigate>📰 Berita</a>
                    <a href="/galeri" class="text-white font-semibold px-3 py-2.5 rounded-lg hover:bg-white/10" wire:navigate>🖼️ Galeri</a>
                    <div class="border-t border-emerald-800 pt-2 mt-1">
                        <p class="text-emerald-400 text-xs font-bold uppercase tracking-wider px-3 pb-1">Layanan</p>
                        <a href="/infografis" class="text-white font-semibold px-3 py-2.5 rounded-lg hover:bg-white/10 flex items-center gap-2" wire:navigate>📊 Infografis</a>
                        <a href="/listing" class="text-white font-semibold px-3 py-2.5 rounded-lg hover:bg-white/10 flex items-center gap-2" wire:navigate>🗺️ Listing Desa</a>
                        <a href="/idm" class="text-white font-semibold px-3 py-2.5 rounded-lg hover:bg-white/10 flex items-center gap-2" wire:navigate>📈 IDM</a>
                        <a href="/belanja" class="text-white font-semibold px-3 py-2.5 rounded-lg hover:bg-white/10 flex items-center gap-2" wire:navigate>🛒 Belanja Desa</a>
                        <a href="/ppid" class="text-white font-semibold px-3 py-2.5 rounded-lg hover:bg-white/10 flex items-center gap-2" wire:navigate>📄 PPID</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Floating Widgets -->
        <!-- Visitor Counter (Bottom Left) -->
        <div class="fixed bottom-6 left-6 z-40 bg-[#c6e6b4]/95 backdrop-blur-md border border-white/50 text-emerald-900 px-4 py-3 rounded-2xl shadow-xl flex items-center gap-3">
            <div class="bg-white/50 p-2 rounded-lg">
                <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div>
                <div class="text-[10px] font-bold uppercase tracking-wider text-emerald-700">Kunjungan</div>
                <div class="font-extrabold text-xl leading-none mt-0.5 text-white drop-shadow">8 <span class="text-xs font-semibold text-white ml-1">Hari Ini</span></div>
            </div>
        </div>

        <!-- Buttons (Bottom Right) -->
        <div class="fixed bottom-6 right-6 z-40 flex items-center gap-3">
            <!-- Accessibility Button -->
            <button class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-xl transition-all hover:scale-105 border border-white/20">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm9 7h-6v13h-2v-6h-2v6H9V9H3V7h18v2z"/></svg>
            </button>
            
            <!-- Pengaduan Button -->
            <a href="#" class="bg-[#f39c9c] hover:bg-red-400 text-white px-5 py-3 rounded-2xl shadow-xl flex items-center gap-2 transition-all hover:scale-105 border border-white/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-bold text-sm tracking-wide">Pengaduan</span>
            </a>
        </div>

        <!-- Footer -->
        <footer class="bg-emerald-950 text-emerald-100 py-12 relative z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-white text-xl font-bold mb-4">Desa Jayanti</h3>
                    <p class="text-sm text-emerald-200">Website resmi Desa Jayanti. Mewujudkan desa mandiri, sejahtera, dan berbudaya.</p>
                </div>
                <div>
                    <h3 class="text-white text-lg font-bold mb-4">Tautan</h3>
                    <ul class="space-y-2 text-sm text-emerald-200">
                        <li><a href="/profil" class="hover:text-white transition" wire:navigate>Profil Desa</a></li>
                        <li><a href="/berita" class="hover:text-white transition" wire:navigate>Berita & Artikel</a></li>
                        <li><a href="/galeri" class="hover:text-white transition" wire:navigate>Galeri</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-sm text-emerald-200">
                        <li>Jl. Raya Desa Jayanti No. 1</li>
                        <li>Kecamatan Jayanti, Kabupaten Tangerang</li>
                        <li>Email: kontak@jayanti.desa.id</li>
                    </ul>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pt-8 border-t border-emerald-800/50 text-sm text-center text-emerald-400">
                &copy; {{ date('Y') }} Pemerintah Desa Jayanti. All rights reserved.
            </div>
        </footer>
    </div>
    
    @livewireScripts
</body>
</html>
