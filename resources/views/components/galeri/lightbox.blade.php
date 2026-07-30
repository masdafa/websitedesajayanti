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
