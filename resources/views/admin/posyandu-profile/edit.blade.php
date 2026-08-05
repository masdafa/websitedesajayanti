<x-admin-layout title="Profil Posyandu">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
            <h2 class="text-lg font-bold text-gray-900">Edit Profil Posyandu</h2>
            <p class="text-sm text-gray-500">Sesuaikan informasi profil Posyandu untuk ditampilkan pada halaman warga.</p>
        </div>

        <form action="{{ route('admin.posyandu-profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Profil</label>
                <input type="text" name="title" value="{{ old('title', $profile->title) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition" required>
                @error('title') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Isi Profil (Deskripsi, Visi, Misi, dll)</label>
                <textarea name="content" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition" required>{{ old('content', $profile->content) }}</textarea>
                @error('content') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar/Foto Gedung Posyandu (Opsional)</label>
                @if($profile->image)
                    <div class="mb-3">
                        <img src="{{ Storage::url($profile->image) }}" alt="Foto Posyandu" class="w-48 rounded-lg shadow-sm">
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
                <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto. Format: JPG/PNG, maks 2MB.</p>
                @error('image') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg font-medium transition shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
