<x-admin-layout title="Galeri Foto">
    <x-slot:breadcrumb>Kelola foto-foto galeri desa</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-gray-100 flex flex-col sm:flex-row gap-4 items-center justify-between">
            <form method="GET" action="{{ route('admin.galleries.index') }}" class="w-full sm:max-w-md flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul galeri..." 
                    class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-2.5">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2.5 rounded-xl hover:bg-gray-900 transition">Cari</button>
            </form>
            
            <a href="{{ route('admin.galleries.create') }}" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold py-2.5 px-5 rounded-xl transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Foto
            </a>
        </div>

        <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 bg-gray-50/50">
            @forelse($galleries as $gallery)
                <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition group">
                    <div class="aspect-w-4 aspect-h-3 bg-gray-100 relative">
                        @if($gallery->image)
                            <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/'.$gallery->image) }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 flex items-center justify-center text-gray-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                        
                        <!-- Actions overlay -->
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-3 backdrop-blur-sm">
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="bg-white text-blue-600 p-2 rounded-lg hover:scale-110 transition shadow-lg" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            </a>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-white text-red-600 p-2 rounded-lg hover:scale-110 transition shadow-lg" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="p-4 border-t border-gray-100">
                        <h3 class="font-bold text-gray-900 truncate" title="{{ $gallery->title }}">{{ $gallery->title }}</h3>
                        <p class="text-xs text-gray-500 mt-1 truncate" title="{{ $gallery->description }}">{{ $gallery->description ?: 'Tidak ada deskripsi' }}</p>
                        <p class="text-[10px] text-gray-400 mt-3 font-medium uppercase tracking-wider">{{ $gallery->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-gray-500 bg-white rounded-2xl border border-gray-200">
                    Belum ada foto di galeri.
                </div>
            @endforelse
        </div>

        @if($galleries->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
