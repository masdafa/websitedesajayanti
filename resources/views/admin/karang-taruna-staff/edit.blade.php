<x-admin-layout title="Edit Pengurus Karang Taruna">
    <x-slot:breadcrumb>Kelola susunan pengurus Karang Taruna</x-slot:breadcrumb>
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
            <h2 class="text-lg font-bold text-gray-900">Edit Pengurus Karang Taruna</h2>
        </div>
        <form action="{{ route('admin.karang-taruna-staff.update', $karang_taruna_staff) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf @method('PUT')
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $karang_taruna_staff->name) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">
                    @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Jabatan</label>
                    <input type="text" name="position" value="{{ old('position', $karang_taruna_staff->position) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">
                    @error('position')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Urutan Tampil</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $karang_taruna_staff->sort_order) }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 transition">
                @error('sort_order')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Foto / Profil (Opsional)</label>
                @if($karang_taruna_staff->image)
                    <div class="mb-3">
                        <img src="{{ Storage::url($karang_taruna_staff->image) }}" class="w-24 h-24 object-cover rounded-xl shadow-sm border border-gray-200">
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto.</p>
                @error('image')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('admin.karang-taruna-staff.index') }}" class="px-5 py-2.5 text-gray-600 bg-gray-100 hover:bg-gray-200 font-medium rounded-xl transition">Batal</a>
                <button type="submit" class="px-5 py-2.5 text-white bg-emerald-600 hover:bg-emerald-700 font-medium rounded-xl transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-admin-layout>
