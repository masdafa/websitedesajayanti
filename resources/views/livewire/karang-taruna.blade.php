<div class="min-h-screen bg-slate-50" x-data="{ tab: 'profil' }">
    <x-galeri.styles />
    <x-ui.page-hero 
        title="Karang Taruna Jayanti Residence" 
        subtitle="Wadah pembinaan dan pengembangan generasi muda."
        badge="Organisasi Pemuda"
        theme="emerald"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-2 flex flex-wrap gap-2 justify-center">
            <template x-for="item in [
                { id: 'profil', label: 'Profil' },
                { id: 'struktur', label: 'Struktur Organisasi' },
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

            <!-- Tab Struktur -->
            <div x-show="tab === 'struktur'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="pt-4">
                    @if($staffs->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($staffs as $staff)
                                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                                    <div class="h-48 bg-gray-100 relative group">
                                        @if($staff->image)
                                            <img src="{{ Storage::url($staff->image) }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-4xl font-bold text-emerald-300 bg-emerald-50">
                                                {{ substr($staff->name, 0, 1) }}
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                    <div class="p-5 text-center">
                                        <h3 class="font-bold text-gray-900 text-lg mb-1">{{ $staff->name }}</h3>
                                        <div class="text-emerald-600 text-sm font-semibold mb-2">{{ $staff->position }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-white shadow-sm text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Struktur Organisasi</h3>
                            <p class="text-gray-500 text-lg">Struktur organisasi Karang Taruna belum tersedia.</p>
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
                            <div class="bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-md hover:border-emerald-200 transition-all duration-300 group flex flex-col">
                                @if($activity->image)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ Storage::url($activity->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                @endif
                                <div class="p-6 flex-1 flex flex-col">
                                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $activity->title }}</h3>
                                    
                                    <div class="flex flex-col gap-2 mb-4">
                                        @if($activity->date)
                                        <div class="text-sm font-semibold text-emerald-600 flex items-center gap-2">
                                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            {{ \Carbon\Carbon::parse($activity->date)->translatedFormat('l, d F Y') }}
                                        </div>
                                        @endif
                                        @if($activity->location)
                                        <div class="text-sm text-gray-500 flex items-center gap-2">
                                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            {{ $activity->location }}
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <p class="text-gray-600 leading-relaxed mt-auto">{{ $activity->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-white shadow-sm text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Kegiatan</h3>
                            <p class="text-gray-500 text-lg">Informasi kegiatan Karang Taruna belum tersedia.</p>
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
