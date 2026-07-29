<div class="bg-gray-50 min-h-screen pb-16">
    <!-- Header -->
    <div class="relative bg-emerald-900 pt-32 pb-20">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1542224566-6e85f2e6772f?q=80&w=2000&auto=format&fit=crop" alt="Profil Perumahan" class="w-full h-full object-cover opacity-40">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4 text-white drop-shadow-md">Profil Jayanti Residence</h1>
            <p class="text-emerald-50 max-w-2xl mx-auto text-lg drop-shadow">Mengenal lebih dekat sejarah, visi misi, dan susunan pengurus Perumahan Jayanti Residence.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
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

            <!-- Sidebar / Peta -->
            <div class="space-y-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        Lokasi Perumahan
                    </h3>
                    <div class="w-full bg-gray-200 rounded-xl overflow-hidden mb-3">
                        <iframe
                            src="https://maps.google.com/maps?q=Jayanti,+Tangerang&t=&z=16&ie=UTF8&iwloc=&output=embed"
                            width="100%"
                            height="280"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="flex items-start gap-2 text-sm text-gray-600 mb-3">
                        <svg class="w-4 h-4 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        <span>Kec. Jayanti, Kabupaten Tangerang, Provinsi Banten 15610</span>
                    </div>
                    <a href="https://maps.google.com/?q=Jayanti,+Tangerang+Regency,+Banten" target="_blank"
                       class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-green-700 hover:bg-green-800 text-white text-sm font-medium rounded-xl transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>


    </div>
</div>
