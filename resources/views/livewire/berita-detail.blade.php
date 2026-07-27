<div class="bg-gray-50 min-h-screen pb-16">
    <!-- Hero Banner (Ujung ke ujung) -->
    <div class="relative bg-emerald-900 pt-32 pb-40" style="padding-bottom: 380px;">
        <div class="absolute inset-0">
            @if($post->image)
                <img src="{{ Str::startsWith($post->image, 'http') ? $post->image : asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-30">
            @else
                <div class="w-full h-full bg-emerald-950 opacity-80"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/80 to-transparent"></div>
        </div>

        <div class="relative w-full mx-auto px-4 sm:px-6 lg:px-12 text-center z-10">
            <a href="/berita" wire:navigate class="inline-flex items-center text-emerald-100 hover:text-white font-medium mb-8 group transition-colors">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Berita
            </a>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight drop-shadow-lg max-w-6xl mx-auto">
                {{ $post->title }}
            </h1>
            
            <div class="flex items-center justify-center gap-4 text-sm text-emerald-100 drop-shadow">
                <div class="flex items-center gap-1.5 font-medium">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Dipublikasikan pada {{ $post->created_at->format('d F Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Artikel -->
    <div class="w-full mx-auto px-4 sm:px-8 lg:px-16 -mt-20 md:-mt-32 lg:-mt-48 relative z-20">
        <article class="bg-white rounded-3xl overflow-hidden shadow-xl shadow-emerald-900/5 border border-gray-100 p-8 md:p-10 w-full">
            <div class="prose prose-lg prose-emerald max-w-none text-gray-700 leading-relaxed text-justify w-full">
                {!! $post->content !!}
            </div>
        </article>
    </div>
</div>
