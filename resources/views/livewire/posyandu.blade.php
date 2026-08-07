<div class="min-h-screen bg-slate-50" x-data="{ tab: 'profil' }">
    <x-galeri.styles />
    <x-ui.page-hero 
        title="Posyandu Tulip 1" 
        subtitle="Pusat Pelayanan Keluarga Berencana dan Kesehatan Terpadu."
        badge="Posyandu"
        theme="emerald"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-2 flex flex-wrap gap-2 justify-center">
            <template x-for="item in [
                { id: 'profil', label: 'Profil Posyandu' },
                { id: 'kegiatan', label: 'Kegiatan' },
                { id: 'dokumentasi', label: 'Dokumentasi' }
            ]">
                <button @click="tab = item.id"
                        :class="tab === item.id ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600'"
                        class="px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200"
                        x-text="item.label"></button>
            </template>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Tab Profil -->
            <div x-show="tab === 'profil'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="pt-4">
                    @if($profile->image)
                        <div class="w-full h-64 sm:h-96 relative rounded-3xl overflow-hidden mb-8 shadow-sm">
                            <img src="{{ Storage::url($profile->image) }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-6 left-8 text-white">
                                <h2 class="text-3xl font-bold mb-2">{{ $profile->title }}</h2>
                            </div>
                        </div>
                        <div class="px-2">
                            <div class="prose max-w-none text-gray-600 leading-relaxed text-lg">
                                <p>{!! nl2br(e($profile->content)) !!}</p>
                            </div>
                        </div>
                    @else
                        <div class="px-2 py-4">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ $profile->title }}</h2>
                            <div class="prose max-w-none text-gray-600 leading-relaxed text-lg">
                                <p>{!! nl2br(e($profile->content)) !!}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tab Kegiatan -->
            <div x-show="tab === 'kegiatan'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="pt-4">
                    @if($activities->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($activities as $activity)
                            <div class="bg-white border border-gray-100 p-6 rounded-3xl shadow-sm hover:shadow-md hover:border-emerald-200 transition-all duration-300 group">
                                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    @if($activity->icon)
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $activity->icon }}"/></svg>
                                    @else
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $activity->title }}</h3>
                                <div class="text-sm font-semibold text-emerald-600 mb-3 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $activity->schedule }}
                                </div>
                                <p class="text-gray-600 leading-relaxed">{{ $activity->description }}</p>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-white shadow-sm text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Jadwal Kegiatan</h3>
                            <p class="text-gray-500 text-lg">Jadwal kegiatan Posyandu belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tab Dokumentasi -->
            <div x-show="tab === 'dokumentasi'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="pt-4">
                    <div class="flex flex-col sm:flex-row gap-4 items-center justify-end mb-6">
                        <select wire:model.live="selectedMonth" class="rounded-xl border-gray-200 text-gray-700 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white py-2.5 px-4 font-medium min-w-[150px]">
                            <option value="">Semua Bulan</option>
                            @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $index => $month)
                                <option value="{{ $index + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>
                        
                        <select wire:model.live="selectedYear" class="rounded-xl border-gray-200 text-gray-700 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white py-2.5 px-4 font-medium min-w-[150px]">
                            <option value="">Semua Tahun</option>
                            @foreach($availableYears as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="-mx-4 sm:-mx-6 lg:-mx-8 -my-16">
                        <x-galeri.grid :galleries="$galleries" />
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <x-galeri.lightbox />
    <x-galeri.scripts />
</div>
