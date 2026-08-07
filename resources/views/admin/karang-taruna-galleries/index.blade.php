<x-admin-layout title="Dokumentasi Karang Taruna">
    <x-slot:breadcrumb>Kelola album foto dan dokumentasi kegiatan Karang Taruna</x-slot:breadcrumb>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        @if(session('success'))
            <div class="m-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl font-semibold text-sm">{{ session('success') }}</div>
        @endif
        <div class="p-4 sm:p-6 border-b border-gray-100 flex flex-col sm:flex-row gap-4 items-center justify-between">
            <h2 class="font-bold text-gray-800">Album Dokumentasi</h2>
            <a href="{{ route('admin.karang-taruna-galleries.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-5 rounded-xl transition flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Buat Album Baru
            </a>
        </div>
        
        <div class="p-4 sm:p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($galleries as $g)
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition group">
                    <div class="h-48 bg-gray-100 relative overflow-hidden">
                        @if(!empty($g->images) && count($g->images) > 0)
                            <img src="{{ Storage::url($g->images[0]) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @if(count($g->images) > 1)
                                <div class="absolute bottom-2 right-2 bg-black/70 text-white text-xs font-bold px-2 py-1 rounded-lg backdrop-blur-sm">
                                    +{{ count($g->images) - 1 }} Foto
                                </div>
                            @endif
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span class="text-xs font-medium">Kosong</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition"></div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 mb-1 line-clamp-1">{{ $g->title }}</h3>
                        <p class="text-xs text-gray-500 mb-4">{{ $g->published_date ? \Carbon\Carbon::parse($g->published_date)->translatedFormat('d F Y') : 'Tanpa Tanggal' }}</p>
                        
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-md">{{ count($g->images ?? []) }} Foto</span>
                            <div class="flex items-center gap-1">
                                <a href="{{ route('admin.karang-taruna-galleries.edit', $g) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </a>
                                <form action="{{ route('admin.karang-taruna-galleries.destroy', $g) }}" method="POST" onsubmit="return confirm('Hapus album ini beserta semua fotonya?')" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center border-2 border-dashed border-gray-200 rounded-2xl">
                    <div class="w-16 h-16 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <p class="text-gray-500 font-medium">Belum ada album dokumentasi.</p>
                    <p class="text-sm text-gray-400 mt-1">Klik tombol Buat Album Baru untuk mulai menambahkan foto.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>
