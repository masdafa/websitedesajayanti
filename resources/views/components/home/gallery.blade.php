@props(['galleries'])

<!-- Galeri -->
<div class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header to match the image style -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-10 gap-6">
            <div class="flex items-center gap-4 w-full" data-aos="fade-up">
                <div class="h-[2px] bg-gray-900 w-16 md:w-48"></div>
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-wide uppercase">Gallery</h2>
            </div>
            
            <a href="/galeri" wire:navigate class="shrink-0 inline-flex items-center gap-2 text-gray-600 font-bold hover:text-gray-900 transition group text-sm md:text-base">
                Lihat Semua <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2 md:gap-3">
            @forelse($galleries as $index => $gallery)
                @php
                    // Create the alternating pattern for 8 photos max:
                    // Row 1: [2 cols] [1 col] [1 col] (items 0,1,2)
                    // Row 2: [1 col] [1 col] [2 cols] (items 3,4,5)
                    // Row 3: [2 cols] [2 cols] (items 6,7)
                    $isLarge = in_array($index % 8, [0, 5, 6, 7]);
                @endphp
                <a data-aos="zoom-in" data-aos-delay="{{ ($index % 6) * 100 }}" href="/galeri" wire:navigate
                    class="group relative overflow-hidden bg-gray-100 block 
                    {{ $isLarge ? 'md:col-span-2 sm:col-span-2' : 'md:col-span-1 sm:col-span-1' }} h-[250px] md:h-[300px]">
                    
                    @if(!empty((!empty($gallery->images) ? $gallery->images[0] : null)))
                    <img src="{{ Str::startsWith((!empty($gallery->images) ? $gallery->images[0] : null), 'http') ? (!empty($gallery->images) ? $gallery->images[0] : null) : asset('storage/'.(!empty($gallery->images) ? $gallery->images[0] : null)) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-200 font-medium">No Image</div>
                    @endif
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-5">
                        <h3 class="text-white font-bold text-lg leading-tight">{{ $gallery->title }}</h3>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-16 text-center text-gray-400 bg-gray-50 border border-dashed border-gray-200">
                    Belum ada foto galeri.
                </div>
            @endforelse
        </div>
    </div>
</div>
