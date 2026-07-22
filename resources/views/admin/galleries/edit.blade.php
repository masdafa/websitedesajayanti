<x-admin-layout title="Edit Foto Galeri">
    <x-slot:breadcrumb>Ubah data foto galeri</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')

            <!-- Foto -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Foto Galeri</label>
                
                @if($gallery->image)
                    <div class="mb-4">
                        <div class="w-full sm:w-64 h-48 rounded-xl bg-gray-100 overflow-hidden border border-gray-200 shadow-sm">
                            <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/'.$gallery->image) }}" class="w-full h-full object-cover">
                        </div>
                        <p class="text-xs font-medium text-gray-500 mt-2">Foto saat ini. Biarkan kosong jika tidak ingin mengubah foto.</p>
                    </div>
                @endif

                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-xl cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-3 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Maksimal 3MB.</p>
                @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Judul -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Foto <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Masukkan judul foto">
                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi Singkat</label>
                <textarea name="description" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Opsional, tulis deskripsi singkat...">{{ old('description', $gallery->description) }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.galleries.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
