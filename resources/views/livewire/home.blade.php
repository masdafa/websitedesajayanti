<div>
    <!-- Hero Section -->
    <div class="relative bg-emerald-800 text-white overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1592659762303-90081d34b277?q=80&w=1973&auto=format&fit=crop" alt="Desa Jayanti" class="w-full h-full object-cover opacity-20" />
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 flex flex-col items-center text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6">
                Selamat Datang di <span class="text-emerald-300">Desa Jayanti</span>
            </h1>
            <p class="text-lg md:text-xl max-w-2xl text-emerald-100 mb-10">
                Website resmi Pemerintah Desa Jayanti, Kecamatan Jayanti, Kabupaten Tangerang. Mewujudkan desa mandiri, berbudaya, dan sejahtera.
            </p>
            <div class="flex gap-4">
                <a href="/profil" wire:navigate class="bg-emerald-500 hover:bg-emerald-400 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg">Kenali Kami</a>
                <a href="/berita" wire:navigate class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white font-bold py-3 px-6 rounded-lg transition border border-white/30 shadow-lg">Info Desa</a>
            </div>
        </div>
    </div>

    <!-- Info Singkat -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow text-center">
                    <div class="w-16 h-16 mx-auto bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Populasi</h3>
                    <p class="text-gray-600">Lebih dari 15.000 jiwa penduduk yang beragam dan rukun.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow text-center">
                    <div class="w-16 h-16 mx-auto bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Luas Wilayah</h3>
                    <p class="text-gray-600">Terdiri dari beberapa dusun dengan potensi pertanian yang kuat.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow text-center">
                    <div class="w-16 h-16 mx-auto bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fasilitas</h3>
                    <p class="text-gray-600">Dilengkapi dengan sekolah, puskesmas, dan fasilitas umum memadai.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita Terbaru -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Kabar Desa</h2>
                    <p class="text-gray-600 mt-2">Berita dan informasi terbaru dari Desa Jayanti</p>
                </div>
                <a href="/berita" wire:navigate class="hidden sm:inline-flex items-center text-emerald-600 font-semibold hover:text-emerald-700">
                    Lihat Semua 
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($latestPosts as $post)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all group cursor-pointer">
                        <div class="h-48 bg-gray-200 overflow-hidden">
                            @if($post->image)
                                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full bg-emerald-100 flex items-center justify-center text-emerald-300">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="text-xs text-emerald-600 font-semibold mb-2">{{ $post->created_at->format('d M Y') }}</div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors">{{ $post->title }}</h3>
                            <p class="text-gray-600 text-sm line-clamp-3">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        Belum ada berita yang dipublikasikan.
                    </div>
                @endforelse
            </div>
            
            <div class="mt-8 text-center sm:hidden">
                <a href="/berita" wire:navigate class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 w-full">
                    Lihat Semua Kabar
                </a>
            </div>
        </div>
    </div>
</div>
