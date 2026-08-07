<x-admin-layout title="Edit Data Warga">
    <x-slot:breadcrumb>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.residents.index') }}" class="hover:text-gray-700">Data Warga</a>
            <span>/</span>
            <span>Edit</span>
        </div>
    </x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-3xl">
        <form action="{{ route('admin.residents.update', $resident) }}" method="POST" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Block -->
                <div>
                    <label for="block" class="block text-sm font-semibold text-gray-900 mb-2">Block / Rumah <span class="text-red-500">*</span></label>
                    <input type="text" name="block" id="block" value="{{ old('block', $resident->block) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                    @error('block')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- RT -->
                <div>
                    <label for="rt" class="block text-sm font-semibold text-gray-900 mb-2">RT</label>
                    <input type="text" name="rt" id="rt" value="{{ old('rt', $resident->rt) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                    @error('rt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Ayah -->
                <div>
                    <label for="nama_ayah" class="block text-sm font-semibold text-gray-900 mb-2">Nama Ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah', $resident->nama_ayah) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                    @error('nama_ayah')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Ibu -->
                <div>
                    <label for="nama_ibu" class="block text-sm font-semibold text-gray-900 mb-2">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu', $resident->nama_ibu) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                    @error('nama_ibu')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Anak 1-6 -->
                @for($i = 1; $i <= 6; $i++)
                @php $field = 'nama_anak_' . $i; @endphp
                <div>
                    <label for="{{ $field }}" class="block text-sm font-semibold text-gray-900 mb-2">Nama Anak {{ $i }}</label>
                    <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ old($field, $resident->$field) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                    @error($field)
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                @endfor

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-sm font-semibold text-gray-900 mb-2">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">{{ old('keterangan', $resident->keterangan) }}</textarea>
                    @error('keterangan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.residents.index') }}" class="px-6 py-3 text-sm font-semibold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 text-sm font-bold text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
