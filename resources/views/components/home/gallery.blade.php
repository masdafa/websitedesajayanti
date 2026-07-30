@props(['galleries'])

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
                Buka Galeri <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
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
