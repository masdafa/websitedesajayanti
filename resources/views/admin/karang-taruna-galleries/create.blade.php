<x-admin-layout title="Buat Album Baru Karang Taruna">
    <x-slot:breadcrumb>Kelola album foto dan dokumentasi kegiatan Karang Taruna</x-slot:breadcrumb>
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
            <h2 class="text-lg font-bold text-gray-900">Buat Album Dokumentasi Baru</h2>
        </div>
        <form action="{{ route('admin.karang-taruna-galleries.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Album <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition" placeholder="Contoh: Kegiatan Bersih Desa 2024">
                    @error('title')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Dokumentasi</label>
                    <input type="date" name="published_date" value="{{ old('published_date', date('Y-m-d')) }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">
                    @error('published_date')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi Singkat (Opsional)</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition" placeholder="Tuliskan keterangan tentang kegiatan ini...">{{ old('description') }}</textarea>
                @error('description')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="bg-blue-50/50 p-6 rounded-xl border border-blue-100">
                <label class="block text-sm font-bold text-blue-900 mb-2">Upload Foto-foto <span class="text-red-500">*</span></label>
                <p class="text-xs text-blue-700 mb-4">Anda dapat memilih lebih dari satu foto sekaligus (Multiple upload). Format: JPG, PNG. Maksimal 2MB per foto.</p>
                <input type="file" name="images[]" accept="image/*" multiple required
                    class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer bg-white border border-gray-200 rounded-lg p-2">
                @error('images')<p class="text-sm text-red-600 mt-2 font-medium">{{ $message }}</p>@enderror
                @error('images.*')<p class="text-sm text-red-600 mt-2 font-medium">{{ $message }}</p>@enderror
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('admin.karang-taruna-galleries.index') }}" class="px-5 py-2.5 text-gray-600 bg-gray-100 hover:bg-gray-200 font-medium rounded-xl transition">Batal</a>
                <button type="submit" class="px-5 py-2.5 text-white bg-emerald-600 hover:bg-emerald-700 font-medium rounded-xl transition shadow-sm">Simpan Album</button>
            </div>
        </form>
    </div>
</x-admin-layout>
