<div>

    {{-- ===== STYLE ===== --}}
    <style>
        .gallery-card.is-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
        #gallery-lightbox.active {
            display: flex !important;
        }
        #gallery-lightbox.active .lightbox-content {
            opacity: 1 !important;
            transform: scale(1) !important;
        }
        .gallery-hero-bg {
            background: linear-gradient(135deg, #064e3b 0%, #065f46 40%, #047857 100%);
        }
        .gallery-divider {
            clip-path: ellipse(70% 100% at 50% 0%);
        }
    </style>

    {{-- ===== MAIN CONTENT ===== --}}
    <div class="bg-slate-50 min-h-screen pb-24">

        {{-- ===== HEADER ===== --}}
        <div class="relative gallery-hero-bg overflow-hidden" style="min-height: 320px;">

            {{-- Background image --}}
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1542224566-6e85f2e6772f?q=80&w=2000&auto=format&fit=crop"
                     alt="Galeri Desa"
                     class="w-full h-full object-cover"
                     style="opacity: 0.25;">
            </div>

            {{-- Gradient overlays --}}
            <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(4,40,30,0.7) 0%, rgba(4,120,87,0.3) 50%, rgba(4,40,30,0.85) 100%);"></div>

            {{-- Decorative blobs --}}
            <div class="absolute top-0 left-0 w-80 h-80 rounded-full"
                 style="background: radial-gradient(circle, rgba(52,211,153,0.15) 0%, transparent 70%); transform: translate(-30%, -30%);"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full"
                 style="background: radial-gradient(circle, rgba(20,184,166,0.12) 0%, transparent 70%); transform: translate(30%, 30%);"></div>


            {{-- Content --}}
            <div class="relative z-10 flex flex-col items-center justify-center text-center px-6"
                 style="padding-top: 7rem; padding-bottom: 4.5rem;">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 mb-5"
                     style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px);
                            border: 1px solid rgba(255,255,255,0.2); border-radius: 9999px;
                            padding: 6px 18px;">
                    <svg style="width:14px; height:14px; color:#6ee7b7;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span style="color: #a7f3d0; font-size: 11px; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;">
                        Dokumentasi Visual
                    </span>
                </div>

                {{-- Title --}}
                <h1 style="font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 900; color: #ffffff;
                           line-height: 1.1; letter-spacing: -0.02em; margin-bottom: 1rem;
                           text-shadow: 0 4px 24px rgba(0,0,0,0.5);">
                    Galeri Desa
                </h1>

                {{-- Subtitle --}}
                <p style="color: #d1fae5; font-size: 1.1rem; max-width: 480px; line-height: 1.7; margin-bottom: 0;
                          text-shadow: 0 2px 8px rgba(0,0,0,0.4);">
                    Dokumentasi foto berbagai kegiatan dan keindahan Desa Jayanti.
                </p>

                {{-- Divider line --}}
                <div style="width: 60px; height: 3px; background: linear-gradient(to right, #34d399, #14b8a6);
                            border-radius: 9999px; margin-top: 1.5rem; opacity: 0.8;"></div>
            </div>
        </div>

        {{-- ===== GALLERY GRID ===== --}}
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
                        <div class="gallery-card opacity-0 translate-y-10 transition-all duration-700 ease-out"
                             style="transition-delay: {{ ($index % 3) * 120 }}ms">

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
                <div class="gallery-card opacity-0 translate-y-10 text-center py-32 bg-white rounded-3xl border border-gray-100 shadow-sm">
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

        {{-- ===== LIGHTBOX ===== --}}
        <div id="gallery-lightbox"
             class="fixed inset-0 z-50 hidden items-center justify-center p-4"
             onclick="galleryCloseLightbox(event)">
            <div class="absolute inset-0 bg-black/90 backdrop-blur-sm" id="gallery-lightbox-backdrop"></div>

            <div class="relative z-10 max-w-5xl w-full mx-auto lightbox-content transition-all duration-300"
                 style="opacity: 0; transform: scale(0.92);">
                <button onclick="galleryCloseLightbox()"
                        class="absolute -top-12 right-0 text-white/60 hover:text-white transition-colors z-20">
                    <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="bg-white rounded-3xl overflow-hidden shadow-2xl">
                    <div class="bg-black flex items-center justify-center" style="min-height: 300px;">
                        <img id="gallery-lightbox-img" src="" alt="" class="max-h-[72vh] w-full object-contain">
                    </div>
                    <div class="px-7 py-5 border-t border-gray-100">
                        <h3 id="gallery-lightbox-title" class="text-gray-900 font-bold text-xl"></h3>
                        <p id="gallery-lightbox-desc" class="text-gray-500 text-sm mt-1.5"></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ===== SCRIPTS ===== --}}
    <script>
        // Scroll Animation
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.gallery-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.08, rootMargin: '0px 0px -50px 0px' });
            cards.forEach(card => observer.observe(card));
        });

        // Lightbox
        function galleryOpenLightbox(src, title, desc) {
            const lb = document.getElementById('gallery-lightbox');
            document.getElementById('gallery-lightbox-img').src = src;
            document.getElementById('gallery-lightbox-title').textContent = title;
            document.getElementById('gallery-lightbox-desc').textContent = desc;
            lb.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function galleryCloseLightbox(e) {
            const backdrop = document.getElementById('gallery-lightbox-backdrop');
            const lb = document.getElementById('gallery-lightbox');
            if (e && e.target !== lb && !backdrop.contains(e.target)) return;
            const content = lb.querySelector('.lightbox-content');
            content.style.opacity = '0';
            content.style.transform = 'scale(0.92)';
            setTimeout(() => {
                lb.classList.remove('active');
                content.style.opacity = '';
                content.style.transform = '';
                document.getElementById('gallery-lightbox-img').src = '';
                document.body.style.overflow = '';
            }, 250);
        }

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') galleryCloseLightbox();
        });
    </script>

</div>
