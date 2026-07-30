<x-admin-layout title="Tambah Info Iuran">
    <x-slot:breadcrumb>
        <a href="{{ route('admin.iuran.index') }}" class="text-emerald-600 hover:text-emerald-700">Info Iuran</a>
        <span class="mx-2">/</span> Tambah
    </x-slot:breadcrumb>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden max-w-3xl">
        <div class="p-6">
            <form action="{{ route('admin.iuran.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Info Iuran <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition" placeholder="Misal: Iuran Keamanan Bulan Juli, Iuran Sampah Bulanan">
                    @error('title') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Nominal Iuran (Opsional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-gray-500 font-semibold">Rp</span>
                        </div>
                        <input type="number" name="amount" value="{{ old('amount') }}" class="w-full pl-12 rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition" placeholder="Contoh: 50000">
                    </div>
                    @error('amount') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi / Penjelasan <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="5" required class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition" placeholder="Jelaskan mengenai iuran ini, misalnya ke rekening mana harus ditransfer atau kepada siapa harus diserahkan...">{{ old('description') }}</textarea>
                    @error('description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Urutan Tampil (Sort Order)</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition" placeholder="0">
                        <p class="text-xs text-gray-500 mt-1">Angka lebih kecil tampil lebih dulu.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Status Aktif</label>
                        <label class="inline-flex items-center mt-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" class="rounded border-gray-300 text-emerald-600 shadow-sm focus:border-emerald-300 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 w-5 h-5" {{ old('is_active', true) ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Tampilkan di Website</span>
                        </label>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100">
                    <a href="{{ route('admin.iuran.index') }}" class="px-5 py-2.5 text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl font-semibold transition">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl shadow-md shadow-emerald-500/20 transition">
                        Simpan Informasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
