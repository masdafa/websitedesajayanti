<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }} — Jayanti Residence</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { font-family: 'Inter', sans-serif; }
        .sidebar-link { transition: all .18s ease; }
        .sidebar-link:hover, .sidebar-link.active {
            background: rgba(255,255,255,0.12);
            color: #fff;
            padding-left: 1.25rem;
        }
        .sidebar-link.active { border-left: 3px solid #6ee7b7; font-weight: 700; }
        .fade-in { animation: fadeIn .3s ease; }
        @keyframes fadeIn { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:translateY(0); } }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gradient-to-b from-emerald-900 via-emerald-800 to-emerald-900 flex flex-col fixed top-0 left-0 h-full z-30 shadow-2xl transition-transform duration-300 lg:translate-x-0" style="-webkit-transform:translateX(-100%); transform:translateX(-100%);">
        <!-- Logo -->
        <div class="flex items-center gap-3 px-6 py-5 border-b border-emerald-700/50">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            </div>
            <div>
                <div class="text-white font-bold text-sm leading-tight">Admin Panel</div>
                <div class="text-emerald-300 text-xs">Jayanti Residence</div>
            </div>
        </div>

        <!-- Nav -->
        <nav id="sidebar-nav" class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <p class="text-emerald-400 text-xs font-bold uppercase tracking-wider px-3 mb-3">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.posts.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                Berita & Artikel
            </a>

            <a href="{{ route('admin.galleries.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Galeri Foto
            </a>

            <a href="{{ route('admin.staff.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Pengurus
            </a>

            <p class="text-emerald-400 text-xs font-bold uppercase tracking-wider px-3 mt-5 mb-3">Konten & Layanan</p>

            <a href="{{ route('admin.agendas.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.agendas.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Agenda Kegiatan
            </a>

            <a href="{{ route('admin.products.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                UMKM Warga
            </a>

            <a href="{{ route('admin.documents.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.documents.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Dokumen
            </a>

            <a href="{{ route('admin.faqs.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                FAQ
            </a>

            <p class="text-emerald-400 text-xs font-bold uppercase tracking-wider px-3 mt-5 mb-3">Layanan & Pengaduan</p>

            <a href="{{ route('admin.reports.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                Pengaduan Warga
            </a>

            <a href="{{ route('admin.letters.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.letters.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Surat Pengantar
            </a>

            <a href="{{ route('admin.activities-reg.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.activities-reg.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Pendaftaran Kegiatan
            </a>

            <a href="{{ route('admin.guests.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.guests.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Buku Tamu Digital
            </a>

            <a href="{{ route('admin.iuran.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.iuran.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Informasi Iuran
            </a>

            <p class="text-emerald-400 text-xs font-bold uppercase tracking-wider px-3 mt-5 mb-3">Konten Dinamis</p>

            <a href="{{ route('admin.facilities.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                Fasilitas
            </a>

            <a href="{{ route('admin.siskamling.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.siskamling.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Jadwal Siskamling
            </a>

            <a href="{{ route('admin.routine-activities.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.routine-activities.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Kegiatan Rutin
            </a>

            <a href="{{ route('admin.service-infos.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.service-infos.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Layanan Warga
            </a>

            <a href="{{ route('admin.dkm-staff.index') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.dkm-staff.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Pengurus DKM
            </a>

            <p class="text-emerald-400 text-xs font-bold uppercase tracking-wider px-3 mt-5 mb-3">Pengaturan</p>

            <a href="{{ route('admin.settings.edit') }}" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 text-sm {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Pengaturan Website
            </a>

        </nav>

        <!-- Footer Sidebar -->
        <div class="px-4 py-4 border-t border-emerald-700/50">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-8 h-8 rounded-full bg-emerald-600 flex items-center justify-center text-white font-bold text-xs">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-white text-xs font-semibold truncate">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="text-emerald-400 text-xs truncate">{{ auth()->user()->email ?? '' }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-emerald-200 hover:bg-white/10 hover:text-white text-xs transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Overlay mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-20 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Main content -->
    <div class="flex-1 flex flex-col lg:ml-64 min-h-screen">

        <!-- Topbar -->
        <header class="bg-white border-b border-gray-200 px-4 sm:px-6 py-4 flex items-center justify-between sticky top-0 z-10 shadow-sm">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div>
                    <h1 class="text-lg font-bold text-gray-900">{{ $title ?? 'Dashboard' }}</h1>
                    @isset($breadcrumb)
                        <p class="text-xs text-gray-500 mt-0.5">{{ $breadcrumb }}</p>
                    @endisset
                </div>
            </div>
            <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-2 text-sm text-emerald-700 hover:text-emerald-900 font-medium transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Lihat Website
            </a>
        </header>

        <!-- Content -->
        <main class="flex-1 p-4 sm:p-6 fade-in">
            <!-- Flash messages -->
            @if(session('success'))
                <div id="flash-success" class="mb-4 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl shadow-sm transition-all duration-500">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-medium flex-1">{{ session('success') }}</span>
                    <button onclick="document.getElementById('flash-success').remove()" class="ml-auto text-emerald-500 hover:text-emerald-700 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            @endif
            @if(session('error'))
                <div id="flash-error" class="mb-4 flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl shadow-sm transition-all duration-500">
                    <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-medium flex-1">{{ session('error') }}</span>
                    <button onclick="document.getElementById('flash-error').remove()" class="ml-auto text-red-500 hover:text-red-700 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const isOpen = sidebar.style.transform === 'translateX(0px)' || sidebar.style.transform === 'translateX(0%)';
        sidebar.style.transform = isOpen ? 'translateX(-100%)' : 'translateX(0%)';
        overlay.classList.toggle('hidden', isOpen);
    }

    // On lg screens, always show sidebar
    function handleResize() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        if (window.innerWidth >= 1024) {
            sidebar.style.transform = 'translateX(0%)';
            overlay.classList.add('hidden');
        } else {
            if (!overlay.classList.contains('hidden')) return;
            sidebar.style.transform = 'translateX(-100%)';
        }
    }
    window.addEventListener('resize', handleResize);
    handleResize();

    // Preserve sidebar scroll position
    document.addEventListener("DOMContentLoaded", function() {
        const sidebarNav = document.getElementById('sidebar-nav');
        if (sidebarNav) {
            const scrollPos = sessionStorage.getItem('adminSidebarScroll');
            if (scrollPos) {
                sidebarNav.scrollTop = parseInt(scrollPos, 10);
            }
            sidebarNav.addEventListener('scroll', function() {
                sessionStorage.setItem('adminSidebarScroll', sidebarNav.scrollTop);
            });
        }
    });
    // Auto-dismiss flash messages after 15 seconds
    document.addEventListener("DOMContentLoaded", function() {
        ['flash-success', 'flash-error'].forEach(function(id) {
            const el = document.getElementById(id);
            if (!el) return;
            // Add progress bar
            const bar = document.createElement('div');
            bar.style.cssText = 'position:absolute;bottom:0;left:0;height:3px;width:100%;border-radius:0 0 12px 12px;background:currentColor;opacity:0.25;transition:width 15s linear;';
            el.style.position = 'relative';
            el.style.overflow = 'hidden';
            el.appendChild(bar);
            requestAnimationFrame(() => { bar.style.width = '0%'; });

            const timer = setTimeout(function() {
                el.style.opacity = '0';
                el.style.transform = 'translateY(-8px)';
                el.style.maxHeight = el.offsetHeight + 'px';
                setTimeout(() => {
                    el.style.maxHeight = '0';
                    el.style.marginBottom = '0';
                    el.style.padding = '0';
                    setTimeout(() => el.remove(), 400);
                }, 300);
            }, 15000);

            // Cancel timer if manually closed
            el.querySelector('button')?.addEventListener('click', () => clearTimeout(timer));
        });
    });
</script>
    @stack('scripts')
</body>
</html>
