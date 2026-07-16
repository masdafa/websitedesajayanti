<div>
    <!-- Hero Section -->
    <div class="relative py-28 px-6 sm:px-12 lg:px-24 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1400&q=80" alt="Hero Infografis" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-green-900/85 via-emerald-800/80 to-teal-900/85"></div>
        </div>
        <div class="relative max-w-7xl mx-auto z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight drop-shadow-lg">Infografis Desa</h1>
            <p class="text-xl text-green-100 max-w-3xl mx-auto leading-relaxed drop-shadow">
                Data dan statistik penting mengenai Desa Jayanti yang disajikan secara visual.
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        @if($infographics->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($infographics as $item)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-auto object-cover">
                        @endif
                        <div class="p-6">
                            @if($item->category)
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full mb-3">{{ $item->category }}</span>
                            @endif
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $item->title }}</h3>
                            @if($item->description)
                                <p class="text-gray-600">{{ $item->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada data infografis yang ditambahkan.</p>
            </div>
        @endif
    </div>
</div>
