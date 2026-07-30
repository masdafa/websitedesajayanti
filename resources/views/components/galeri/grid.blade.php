@props(['galleries'])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="margin-top: -1px; padding-top: 3.5rem;">

    @if($galleries->filter(fn($g) => $g->image)->count() > 0)

        {{-- Section label --}}
        <div class="flex items-center gap-4 mb-8">
            <div style="width: 4px; height: 28px; background: linear-gradient(to bottom, #10b981, #14b8a6); border-radius: 9999px;"></div>
            <div>
                <p class="text-xs font-semibold text-emerald-600 uppercase tracking-widest">Koleksi Foto</p>
                <p class="text-gray-400 text-xs mt-0.5">{{ $galleries->filter(fn($g) => $g->image)->count() }} foto tersedia</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7" id="gallery-grid">
            @foreach($galleries->filter(fn($g) => $g->image) as $index => $gallery)
                <div data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 150 }}">

                    <div class="group relative bg-white rounded-3xl overflow-hidden cursor-pointer border border-gray-100/80"
                            style="box-shadow: 0 4px 20px rgba(0,0,0,0.07); transition: all 0.45s cubic-bezier(.22,.68,0,1.2);"
                            onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 24px 60px rgba(0,0,0,0.16)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.07)';"
                            onclick="galleryOpenLightbox('{{ asset('storage/'.$gallery->image) }}', '{{ addslashes($gallery->title) }}', '{{ addslashes($gallery->description ?? '') }}')">

                        {{-- Image wrapper — bigger aspect ratio --}}
                        <div class="relative overflow-hidden" style="aspect-ratio: 1/1;">
                            <img src="{{ asset('storage/'.$gallery->image) }}"
                                    alt="{{ $gallery->title }}"
                                    class="w-full h-full object-cover"
                                    style="transition: transform 0.7s cubic-bezier(.22,.68,0,1.2);"
                                    onmouseover="this.style.transform='scale(1.08)';"
                                    onmouseout="this.style.transform='scale(1)';"/>

                            {{-- Gradient overlay --}}
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-350"
                                    style="background: linear-gradient(to top, rgba(4,40,30,0.82) 0%, rgba(4,60,40,0.3) 50%, transparent 100%);"></div>

                            {{-- Zoom button --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300"
                                    style="transform: scale(0.7); transition: all 0.3s ease;"
                                    onmouseover="this.style.transform='scale(1)'"
                                    onmouseout="this.style.transform='scale(0.7)'">
                                <div style="background: rgba(255,255,255,0.18); backdrop-filter: blur(12px);
                                            border: 1.5px solid rgba(255,255,255,0.35); border-radius: 9999px;
                                            width: 52px; height: 52px; display: flex; align-items: center; justify-content: center;
                                            box-shadow: 0 8px 24px rgba(0,0,0,0.25);">
                                    <svg style="width:22px; height:22px; color:#fff;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- Title overlay slide up --}}
                            <div class="absolute bottom-0 left-0 right-0 p-5 translate-y-full group-hover:translate-y-0 transition-transform duration-350 ease-out">
                                <h3 class="text-white font-bold text-base leading-snug"
                                    style="text-shadow: 0 2px 8px rgba(0,0,0,0.5);">
                                    {{ $gallery->title }}
                                </h3>
                                @if($gallery->description)
                                    <p class="text-emerald-200 text-xs mt-1.5 line-clamp-2 opacity-90">
                                        {{ $gallery->description }}
                                    </p>
                                @endif
                            </div>

                            {{-- Top right badge --}}
                            <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div style="background: rgba(16,185,129,0.85); backdrop-filter: blur(8px);
                                            border-radius: 9999px; padding: 4px 10px; font-size: 10px;
                                            color: #fff; font-weight: 600; letter-spacing: 0.05em;">
                                    Lihat Foto
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>

    @else
        {{-- Empty state --}}
        <div data-aos="fade-up" class="text-center py-32 bg-white rounded-3xl border border-gray-100 shadow-sm">
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
