<div wire:poll.5s>
    <x-ui.page-hero 
        title="Berita & Pengumuman" 
        subtitle="Informasi, berita terbaru, dan pengumuman resmi Perumahan Jayanti Residence."
        badge="Publikasi"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="bg-gray-50 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            {{-- Filter & Search --}}
            <div class="mb-8 max-w-3xl mx-auto flex flex-col md:flex-row gap-3">
                <div class="relative flex-1">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input
                        wire:model.live.debounce.400ms="search"
                        type="text"
                        placeholder="Cari berita atau pengumuman..."
                        class="w-full pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-2xl shadow-sm text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent"
                    >
                </div>
                <div class="flex gap-3">
                    <select wire:model.live="month" class="w-full md:w-40 px-4 py-3 bg-white border border-gray-200 rounded-2xl shadow-sm text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent">
                        <option value="">Semua Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <select wire:model.live="year" class="w-full md:w-36 px-4 py-3 bg-white border border-gray-200 rounded-2xl shadow-sm text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent">
                        <option value="">Semua Tahun</option>
                        @php
                            $currentYear = date('Y');
                            $startYear = 2023; // Start from the year the web might have been created
                        @endphp
                        @for($y = $currentYear; $y >= $startYear; $y--)
                            <option value="{{ $y }}">{{ $y }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            {{-- Tab Filter --}}
            <div class="flex items-center justify-center gap-2 mb-8 flex-wrap">
                <button wire:click="setTab('semua')"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200
                        {{ $activeTab === 'semua'
                            ? 'bg-gray-900 text-white shadow-md'
                            : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:border-gray-300' }}">
                    Semua
                    <span class="text-xs font-bold px-2 py-0.5 rounded-full {{ $activeTab === 'semua' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500' }}">
                        {{ $totalBerita + $totalPengumuman }}
                    </span>
                </button>

                <button wire:click="setTab('berita')"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200
                        {{ $activeTab === 'berita'
                            ? 'bg-emerald-600 text-white shadow-md'
                            : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:border-gray-300' }}">
                    Berita
                    <span class="text-xs font-bold px-2 py-0.5 rounded-full {{ $activeTab === 'berita' ? 'bg-white/20 text-white' : 'bg-emerald-50 text-emerald-700' }}">
                        {{ $totalBerita }}
                    </span>
                </button>

                <button wire:click="setTab('pengumuman')"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200
                        {{ $activeTab === 'pengumuman'
                            ? 'bg-orange-500 text-white shadow-md'
                            : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:border-gray-300' }}">
                    Pengumuman
                    <span class="text-xs font-bold px-2 py-0.5 rounded-full {{ $activeTab === 'pengumuman' ? 'bg-white/20 text-white' : 'bg-orange-50 text-orange-600' }}">
                        {{ $totalPengumuman }}
                    </span>
                </button>
            </div>

            {{-- Grid --}}
            <div wire:loading.class="opacity-50 transition-opacity" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($posts as $post)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all group flex flex-col h-full">
                        {{-- Gambar --}}
                        <div class="h-48 bg-gray-100 overflow-hidden relative flex-shrink-0">
                            @if((!empty($post->images) ? $post->images[0] : null))
                                <img src="{{ Str::startsWith((!empty($post->images) ? $post->images[0] : null), 'http') ? (!empty($post->images) ? $post->images[0] : null) : asset('storage/'.(!empty($post->images) ? $post->images[0] : null)) }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full {{ $post->type === 'pengumuman' ? 'bg-orange-50' : 'bg-emerald-50' }} flex items-center justify-center">
                                    @if($post->type === 'pengumuman')
                                        <svg class="w-14 h-14 text-orange-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                                    @else
                                        <svg class="w-14 h-14 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                    @endif
                                </div>
                            @endif

                            {{-- Type badge --}}
                            <div class="absolute top-3 left-3">
                                @if($post->type === 'pengumuman')
                                    <span class="bg-orange-500 text-white text-xs font-bold px-2.5 py-1 rounded-lg shadow">
                                        Pengumuman
                                    </span>
                                @else
                                    <span class="bg-emerald-600 text-white text-xs font-bold px-2.5 py-1 rounded-lg shadow">
                                        Berita
                                    </span>
                                @endif
                            </div>

                            {{-- Tanggal --}}
                            <div class="absolute bottom-3 right-3 bg-black/50 backdrop-blur-sm text-white text-xs font-semibold px-2.5 py-1 rounded-lg">
                                {{ $post->created_at->format('d M Y') }}
                            </div>
                        </div>

                        {{-- Konten --}}
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-base font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors line-clamp-2 leading-snug">
                                {{ $post->title }}
                            </h3>
                            <p class="text-gray-500 text-sm line-clamp-3 mb-4 flex-grow leading-relaxed">
                                {{ Str::limit(strip_tags($post->content), 110) }}
                            </p>
                            <a href="{{ route('berita.detail', $post->slug) }}" wire:navigate
                               class="inline-flex items-center gap-1.5 text-sm font-semibold {{ $post->type === 'pengumuman' ? 'text-orange-500 hover:text-orange-600' : 'text-emerald-600 hover:text-emerald-700' }} transition-colors">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center text-gray-400 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-700">Tidak ada konten ditemukan</h3>
                        <p class="text-gray-400 text-sm mt-1">Coba ganti filter atau kata kunci pencarian.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-10">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
