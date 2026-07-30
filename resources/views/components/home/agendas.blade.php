@props(['upcomingAgendas'])

<!-- Agenda Terdekat -->
<div class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
            <div data-aos="fade-up">
                <span class="text-green-600 text-sm font-bold uppercase tracking-widest">Jadwal</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2 mb-3">Agenda Kegiatan</h2>
                <div class="w-16 h-1 bg-green-500 rounded-full"></div>
            </div>
            <a href="/agenda" wire:navigate class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition group">
                Lihat Semua <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        @if($upcomingAgendas->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($upcomingAgendas as $i => $agenda)
            <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}" class="bg-gray-50 rounded-2xl border border-gray-100 p-6 card-hover flex gap-4">
                <div class="flex-shrink-0 w-14 h-14 bg-green-600 text-white rounded-2xl flex flex-col items-center justify-center">
                    <span class="text-xs font-bold uppercase leading-none">{{ $agenda->event_date->format('M') }}</span>
                    <span class="text-2xl font-black leading-none">{{ $agenda->event_date->format('d') }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <span class="inline-block bg-green-100 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full mb-2">{{ $agenda->category }}</span>
                    <h3 class="font-bold text-gray-900 leading-snug line-clamp-2">{{ $agenda->title }}</h3>
                    @if($agenda->location)
                    <p class="text-xs text-gray-500 mt-1.5 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $agenda->location }}
                    </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12 text-gray-400 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
            Belum ada agenda kegiatan yang dijadwalkan.
        </div>
        @endif
    </div>
</div>
