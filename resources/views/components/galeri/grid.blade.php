@props(['galleries'])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    @if($galleries->filter(fn($g) => $g->image)->count() > 0)

        <!-- Header to match the image style -->
        <div class="flex items-center gap-4 mb-10 w-full" data-aos="fade-up">
            <div class="h-[2px] bg-gray-900 w-16 md:w-48"></div>
            <h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-wide uppercase flex items-baseline gap-3">
                Gallery
                <span class="text-sm md:text-base font-normal text-gray-500 tracking-normal normal-case">{{ $galleries->filter(fn($g) => $g->image)->count() }} foto ditemukan</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-2" id="gallery-grid">
            @foreach($galleries->filter(fn($g) => $g->image) as $index => $gallery)
                @php
                    // Pattern block of 6 items: [2 cols, 1 col, 1 col], [1 col, 1 col, 2 cols]
                    $isLarge = ($index % 6 == 0) || ($index % 6 == 5);
                @endphp
                <div data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 100 }}" 
                     class="group relative bg-gray-100 overflow-hidden cursor-pointer shadow-sm hover:shadow-md transition-shadow {{ $isLarge ? 'md:col-span-2' : 'md:col-span-1' }} h-[300px] lg:h-[350px]"
                     onclick="galleryOpenLightbox('{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/'.$gallery->image) }}', '{{ addslashes($gallery->title) }}', '{{ addslashes($gallery->description ?? '') }}')">

                    <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/'.$gallery->image) }}"
                            alt="{{ $gallery->title }}"
                            class="w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-105" />

                    {{-- Gradient overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    {{-- Title overlay --}}
                    <div class="absolute bottom-0 left-0 right-0 p-5 translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-out">
                        <h3 class="text-white font-bold text-lg leading-tight" style="text-shadow: 0 2px 4px rgba(0,0,0,0.8);">
                            {{ $gallery->title }}
                        </h3>
                        @if($gallery->description)
                            <p class="text-gray-300 text-sm mt-1 line-clamp-2">
                                {{ $gallery->description }}
                            </p>
                        @endif
                    </div>
                    
                    {{-- Top right badge icon --}}
                    <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-white/20 backdrop-blur-md border border-white/40 rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                            </svg>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    @else
        {{-- Empty state --}}
        <div data-aos="fade-up" class="text-center py-32 bg-white border border-gray-100 shadow-sm">
            <div style="width: 80px; height: 80px; background: #f0fdf4; border-radius: 9999px;
                        display: flex; align-items: center; justify-content: center; margin: 0 auto 1.25rem;">
                <svg style="width: 40px; height: 40px; color: #6ee7b7;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-gray-400 font-semibold text-lg">Belum ada foto di galeri.</p>
            <p class="text-gray-300 text-sm mt-1.5">Foto akan tampil setelah ditambahkan oleh admin.</p>
        </div>
    @endif
</div>
