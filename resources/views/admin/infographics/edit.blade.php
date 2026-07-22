<x-admin-layout title="Edit Infografis">
    <x-slot:breadcrumb>Ubah data infografis atau statistik desa</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <form action="{{ route('admin.infographics.update', $infographic) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')

            <!-- Foto -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Gambar Infografis</label>
                
                @if($infographic->image)
                    <div class="mb-4 flex items-start gap-4">
                        <div class="w-32 rounded-lg bg-gray-100 overflow-hidden border border-gray-200 shadow-sm">
                            <img src="{{ Str::startsWith($infographic->image, 'http') ? $infographic->image : asset('storage/'.$infographic->image) }}" class="w-full object-cover">
                        </div>
                        <div class="text-xs text-gray-500 pt-1">
                            <p class="font-medium text-gray-700 mb-1">Gambar saat ini</p>
                            <p>Upload gambar baru untuk mengganti gambar ini.</p>
                        </div>
                    </div>
                @endif

                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-xl cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-3 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Maksimal 5MB.</p>
                @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Judul -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Infografis <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $infographic->title) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: Statistik Penduduk 2024">
                    @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="category" value="{{ old('category', $infographic->category) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: Kependudukan">
                    @error('category') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Keterangan Singkat</label>
                <textarea name="description" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Opsional, keterangan tambahan...">{{ old('description', $infographic->description) }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.infographics.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
