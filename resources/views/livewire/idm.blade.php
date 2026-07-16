<div>
    <!-- Hero Section -->
    <div class="relative py-28 px-6 sm:px-12 lg:px-24 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1473177104440-ffee2f376098?w=1400&q=80" alt="Hero IDM" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-green-900/85 via-emerald-800/80 to-teal-900/85"></div>
        </div>
        <div class="relative max-w-7xl mx-auto z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight drop-shadow-lg">Indeks Desa Membangun (IDM)</h1>
            <p class="text-xl text-green-100 max-w-3xl mx-auto leading-relaxed drop-shadow">
                Status perkembangan dan kemandirian Desa Jayanti berdasarkan penilaian Kemendes PDTT.
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        @if($idmDatas->count() > 0)
            <div class="space-y-8">
                @foreach($idmDatas as $item)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 flex flex-col md:flex-row items-center md:items-start gap-8 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex-shrink-0 text-center">
                            <div class="w-32 h-32 rounded-full border-4 border-green-500 flex items-center justify-center bg-green-50">
                                <div class="text-center">
                                    <div class="text-3xl font-black text-green-700">{{ $item->score ?? '-' }}</div>
                                    <div class="text-xs text-green-600 font-semibold uppercase tracking-wider mt-1">Skor IDM</div>
                                </div>
                            </div>
                            <div class="mt-4 font-bold text-gray-900 text-xl">Tahun {{ $item->year }}</div>
                        </div>
                        
                        <div class="flex-grow text-center md:text-left">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                Status: 
                                <span class="text-green-600">{{ $item->status ?? 'Belum Dinilai' }}</span>
                            </h3>
                            @if($item->summary)
                                <div class="prose prose-green max-w-none text-gray-600 mt-4">
                                    {{ $item->summary }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada data IDM yang ditambahkan.</p>
            </div>
        @endif
    </div>
</div>
