<x-admin-layout title="Tambah Data Warga">
    <x-slot:breadcrumb>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.residents.index') }}" class="hover:text-gray-700">Data Warga</a>
            <span>/</span>
            <span>Tambah</span>
        </div>
    </x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-3xl">
        <form action="{{ route('admin.residents.store') }}" method="POST" class="p-6 sm:p-8 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div class="md:col-span-2">
                    <label for="nama_lengkap" class="block text-sm font-semibold text-gray-900 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: Budi Santoso">
                    @error('nama_lengkap')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIK -->
                <div>
                    <label for="nik" class="block text-sm font-semibold text-gray-900 mb-2">NIK</label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Nomor Induk Kependudukan">
                    @error('nik')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No KK -->
                <div>
                    <label for="no_kk" class="block text-sm font-semibold text-gray-900 mb-2">Nomor KK</label>
                    <input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Nomor Kartu Keluarga">
                    @error('no_kk')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Blok / Rumah -->
                <div>
                    <label for="blok_rumah" class="block text-sm font-semibold text-gray-900 mb-2">Blok / Nomor Rumah</label>
                    <input type="text" name="blok_rumah" id="blok_rumah" value="{{ old('blok_rumah') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: A1/No 12">
                    @error('blok_rumah')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- No HP -->
                <div>
                    <label for="no_hp" class="block text-sm font-semibold text-gray-900 mb-2">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: 0812xxxxxx">
                    @error('no_hp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Warga -->
                <div>
                    <label for="status_warga" class="block text-sm font-semibold text-gray-900 mb-2">Status Warga</label>
                    <select name="status_warga" id="status_warga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                        <option value="">-- Pilih Status --</option>
                        <option value="Pemilik" {{ old('status_warga') == 'Pemilik' ? 'selected' : '' }}>Pemilik</option>
                        <option value="Penyewa" {{ old('status_warga') == 'Penyewa' ? 'selected' : '' }}>Penyewa / Kontrak</option>
                        <option value="Keluarga Pemilik" {{ old('status_warga') == 'Keluarga Pemilik' ? 'selected' : '' }}>Keluarga Pemilik</option>
                    </select>
                    @error('status_warga')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Agama -->
                <div>
                    <label for="agama" class="block text-sm font-semibold text-gray-900 mb-2">Agama</label>
                    <input type="text" name="agama" id="agama" value="{{ old('agama') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Agama">
                    @error('agama')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pekerjaan -->
                <div class="md:col-span-2">
                    <label for="pekerjaan" class="block text-sm font-semibold text-gray-900 mb-2">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Pekerjaan">
                    @error('pekerjaan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.residents.index') }}" class="px-6 py-3 text-sm font-semibold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 text-sm font-bold text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 transition">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
