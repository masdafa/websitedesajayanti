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
