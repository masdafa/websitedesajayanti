<div>
    <!-- Hero Fullscreen Slider -->
    <div x-data="{
            activeSlide: 0,
            slideCount: {{ count($latestPosts) + 1 }},
            init() { setInterval(() => this.next(), 6000); },
            next() { this.activeSlide = (this.activeSlide + 1) % this.slideCount; },
            prev() { this.activeSlide = this.activeSlide === 0 ? this.slideCount - 1 : this.activeSlide - 1; }
        }"
         class="relative w-full h-screen bg-gray-900 overflow-hidden">

        <!-- Default Slide -->
        <div x-show="activeSlide === 0" x-transition:enter="transition-opacity duration-700" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             class="absolute inset-0 flex items-center justify-center">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?q=80&w=2000&auto=format&fit=crop" alt="Jayanti Residence" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/80"></div>
            </div>
            <div class="relative z-10 text-center px-6 sm:px-12 max-w-5xl mx-auto">
                <div class="inline-flex items-center gap-2 bg-green-500/20 border border-green-400/40 text-green-300 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-6 backdrop-blur">
                    <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
                    Website Resmi Perumahan
                </div>
                <h1 class="text-4xl sm:text-6xl md:text-7xl font-black text-white mb-5 leading-tight" style="text-shadow: 0 4px 20px rgba(0,0,0,0.8);">
                    JAYANTI<br><span class="text-green-400">RESIDENCE</span>
                </h1>
                <p class="text-sm sm:text-base text-gray-300 max-w-3xl mx-auto mb-8 leading-relaxed">
                    Selamat datang di Website Resmi Perumahan Jayanti Residence. Website ini merupakan media komunikasi dan informasi bagi seluruh warga. Mari bersama-sama membangun lingkungan yang aman, nyaman, bersih, dan harmonis.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="/profil" wire:navigate class="btn-primary text-white font-bold px-7 py-3.5 rounded-xl inline-flex items-center gap-2 shadow-lg">
                        Kenali Kami
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="/layanan" wire:navigate class="bg-white/10 hover:bg-white/20 border border-white/30 text-white font-bold px-7 py-3.5 rounded-xl inline-flex items-center gap-2 transition-all backdrop-blur">
                        Layanan Warga
                    </a>
                </div>
            </div>
        </div>

        <!-- News Slides -->
        @foreach($latestPosts as $index => $post)
            <div x-show="activeSlide === {{ $index + 1 }}" x-transition:enter="transition-opacity duration-700" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 class="absolute inset-0 flex items-center justify-center" style="display:none;">
                <div class="absolute inset-0">
                    @if($post->image)
                        <img src="{{ Str::startsWith($post->image, 'http') ? $post->image : asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?q=80&w=2000" class="w-full h-full object-cover">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/80"></div>
                </div>
                <div class="relative z-10 text-center px-6 sm:px-12 max-w-5xl mx-auto">
                    <div class="inline-flex items-center gap-1.5 bg-green-600/90 text-white px-4 py-1.5 rounded-full text-xs font-black tracking-widest mb-6 uppercase">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        Berita Terbaru
                    </div>
                    <h2 class="text-3xl sm:text-5xl font-black text-white mb-5 leading-tight line-clamp-3" style="text-shadow: 0 4px 15px rgba(0,0,0,0.8);">
                        {{ $post->title }}
                    </h2>
                    <p class="text-gray-300 text-base sm:text-lg max-w-2xl mx-auto mb-8 line-clamp-2">
                        {{ Str::limit(strip_tags($post->content), 150) }}
                    </p>
                    <a href="{{ route('berita.detail', $post->slug) }}" wire:navigate class="btn-primary text-white font-bold px-7 py-3.5 rounded-xl inline-flex items-center gap-2 shadow-lg">
                        Baca Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        @endforeach

        <!-- Arrows -->
        <button @click="prev()" class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 z-20 bg-black/30 hover:bg-black/60 text-white p-3 rounded-full backdrop-blur transition border border-white/20">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button @click="next()" class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 z-20 bg-black/30 hover:bg-black/60 text-white p-3 rounded-full backdrop-blur transition border border-white/20">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>

        <!-- Dots -->
        <div class="absolute bottom-8 left-0 right-0 flex justify-center gap-2 z-20">
            <template x-for="i in slideCount" :key="i">
                <button @click="activeSlide = i - 1"
                        class="h-2 rounded-full transition-all duration-500"
                        :class="activeSlide === (i-1) ? 'bg-green-400 w-8' : 'bg-white/40 hover:bg-white/70 w-2'"></button>
            </template>
        </div>

    </div>

    <!-- Quick Stats -->
    <div class="py-12 bg-white shadow-sm relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                    $quickStats = [
                        ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'value' => '2.500+', 'label' => 'Jiwa', 'color' => 'green'],
                        ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'value' => '800+', 'label' => 'Unit Rumah', 'color' => 'blue'],
                        ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'value' => '24/7', 'label' => 'Keamanan', 'color' => 'red'],
                        ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'value' => '8+', 'label' => 'Fasilitas', 'color' => 'amber'],
                    ];
                    $statColors = ['green'=>'bg-green-50 text-green-600 border-green-100','blue'=>'bg-blue-50 text-blue-600 border-blue-100','red'=>'bg-red-50 text-red-600 border-red-100','amber'=>'bg-amber-50 text-amber-600 border-amber-100'];
                @endphp
                @foreach($quickStats as $i => $stat)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}" class="text-center p-6 rounded-2xl border {{ $statColors[$stat['color']] }} card-hover">
                        <div class="w-14 h-14 rounded-2xl {{ $statColors[$stat['color']] }} flex items-center justify-center mx-auto mb-3">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/></svg>
                        </div>
                        <div class="text-3xl font-black text-gray-900 mb-1">{{ $stat['value'] }}</div>
                        <div class="text-sm font-semibold text-gray-500">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Fasilitas Perumahan -->
    <div class="py-20 bg-gradient-to-br from-green-950 via-green-900 to-green-950 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 left-10 w-96 h-96 rounded-full bg-green-400 blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 rounded-full bg-emerald-400 blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div data-aos="fade-up" class="text-center mb-14">
                <span class="text-green-400 text-sm font-bold uppercase tracking-widest">Fasilitas</span>
                <h2 class="text-3xl md:text-5xl font-black text-white mt-2 mb-4">Fasilitas Perumahan</h2>
                <div class="w-16 h-1 bg-green-400 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($facilities as $i => $f)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}" class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-2xl p-5 backdrop-blur-sm hover:bg-white/10 transition-colors">
                        <div class="text-emerald-400 bg-emerald-500/20 p-3 rounded-xl flex-shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $f->icon }}"/></svg>
                        </div>
                        <h4 class="font-bold text-white text-lg">{{ $f->title }}</h4>
                    </div>
                @empty
                    <p class="text-white/60 col-span-3 text-center">Belum ada data fasilitas.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Pengurus / Perangkat -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
                <div data-aos="fade-up">
                    <span class="text-green-600 text-sm font-bold uppercase tracking-widest">Tim Kami</span>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2 mb-3">Pengurus Perumahan</h2>
                    <div class="w-16 h-1 bg-green-500 rounded-full"></div>
                    <p class="mt-4 text-gray-500 max-w-md">Para pengurus yang berdedikasi melayani warga Perumahan Jayanti Residence dengan sepenuh hati.</p>
                </div>
                <a href="/profil" wire:navigate class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition group">
                    Lihat Semua <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($staffs as $staff)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 card-hover group">
                        <div class="aspect-[4/5] overflow-hidden bg-gray-100 relative">
                            @if(!empty($staff->image))
                                <img src="{{ asset('storage/'.$staff->image) }}" alt="{{ $staff->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-green-50 to-green-100 text-green-600">
                                    <div class="w-20 h-20 rounded-full bg-green-200 flex items-center justify-center text-3xl font-black mb-2">
                                        {{ substr($staff->name, 0, 1) }}
                                    </div>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-5 text-center border-t border-gray-50">
                            <h3 class="text-base font-black text-gray-900 mb-1 group-hover:text-green-700 transition-colors">{{ $staff->name }}</h3>
                            <p class="text-green-600 font-semibold text-sm">{{ $staff->position }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-gray-400 bg-white rounded-3xl border border-dashed border-gray-200">
                        Belum ada data pengurus yang ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Agenda Terdekat -->
    <div class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
                <div data-aos="fade-up">
                    <span class="text-green-600 text-sm font-bold uppercase tracking-widest">Jadwal</span>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2 mb-3">Agenda Kegiatan</h2>
                    <div class="w-16 h-1 bg-green-500 rounded-full"></div>
                </div>
                <a href="/agenda" wire:navigate class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition group">
                    Lihat Semua <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @if($upcomingAgendas->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($upcomingAgendas as $i => $agenda)
                    <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}" class="bg-gray-50 rounded-2xl border border-gray-100 p-6 card-hover flex gap-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-green-600 text-white rounded-2xl flex flex-col items-center justify-center">
                            <span class="text-xs font-bold uppercase leading-none">{{ $agenda->event_date->format('M') }}</span>
                            <span class="text-2xl font-black leading-none">{{ $agenda->event_date->format('d') }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="inline-block bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full mb-2">{{ $agenda->category }}</span>
                            <h3 class="font-bold text-gray-900 leading-snug line-clamp-2">{{ $agenda->title }}</h3>
                            @if($agenda->location)
                                <p class="text-xs text-gray-500 mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ $agenda->location }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12 text-gray-400 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                Belum ada agenda kegiatan yang dijadwalkan.
            </div>
            @endif
        </div>
    </div>

    <!-- Berita Terbaru -->
    <div class="py-20 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
                <div data-aos="fade-up">
                    <span class="text-green-600 text-sm font-bold uppercase tracking-widest">Informasi</span>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2 mb-3">Berita & Pengumuman</h2>
                    <div class="w-16 h-1 bg-green-500 rounded-full"></div>
                </div>
                <a href="/berita" wire:navigate class="hidden sm:inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition group">
                    Lihat Semua <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            
            <!-- Pengumuman Statik -->
            <div data-aos="fade-up" class="mb-10 bg-emerald-50 border-l-4 border-emerald-500 p-6 rounded-r-2xl shadow-sm">
                <div class="flex items-center gap-3 mb-2">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    <h3 class="text-lg font-bold text-emerald-900">Pengumuman: Kerja Bakti Bulanan</h3>
                </div>
                <div class="text-emerald-800 ml-9 space-y-1">
                    <p><strong>Hari/Tanggal:</strong> Minggu, Setiap Awal Bulan</p>
                    <p><strong>Waktu:</strong> 07.00 WIB</p>
                    <p><strong>Lokasi:</strong> Seluruh Area Perumahan</p>
                    <p class="mt-2 text-sm italic">Seluruh warga diharapkan berpartisipasi untuk menjaga kebersihan lingkungan.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($latestPosts as $post)
                    <a data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
                       href="{{ route('berita.detail', $post->slug) }}" wire:navigate
                       class="bg-white rounded-2xl overflow-hidden border border-gray-100 card-hover group flex flex-col">
                        <div class="h-48 overflow-hidden relative bg-gray-100">
                            @if(!empty($post->image))
                                <img src="{{ Str::startsWith($post->image, 'http') ? $post->image : asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center text-green-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3 bg-white/95 text-green-800 text-xs font-bold px-2.5 py-1 rounded-lg shadow">
                                {{ $post->created_at->format('d M Y') }}
                            </div>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="font-black text-gray-900 text-base mb-2 group-hover:text-green-700 transition-colors line-clamp-2">{{ $post->title }}</h3>
                            <p class="text-gray-500 text-sm line-clamp-3 flex-grow">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                            <div class="mt-4 flex items-center text-green-600 text-sm font-bold">
                                Baca Selengkapnya <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-400 bg-white rounded-2xl border border-dashed border-gray-200">
                        Belum ada berita yang dipublikasikan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Galeri -->
    <div class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
                <div data-aos="fade-up">
                    <span class="text-green-600 text-sm font-bold uppercase tracking-widest">Dokumentasi</span>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2 mb-3">Galeri Kegiatan</h2>
                    <div class="w-16 h-1 bg-green-500 rounded-full"></div>
                </div>
                <a href="/galeri" wire:navigate class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition group">
                    Buka Galeri <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @forelse($galleries as $gallery)
                    <a data-aos="zoom-in" data-aos-delay="{{ $loop->index * 80 }}" href="/galeri" wire:navigate
                       class="group relative overflow-hidden rounded-2xl bg-gray-100 aspect-square block card-hover">
                        @if(!empty($gallery->image))
                            <img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300 bg-gray-100">No Image</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-5">
                            <h3 class="text-white font-bold text-sm leading-tight">{{ $gallery->title }}</h3>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-16 text-center text-gray-400 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                        Belum ada foto galeri.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-20 hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-green-300 blur-3xl"></div>
        </div>
        <div class="max-w-4xl mx-auto px-4 text-center relative">
            <div data-aos="fade-up">
                <h2 class="text-3xl md:text-5xl font-black text-white mb-4">Ada Pertanyaan atau Pengaduan?</h2>
                <p class="text-green-300 text-lg mb-8">Kami siap membantu Anda. Hubungi pengurus perumahan atau sampaikan laporan melalui fitur layanan warga kami.</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="/layanan" wire:navigate class="btn-primary text-white font-bold px-8 py-4 rounded-2xl inline-flex items-center gap-2 shadow-lg text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Layanan Warga
                    </a>
                    <a href="/kontak" wire:navigate class="bg-white/10 hover:bg-white/20 border border-white/30 text-white font-bold px-8 py-4 rounded-2xl inline-flex items-center gap-2 transition-all backdrop-blur text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
