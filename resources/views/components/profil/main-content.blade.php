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
</div>
