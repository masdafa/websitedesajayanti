<x-admin-layout title="Tambah Kegiatan Karang Taruna">
    <x-slot:breadcrumb>Kelola jadwal dan informasi kegiatan Karang Taruna</x-slot:breadcrumb>
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
            <h2 class="text-lg font-bold text-gray-900">Tambah Kegiatan Baru</h2>
        </div>
        <form action="{{ route('admin.karang-taruna-activities.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Nama/Judul Kegiatan <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">
                @error('title')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Pelaksanaan</label>
                    <input type="date" name="date" value="{{ old('date') }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">
                    @error('date')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Lokasi / Tempat</label>
                    <input type="text" name="location" value="{{ old('location') }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">
                    @error('location')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi Kegiatan</label>
                <textarea name="description" rows="5"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">{{ old('description') }}</textarea>
                @error('description')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Poster / Foto Kegiatan (Opsional)</label>
                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
                <p class="text-xs text-gray-500 mt-1">Disarankan menggunakan rasio 16:9 atau persegi. Maksimal 2MB.</p>
                @error('image')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('admin.karang-taruna-activities.index') }}" class="px-5 py-2.5 text-gray-600 bg-gray-100 hover:bg-gray-200 font-medium rounded-xl transition">Batal</a>
                <button type="submit" class="px-5 py-2.5 text-white bg-emerald-600 hover:bg-emerald-700 font-medium rounded-xl transition">Simpan Kegiatan</button>
            </div>
        </form>
    </div>
</x-admin-layout>
