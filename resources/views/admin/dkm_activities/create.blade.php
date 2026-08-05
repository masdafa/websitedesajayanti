<x-admin-layout title="Tambah Kegiatan DKM">
    <x-slot:breadcrumb>Tambah Kegiatan DKM warga baru</x-slot:breadcrumb>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <form action="{{ route('admin.dkm-activities.store') }}" method="POST" class="p-6 sm:p-8 space-y-5">
            @csrf
            <div>
                <input type="hidden" name="icon" value='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'>

                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Kegiatan</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm transition duration-150">
                    @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jadwal (Contoh: Setiap Ba'da Subuh)</label>
                    <input type="text" name="schedule" value="{{ old('schedule') }}" required
                        class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm transition duration-150">
                    @error('schedule') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ikon (SVG atau Teks/Emoji)</label>
                    <input type="text" name="icon" value="{{ old('icon') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm transition duration-150"
                        placeholder='<svg>...</svg>'>
                    <p class="text-xs text-gray-500 mt-1">Gunakan kode SVG (contoh dari Heroicons) atau emoji.</p>
                    @error('icon') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm transition duration-150">{{ old('description') }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">Simpan</button>
                <a href="{{ route('admin.dkm-activities.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">Batal</a>
            </div>
        </form>
    </div>
</x-admin-layout>
