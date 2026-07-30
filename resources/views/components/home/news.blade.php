@props(['latestPosts'])

<!-- Berita Terbaru -->
<div class="py-20 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
            <div data-aos="fade-up">
                <span class="text-green-600 text-sm font-bold uppercase tracking-widest">Informasi</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2 mb-3">Berita & Pengumuman</h2>
                <div class="w-16 h-1 bg-green-500 rounded-full"></div>
            </div>
            <a href="/berita" wire:navigate class="hidden sm:inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition group">
                Lihat Semua <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        <!-- Pengumuman Statik -->
        <div data-aos="fade-up" class="mb-10 bg-emerald-50 border-l-4 border-emerald-500 p-6 rounded-r-2xl shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
                <h3 class="text-lg font-bold text-emerald-900">Pengumuman: Kerja Bakti Bulanan</h3>
            </div>
            <div class="text-emerald-800 ml-9 space-y-1">
                <p><strong>Hari/Tanggal:</strong> Minggu, Setiap Awal Bulan</p>
                <p><strong>Waktu:</strong> 07.00 WIB</p>
                <p><strong>Lokasi:</strong> Seluruh Area Perumahan</p>
                <p class="mt-2 text-sm italic">Seluruh warga diharapkan berpartisipasi untuk menjaga kebersihan lingkungan.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($latestPosts as $post)
            <a data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
                href="{{ route('berita.detail', $post->slug) }}" wire:navigate
                class="bg-white rounded-2xl overflow-hidden border border-gray-100 card-hover group flex flex-col">
                <div class="h-48 overflow-hidden relative bg-gray-100">
                    @if(!empty($post->image))
                    <img src="{{ Str::startsWith($post->image, 'http') ? $post->image : asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center text-green-400">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    @endif
                    <div class="absolute top-3 left-3 bg-white/95 text-green-800 text-xs font-bold px-2.5 py-1 rounded-lg shadow">
                        {{ $post->created_at->format('d M Y') }}
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-black text-gray-900 text-base mb-2 group-hover:text-green-700 transition-colors line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-gray-500 text-sm line-clamp-3 flex-grow">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                    <div class="mt-4 flex items-center text-green-600 text-sm font-bold">
                        Baca Selengkapnya <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-3 text-center py-12 text-gray-400 bg-white rounded-2xl border border-dashed border-gray-200">
                Belum ada berita yang dipublikasikan.
            </div>
            @endforelse
        </div>
    </div>
</div>
