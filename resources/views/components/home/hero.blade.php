@props(['heroItems'])

<!-- Hero Fullscreen Slider -->
<div x-data="{
        activeSlide: 0,
        slideCount: {{ count($heroItems) + 1 }},
        init() { setInterval(() => this.next(), 60000); },
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
            <h1 class="text-4xl sm:text-6xl md:text-7xl font-black text-white mb-5 leading-tight" style="text-shadow: 0 4px 20px rgba(0,0,0,0.8);">
                JAYANTI<br><span class="text-green-400">RESIDENCE</span>
            </h1>
            <p class="text-sm sm:text-base text-gray-300 max-w-3xl mx-auto mb-8 leading-relaxed">
                Selamat datang di Website Resmi Perumahan Jayanti Residence. Website ini merupakan media komunikasi dan informasi bagi seluruh warga. Mari bersama-sama membangun lingkungan yang aman, nyaman, bersih, dan harmonis.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="/profil" wire:navigate class="btn-primary text-white font-bold px-7 py-3.5 rounded-xl inline-flex items-center gap-2 shadow-lg">
                    Kenali Kami
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="/layanan" wire:navigate class="bg-white/10 hover:bg-white/20 border border-white/30 text-white font-bold px-7 py-3.5 rounded-xl inline-flex items-center gap-2 transition-all backdrop-blur">
                    Layanan Warga
                </a>
            </div>
        </div>
    </div>

    <!-- Dynamic Slides (Berita & Galeri) -->
    @foreach($heroItems as $index => $item)
    <div x-show="activeSlide === {{ $index + 1 }}" x-transition:enter="transition-opacity duration-700" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        class="absolute inset-0 flex items-center justify-center" style="display:none;">
        <div class="absolute inset-0">
            @if($item->image)
            <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
            @else
            <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?q=80&w=2000" class="w-full h-full object-cover">
            @endif
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/80"></div>
        </div>
        <div class="relative z-10 text-center px-6 sm:px-12 max-w-5xl mx-auto">
            <div class="inline-flex items-center gap-1.5 {{ $item->badge_color }} text-white px-4 py-1.5 rounded-full text-xs font-black tracking-widest mb-6 uppercase">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                {{ $item->badge }}
            </div>
            <h2 class="text-3xl sm:text-5xl font-black text-white mb-5 leading-tight line-clamp-3" style="text-shadow: 0 4px 15px rgba(0,0,0,0.8);">
                {{ $item->title }}
            </h2>
            <p class="text-gray-300 text-base sm:text-lg max-w-2xl mx-auto mb-8 line-clamp-2">
                {{ $item->description }}
            </p>
            <a href="{{ $item->link }}" wire:navigate class="btn-primary text-white font-bold px-7 py-3.5 rounded-xl inline-flex items-center gap-2 shadow-lg">
                {{ $item->button_text }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </div>
    @endforeach

    <!-- Arrows -->
    <button @click="prev()" class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 z-20 bg-black/30 hover:bg-black/60 text-white p-3 rounded-full backdrop-blur transition border border-white/20">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button @click="next()" class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 z-20 bg-black/30 hover:bg-black/60 text-white p-3 rounded-full backdrop-blur transition border border-white/20">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
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
