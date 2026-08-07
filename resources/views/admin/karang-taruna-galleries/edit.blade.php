<x-admin-layout title="Edit Album Karang Taruna">
    <x-slot:breadcrumb>Kelola album foto dan dokumentasi kegiatan Karang Taruna</x-slot:breadcrumb>
    <div class="max-w-4xl mx-auto space-y-6">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-900">Edit Info Album</h2>
            </div>
            <form action="{{ route('admin.karang-taruna-galleries.update', $karang_taruna_gallery) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Album <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $karang_taruna_gallery->title) }}" required
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">
                        @error('title')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Dokumentasi</label>
                        <input type="date" name="published_date" value="{{ old('published_date', $karang_taruna_gallery->published_date ? \Carbon\Carbon::parse($karang_taruna_gallery->published_date)->format('Y-m-d') : '') }}"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">
                        @error('published_date')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi Singkat (Opsional)</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">{{ old('description', $karang_taruna_gallery->description) }}</textarea>
                    @error('description')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="bg-blue-50/50 p-6 rounded-xl border border-blue-100">
                    <label class="block text-sm font-bold text-blue-900 mb-2">Tambah Foto Baru (Opsional)</label>
                    <p class="text-xs text-blue-700 mb-4">Pilih foto untuk ditambahkan ke album ini. Bisa memilih lebih dari satu.</p>
                    <input type="file" name="images[]" accept="image/*" multiple
                        class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer bg-white border border-gray-200 rounded-lg p-2">
                    @error('images')<p class="text-sm text-red-600 mt-2 font-medium">{{ $message }}</p>@enderror
                    @error('images.*')<p class="text-sm text-red-600 mt-2 font-medium">{{ $message }}</p>@enderror
                </div>

                <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                    <a href="{{ route('admin.karang-taruna-galleries.index') }}" class="px-5 py-2.5 text-gray-600 bg-gray-100 hover:bg-gray-200 font-medium rounded-xl transition">Kembali</a>
                    <button type="submit" class="px-5 py-2.5 text-white bg-emerald-600 hover:bg-emerald-700 font-medium rounded-xl transition shadow-sm">Update Info & Tambah Foto</button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
                <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Daftar Foto dalam Album Ini ({{ count($karang_taruna_gallery->images ?? []) }})
                </h2>
            </div>
            
            <div class="p-6">
                @if(!empty($karang_taruna_gallery->images) && count($karang_taruna_gallery->images) > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($karang_taruna_gallery->images as $index => $image)
                            <div class="relative group rounded-xl overflow-hidden border border-gray-200 aspect-[4/3] bg-gray-50">
                                <img src="{{ Storage::url($image) }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <form action="{{ route('admin.karang-taruna-galleries.delete-image', $karang_taruna_gallery->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini secara permanen dari album?');">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="image" value="{{ $image }}">
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full transform hover:scale-110 transition shadow-lg" title="Hapus Foto">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <p class="text-gray-500 font-medium">Belum ada foto dalam album ini.</p>
                        <p class="text-sm text-gray-400">Silakan gunakan form di atas untuk menambahkan foto baru.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</x-admin-layout>
