<div class="bg-gray-50 min-h-screen pb-16">
    <div class="bg-emerald-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight mb-4">Galeri Desa</h1>
            <p class="text-emerald-100 max-w-2xl mx-auto">Dokumentasi foto berbagai kegiatan dan keindahan Desa Jayanti.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            @forelse($galleries as $gallery)
                <div class="break-inside-avoid relative group rounded-2xl overflow-hidden shadow-sm">
                    <img src="{{ asset('storage/'.$gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <h3 class="text-white font-bold text-lg">{{ $gallery->title }}</h3>
                        @if($gallery->description)
                            <p class="text-gray-200 text-sm mt-1 line-clamp-2">{{ $gallery->description }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full w-full text-center text-gray-500 py-20 bg-white rounded-2xl border border-gray-100 shadow-sm inline-block">
                    Belum ada foto di galeri.
                </div>
            @endforelse
        </div>
    </div>
</div>
