@props(['settings'])

<div class="lg:col-span-2 space-y-12">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </span>
            Profil Perumahan
        </h2>
        <p class="text-gray-700 leading-relaxed">{{ $settings['profil_text'] ?? 'Perumahan Jayanti Residence merupakan kawasan hunian yang mengedepankan kenyamanan, keamanan, dan kebersamaan antarwarga.' }}</p>
    </div>

    <!-- Visi Misi -->
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Visi & Misi</h2>
        
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-emerald-700 mb-3">Visi</h3>
            <p class="text-gray-700 italic text-lg border-l-4 border-emerald-500 pl-4 py-2 bg-emerald-50 rounded-r-lg">"{{ $settings['visi_text'] ?? 'Mewujudkan lingkungan perumahan yang aman, nyaman, bersih, dan harmonis.' }}"</p>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-emerald-700 mb-4">Misi</h3>
            <ul class="space-y-4">
                @foreach(array_filter(explode("\n", $settings['misi_text'] ?? '')) as $i => $misi)
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold mr-4 mt-1">{{ $i + 1 }}</span>
                        <p class="text-gray-600 pt-1">{{ trim($misi) }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    @if(!empty($settings['housing_map_image']))
    <!-- Denah Perumahan -->
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
            </span>
            Denah Perumahan
        </h2>
        <div class="rounded-xl overflow-hidden border border-gray-200 shadow-sm relative group">
            <a href="{{ asset('storage/' . $settings['housing_map_image']) }}" target="_blank" title="Klik untuk memperbesar gambar" class="block">
                <img src="{{ asset('storage/' . $settings['housing_map_image']) }}" alt="Denah Perumahan Jayanti Residence" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-500 cursor-zoom-in">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center pointer-events-none">
                    <span class="text-white font-semibold flex items-center gap-2 bg-black/50 px-4 py-2 rounded-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                        Perbesar Gambar
                    </span>
                </div>
            </a>
        </div>
        <p class="text-center text-sm text-gray-500 mt-4">Klik gambar denah di atas untuk melihat ukuran penuh.</p>
    </div>
    @endif
</div>
