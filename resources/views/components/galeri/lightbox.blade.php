<!-- Lightbox with slider -->
<div id="gallery-lightbox"
        class="fixed inset-0 z-50 hidden items-center justify-center p-4"
        onclick="galleryCloseLightbox(event)">
    <div class="absolute inset-0 bg-black/90 backdrop-blur-sm" id="gallery-lightbox-backdrop"></div>

    <div class="relative z-10 max-w-5xl w-full mx-auto lightbox-content transition-all duration-300"
            style="opacity: 0; transform: scale(0.92);">
        <!-- Close button -->
        <button onclick="galleryCloseLightbox()"
                class="absolute -top-12 right-0 text-white/60 hover:text-white transition-colors z-20">
            <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div class="bg-white rounded-3xl overflow-hidden shadow-2xl">
            <!-- Image slider -->
            <div class="bg-black relative" style="min-height: 300px;">
                <img id="gallery-lightbox-img" src="" alt="" class="max-h-[72vh] w-full object-contain mx-auto block" style="transition: opacity 0.2s ease;">

                <!-- Prev button -->
                <button id="gallery-prev-btn"
                        onclick="gallerySlide(-1); event.stopPropagation();"
                        class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white rounded-full w-11 h-11 flex items-center justify-center transition-all backdrop-blur-sm hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Next button -->
                <button id="gallery-next-btn"
                        onclick="gallerySlide(1); event.stopPropagation();"
                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/80 text-white rounded-full w-11 h-11 flex items-center justify-center transition-all backdrop-blur-sm hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Counter badge -->
                <div id="gallery-counter" class="absolute top-3 right-3 bg-black/60 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full hidden">
                    1 / 1
                </div>
            </div>

            <!-- Thumbnail strip -->
            <div id="gallery-thumbnails" class="flex gap-2 px-4 py-3 bg-gray-50 border-t border-gray-100 overflow-x-auto hidden"></div>

            <!-- Title & desc -->
            <div class="px-7 py-5 border-t border-gray-100">
                <h3 id="gallery-lightbox-title" class="text-gray-900 font-bold text-xl"></h3>
                <p id="gallery-lightbox-desc" class="text-gray-500 text-sm mt-1.5"></p>
            </div>
        </div>
    </div>
</div>
