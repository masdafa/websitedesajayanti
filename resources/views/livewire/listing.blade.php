<div>
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-green-700 to-green-900 py-20 px-6 sm:px-12 lg:px-24">
        <div class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('images/logo.png') }}" alt="Background" class="w-full h-full object-cover opacity-10">
        </div>
        <div class="relative max-w-7xl mx-auto z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight">Listing Potensi Desa</h1>
            <p class="text-xl text-green-100 max-w-3xl mx-auto leading-relaxed">
                Direktori fasilitas, tempat wisata, dan potensi unggulan di Desa Jayanti.
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        @if($listings->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($listings as $item)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">Tidak ada gambar</span>
                            </div>
                        @endif
                        <div class="p-6 flex-grow flex flex-col">
                            @if($item->category)
                                <span class="self-start inline-block px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full mb-3">{{ $item->category }}</span>
                            @endif
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $item->name }}</h3>
                            @if($item->address)
                                <div class="flex items-start text-gray-500 mb-3 text-sm">
                                    <svg class="w-4 h-4 mr-1 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span>{{ $item->address }}</span>
                                </div>
                            @endif
                            @if($item->description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $item->description }}</p>
                            @endif
                            
                            <div class="mt-auto pt-4 border-t border-gray-100 space-y-2">
                                @if($item->phone_number)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        {{ $item->phone_number }}
                                    </div>
                                @endif
                                @if($item->maps_url)
                                    <a href="{{ $item->maps_url }}" target="_blank" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 font-medium">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                        Buka di Google Maps
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada listing yang ditambahkan.</p>
            </div>
        @endif
    </div>
</div>
