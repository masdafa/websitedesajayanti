<div>
    <!-- Hero Fullscreen Section -->
    <div x-data="{
            activeSlide: 0,
            slideCount: {{ count($latestPosts) + 1 }},
            init() {
                setInterval(() => {
                    this.next();
                }, 30000); // 30 seconds
            },
            next() {
                this.activeSlide = this.activeSlide === this.slideCount - 1 ? 0 : this.activeSlide + 1;
            },
            prev() {
                this.activeSlide = this.activeSlide === 0 ? this.slideCount - 1 : this.activeSlide - 1;
            }
        }" 
        class="relative w-full h-screen bg-gray-900 overflow-hidden flex items-center justify-center">

        <!-- Slides Container -->
        <div class="relative w-full h-full">
            
            <!-- Default Slide -->
            <div x-show="activeSlide === 0" 
                 x-transition.opacity.duration.700ms
                 class="absolute inset-0 w-full h-full flex items-center justify-center">
                <!-- Background Image -->
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2000&auto=format&fit=crop" alt="Desa Jayanti" class="w-full h-full object-cover opacity-80">
                    <div class="absolute inset-0 bg-black/50"></div>
                </div>
                
                <!-- Hero Content -->
                <div class="relative z-10 text-center px-4 sm:px-12 lg:px-24 max-w-6xl mx-auto mt-16">
                    <h1 class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white tracking-tight mb-4" style="text-shadow: 0 4px 6px rgba(0,0,0,0.8);">
                        DESA JAYANTI RESIDENCE
                    </h1>
                    <p class="text-lg sm:text-2xl md:text-4xl lg:text-5xl text-white font-bold leading-tight mb-4 sm:mb-6" style="text-shadow: 0 3px 5px rgba(0,0,0,0.8);">
                        Menuju Keterbukaan Informasi dan Tata kelola Desa pada informasi warga desa
                    </p>
                    <p class="text-sm sm:text-lg md:text-xl font-bold text-white tracking-wider" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">
                        TIM Teknologi Informasi Desa Jayanti Residence
                    </p>
                </div>
            </div>

            <!-- News Slides -->
            @foreach($latestPosts as $index => $post)
                <div x-show="activeSlide === {{ $index + 1 }}" 
                     x-transition.opacity.duration.700ms
                     class="absolute inset-0 w-full h-full flex items-center justify-center"
                     style="display: none;">
                    
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        @if($post->image)
                            <img src="{{ Str::startsWith($post->image, 'http') ? $post->image : asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-80">
                        @else
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover opacity-80">
                        @endif
                        <div class="absolute inset-0 bg-black/60"></div>
                    </div>
                    
                    <!-- News Content -->
                    <div class="relative z-10 text-center px-4 sm:px-12 lg:px-24 max-w-6xl mx-auto mt-16">
                        <div class="inline-block bg-emerald-600/90 backdrop-blur text-white px-4 py-1.5 rounded-full text-xs font-black tracking-widest mb-6 uppercase shadow-lg border border-emerald-400/30">Berita Terbaru</div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white tracking-tight mb-6 line-clamp-3 leading-tight" style="text-shadow: 0 4px 6px rgba(0,0,0,0.8);">
                            {{ $post->title }}
                        </h1>
                        <p class="text-base sm:text-lg md:text-xl text-gray-200 leading-relaxed mb-8 line-clamp-2 max-w-3xl mx-auto" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">
                            {{ Str::limit(strip_tags($post->content), 150) }}
                        </p>
                        <a href="/berita" wire:navigate class="inline-flex items-center gap-2 bg-white text-emerald-900 font-bold px-6 py-3.5 rounded-xl hover:bg-emerald-50 transition shadow-[0_0_20px_rgba(255,255,255,0.3)] hover:shadow-[0_0_30px_rgba(255,255,255,0.5)] transform hover:-translate-y-1">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Slider Arrows -->
        <div class="absolute inset-y-0 left-4 md:left-8 flex items-center z-20">
            <button @click="prev()" class="bg-black/20 hover:bg-black/50 text-white p-3 md:p-4 rounded-full backdrop-blur-sm transition border border-white/20 hover:scale-110">
                <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
        </div>
        <div class="absolute inset-y-0 right-4 md:right-8 flex items-center z-20">
            <button @click="next()" class="bg-black/20 hover:bg-black/50 text-white p-3 md:p-4 rounded-full backdrop-blur-sm transition border border-white/20 hover:scale-110">
                <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </div>

        <!-- Slider Indicators -->
        <div class="absolute bottom-8 left-0 right-0 flex justify-center gap-2.5 z-20">
            <template x-for="i in slideCount" :key="i">
                <button @click="activeSlide = i - 1" 
                        class="h-2.5 rounded-full transition-all duration-500 shadow-[0_2px_4px_rgba(0,0,0,0.5)]"
                        :class="activeSlide === (i - 1) ? 'bg-emerald-500 w-8' : 'bg-white/50 hover:bg-white/80 w-2.5'"></button>
            </template>
        </div>
    </div>

    <!-- Info Singkat -->
    <div class="py-16 bg-white relative z-20 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div data-aos="fade-up" data-aos-delay="0" class="p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow text-center">
                    <div class="w-16 h-16 mx-auto bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Populasi</h3>
                    <p class="text-gray-600">Lebih dari 15.000 jiwa penduduk yang beragam dan rukun.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow text-center">
                    <div class="w-16 h-16 mx-auto bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Luas Wilayah</h3>
                    <p class="text-gray-600">Terdiri dari beberapa dusun dengan potensi pertanian yang kuat.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition-shadow text-center">
                    <div class="w-16 h-16 mx-auto bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fasilitas</h3>
                    <p class="text-gray-600">Dilengkapi dengan sekolah, puskesmas, dan fasilitas umum memadai.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Visi & Misi -->
    <div class="py-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-emerald-900 mb-4">Visi & Misi Desa</h2>
                <div class="w-24 h-1.5 bg-emerald-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right" class="bg-emerald-50 p-8 md:p-12 rounded-3xl border border-emerald-100 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-10 -mr-10 text-emerald-100 opacity-50">
                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 text-white rounded-full text-sm font-bold mb-6 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            VISI
                        </div>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-emerald-950 leading-tight">
                            "Mewujudkan Desa Jayanti yang Mandiri, Sejahtera, dan Berbudaya Berlandaskan Gotong Royong"
                        </h3>
                    </div>
                </div>

                <div data-aos="fade-left" class="space-y-6">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-bold mb-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        MISI
                    </div>
                    
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold flex-shrink-0 shadow-md">1</div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-1">Peningkatan Infrastruktur</h4>
                            <p class="text-gray-600">Membangun dan memperbaiki sarana dan prasarana publik yang memadai.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold flex-shrink-0 shadow-md">2</div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-1">Penguatan Ekonomi Kerakyatan</h4>
                            <p class="text-gray-600">Mendukung UMKM dan sektor pertanian untuk meningkatkan kesejahteraan warga.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold flex-shrink-0 shadow-md">3</div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-1">Pelayanan Publik Prima</h4>
                            <p class="text-gray-600">Memberikan pelayanan yang cepat, transparan, dan ramah melalui pemanfaatan teknologi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Perangkat Desa -->
    <div class="py-20 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
                <div data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-black text-emerald-900 mb-4">Perangkat Desa</h2>
                    <div class="w-24 h-1.5 bg-emerald-500 rounded-full"></div>
                    <p class="mt-4 text-gray-600 max-w-xl">Mengenal lebih dekat para pengabdi masyarakat yang bertugas melayani warga Desa Jayanti dengan sepenuh hati.</p>
                </div>
                <a href="/profil" wire:navigate class="inline-flex items-center gap-2 text-emerald-600 font-bold hover:text-emerald-800 transition-colors group">
                    Lihat Selengkapnya
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($staffs as $staff)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 transform hover:-translate-y-2 group">
                        <div class="aspect-[4/5] overflow-hidden bg-gray-100 relative">
                            @if(!empty($staff->image))
                                <img src="{{ asset('storage/'.$staff->image) }}" alt="{{ $staff->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-gray-50">
                                    <svg class="w-20 h-20 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6 text-center border-t border-gray-50 relative bg-white">
                            <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-emerald-700 transition-colors">{{ $staff->name }}</h3>
                            <p class="text-emerald-600 font-medium text-sm">{{ $staff->position }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-gray-500 bg-white rounded-3xl border border-gray-200">
                        Belum ada data perangkat desa yang ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Berita Terbaru -->
    <div class="py-16 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div data-aos="fade-up">
                    <h2 class="text-3xl font-black text-gray-900">Kabar Desa</h2>
                    <p class="text-gray-600 mt-2 font-medium">Berita dan informasi terbaru dari Desa Jayanti Residence</p>
                </div>
                <a href="/berita" wire:navigate class="hidden sm:inline-flex items-center text-emerald-600 font-bold hover:text-emerald-700">
                    Lihat Semua 
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($latestPosts as $post)
                    <a data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" href="{{ route('berita.detail', $post->slug) }}" wire:navigate class="bg-gray-50 rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-xl transition-all group cursor-pointer flex flex-col h-full block">
                        <div class="h-52 bg-gray-200 overflow-hidden relative">
                            @if(!empty($post->image))
                                <img src="{{ Str::startsWith($post->image, 'http') ? $post->image : asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full bg-emerald-100 flex items-center justify-center text-emerald-300">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-emerald-800 text-xs font-bold px-3 py-1 rounded-full shadow">
                                {{ $post->created_at->format('d M Y') }}
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors line-clamp-2">{{ $post->title }}</h3>
                            <p class="text-gray-600 text-sm line-clamp-3 flex-grow">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500 font-medium">
                        Belum ada berita yang dipublikasikan.
                    </div>
                @endforelse
            </div>
            
            <div class="mt-8 text-center sm:hidden">
                <a href="/berita" wire:navigate class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-base font-bold rounded-md text-gray-700 bg-white hover:bg-gray-50 w-full">
                    Lihat Semua Kabar
                </a>
            </div>
        </div>
    </div>

    <!-- Galeri Desa -->
    <div class="py-20 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
                <div data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-black text-emerald-900 mb-4">Galeri Desa</h2>
                    <div class="w-24 h-1.5 bg-emerald-500 rounded-full"></div>
                    <p class="mt-4 text-gray-600 max-w-xl">Momen kebersamaan, keindahan alam, dan dokumentasi kegiatan warga Desa Jayanti yang tak terlupakan.</p>
                </div>
                <a href="/galeri" wire:navigate class="inline-flex items-center gap-2 text-emerald-600 font-bold hover:text-emerald-800 transition-colors group">
                    Buka Galeri Penuh
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                @forelse($galleries as $gallery)
                    <a data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}" href="/galeri" wire:navigate class="group relative overflow-hidden rounded-2xl bg-gray-200 aspect-square block shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        @if(!empty($gallery->image))
                            <img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">No Image</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <h3 class="text-white font-bold text-lg leading-tight">{{ $gallery->title }}</h3>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-16 text-center text-gray-500 bg-white rounded-3xl border border-dashed border-gray-300">
                        Belum ada foto galeri yang ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
