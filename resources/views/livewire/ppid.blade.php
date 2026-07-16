<div>
    <!-- Hero Section -->
    <div class="relative py-28 px-6 sm:px-12 lg:px-24 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1568667256549-094345857637?w=1400&q=80" alt="Hero PPID" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-green-900/85 via-emerald-800/80 to-teal-900/85"></div>
        </div>
        <div class="relative max-w-7xl mx-auto z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight drop-shadow-lg">Transparansi Dokumen (PPID)</h1>
            <p class="text-xl text-green-100 max-w-3xl mx-auto leading-relaxed drop-shadow">
                Akses dokumen publik, peraturan desa, dan laporan secara transparan.
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        @if($documents->count() > 0)
            <div class="bg-white rounded-2xl shadow border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-green-50 border-b border-green-100">
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Judul Dokumen</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Kategori</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Tanggal Terbit</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($documents as $doc)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="font-semibold text-gray-900">{{ $doc->title }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($doc->category)
                                            <span class="inline-block px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">{{ $doc->category }}</span>
                                        @else
                                            <span class="text-gray-400 text-sm">-</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-gray-500 text-sm">
                                        {{ $doc->date_issued ? \Carbon\Carbon::parse($doc->date_issued)->translatedFormat('d F Y') : '-' }}
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        @if($doc->file_path)
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-lg text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                Unduh
                                            </a>
                                        @else
                                            <span class="text-gray-400 text-sm italic">File tidak tersedia</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada dokumen yang ditambahkan.</p>
            </div>
        @endif
    </div>
</div>
