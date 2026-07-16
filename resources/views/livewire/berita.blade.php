<div class="bg-gray-50 min-h-screen pb-16">
    <div class="bg-emerald-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight mb-4">Kabar Desa</h1>
            <p class="text-emerald-100 max-w-2xl mx-auto">Informasi dan berita terbaru seputar kegiatan di Desa Jayanti.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <!-- Search bar -->
        <div class="max-w-xl mx-auto mb-12">
            <div class="relative">
                <input wire:model.live.debounce.300ms="search" type="text" class="w-full pl-12 pr-4 py-4 rounded-xl border border-gray-200 shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-gray-900 transition" placeholder="Cari berita atau informasi...">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <div wire:loading class="text-sm text-emerald-600 mt-2 text-center w-full">Mencari...</div>
        </div>

        <!-- Berita Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all group flex flex-col h-full">
                    <div class="h-52 bg-gray-200 overflow-hidden relative">
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-emerald-100 flex items-center justify-center text-emerald-300">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-emerald-800 text-xs font-bold px-3 py-1 rounded-full shadow">
                            {{ $post->created_at->format('d M Y') }}
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors line-clamp-2">{{ $post->title }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                        <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-700 inline-flex items-center">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center text-gray-400 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Tidak ada berita ditemukan</h3>
                    <p class="text-gray-500 mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>
