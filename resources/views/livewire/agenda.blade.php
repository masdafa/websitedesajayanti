<div>
    <!-- Page Header -->
    <div class="hero-gradient pt-28 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute bottom-0 right-0 w-72 h-72 rounded-full bg-green-300 blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 text-green-300 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Jadwal
                </span>
                <h1 class="text-4xl md:text-5xl font-black text-white mb-4">Agenda Kegiatan</h1>
                <p class="text-green-300 text-lg max-w-xl mx-auto">Jadwal kegiatan dan acara di lingkungan Perumahan Jayanti Residence.</p>
            </div>
        </div>
    </div>

    <!-- Agenda Content -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Kegiatan Rutin -->
            <div data-aos="fade-up" class="mb-14">
                <div class="flex items-center gap-4 mb-6">
                    <h2 class="text-2xl font-black text-gray-900">Kegiatan Rutin Warga</h2>
                    <div class="h-px flex-1 bg-gray-200"></div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                    @forelse($routineActivities as $r)
                        <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm hover:border-green-300 transition-colors flex items-center gap-4">
                            <div class="bg-green-50 text-green-600 p-3 rounded-xl flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $r->icon }}"/></svg>
                            </div>
                            <h3 class="font-bold text-gray-800 text-sm leading-tight">{{ $r->title }}</h3>
                        </div>
                    @empty
                        <p class="text-gray-400 col-span-3 text-center">Belum ada kegiatan rutin.</p>
                    @endforelse
                </div>
            </div>

            <div class="flex items-center gap-4 mb-8">
                <h2 class="text-2xl font-black text-gray-900">Agenda Terjadwal</h2>
                <div class="h-px flex-1 bg-gray-200"></div>
            </div>
            @forelse($agendas as $month => $items)
                <div class="mb-10">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="h-px flex-1 bg-gray-200"></div>
                        <span class="text-green-700 font-black text-base uppercase tracking-widest bg-green-50 border border-green-200 px-4 py-1.5 rounded-full">
                            {{ \Carbon\Carbon::createFromFormat('Y-m', $month)->translatedFormat('F Y') }}
                        </span>
                        <div class="h-px flex-1 bg-gray-200"></div>
                    </div>

                    <div class="space-y-4">
                        @foreach($items as $agenda)
                            <div data-aos="fade-up" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 sm:p-6 flex flex-col sm:flex-row gap-5 hover:border-green-200 hover:shadow-md transition-all">
                                <!-- Date Badge -->
                                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-green-600 to-green-700 text-white rounded-2xl flex flex-col items-center justify-center shadow-md">
                                    <span class="text-xs font-bold uppercase leading-none">{{ $agenda->event_date->format('M') }}</span>
                                    <span class="text-2xl font-black leading-none mt-0.5">{{ $agenda->event_date->format('d') }}</span>
                                </div>
                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <span class="inline-block bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full mb-2">{{ $agenda->category }}</span>
                                            <h3 class="font-black text-gray-900 text-lg leading-snug">{{ $agenda->title }}</h3>
                                            @if($agenda->description)
                                                <p class="text-gray-500 text-sm mt-1.5">{{ $agenda->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-4 mt-3 text-xs text-gray-500">
                                        @if($agenda->event_time)
                                            <span class="flex items-center gap-1.5">
                                                <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                {{ \Carbon\Carbon::parse($agenda->event_time)->format('H:i') }} WIB
                                            </span>
                                        @endif
                                        @if($agenda->location)
                                            <span class="flex items-center gap-1.5">
                                                <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                {{ $agenda->location }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center py-20 text-gray-400">
                    <svg class="w-16 h-16 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <p class="font-semibold text-lg">Belum ada agenda kegiatan.</p>
                    <p class="text-sm mt-1">Agenda akan ditampilkan saat pengurus menambahkannya.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
