<x-admin-layout title="Dashboard">
    <x-slot:breadcrumb>Selamat datang di panel admin Desa Jayanti</x-slot:breadcrumb>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        @php
            $cards = [
                ['label' => 'Berita', 'value' => $stats['posts'], 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z', 'color' => 'emerald', 'route' => 'admin.posts.index'],
                ['label' => 'Galeri', 'value' => $stats['galleries'], 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z', 'color' => 'blue', 'route' => 'admin.galleries.index'],
                ['label' => 'Perangkat', 'value' => $stats['staff'], 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'color' => 'violet', 'route' => 'admin.staff.index'],
                ['label' => 'Produk', 'value' => $stats['products'], 'icon' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z', 'color' => 'orange', 'route' => 'admin.products.index'],
                ['label' => 'Listing', 'value' => $stats['listings'], 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'color' => 'teal', 'route' => 'admin.listings.index'],
                ['label' => 'Infografis', 'value' => $stats['infographics'], 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'color' => 'cyan', 'route' => 'admin.infographics.index'],
                ['label' => 'Data IDM', 'value' => $stats['idm'], 'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', 'color' => 'indigo', 'route' => 'admin.idm.index'],
                ['label' => 'Dokumen', 'value' => $stats['documents'], 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'rose', 'route' => 'admin.documents.index'],
            ];
            $colorMap = [
                'emerald' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                'blue'    => 'bg-blue-50 text-blue-700 border-blue-200',
                'violet'  => 'bg-violet-50 text-violet-700 border-violet-200',
                'orange'  => 'bg-orange-50 text-orange-700 border-orange-200',
                'teal'    => 'bg-teal-50 text-teal-700 border-teal-200',
                'cyan'    => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                'indigo'  => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                'rose'    => 'bg-rose-50 text-rose-700 border-rose-200',
            ];
        @endphp
        @foreach($cards as $card)
            <a href="{{ route($card['route']) }}" class="bg-white rounded-2xl border {{ $colorMap[$card['color']] }} p-5 flex items-center gap-4 hover:shadow-lg transition-all group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center {{ $colorMap[$card['color']] }} flex-shrink-0 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/>
                    </svg>
                </div>
                <div>
                    <div class="text-2xl font-black text-gray-900">{{ $card['value'] }}</div>
                    <div class="text-xs font-medium text-gray-500 mt-0.5">{{ $card['label'] }}</div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Latest Posts -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h2 class="font-bold text-gray-900">Berita Terbaru</h2>
            <a href="{{ route('admin.posts.create') }}" class="text-xs bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-4 py-2 rounded-lg transition">+ Tambah</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($latestPosts as $post)
                <div class="flex items-center gap-4 px-6 py-4 hover:bg-gray-50 transition">
                    <div class="w-12 h-12 rounded-xl bg-gray-100 overflow-hidden flex-shrink-0">
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-sm text-gray-900 truncate">{{ $post->title }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">{{ $post->created_at->format('d M Y') }}</div>
                    </div>
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $post->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-600' }}">
                        {{ $post->is_published ? 'Publikasi' : 'Draft' }}
                    </span>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-gray-400 hover:text-emerald-600 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </a>
                </div>
            @empty
                <div class="px-6 py-12 text-center text-gray-400 text-sm">Belum ada berita.</div>
            @endforelse
        </div>
    </div>
</x-admin-layout>
