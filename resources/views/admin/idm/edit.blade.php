<x-admin-layout title="Edit Data IDM">
    <x-slot:breadcrumb>Ubah rekap data Indeks Desa Membangun</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-4xl">
        <form action="{{ route('admin.idm.update', $idm) }}" method="POST" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Tahun -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" name="year" value="{{ old('year', $idm->year) }}" required min="2000" max="2100"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: 2024">
                    @error('year') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Status Desa -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Status Desa <span class="text-red-500">*</span></label>
                    <select name="status" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                        <option value="">Pilih Status</option>
                        @foreach(['Mandiri', 'Maju', 'Berkembang', 'Tertinggal', 'Sangat Tertinggal'] as $status)
                            <option value="{{ $status }}" {{ old('status', $idm->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Skor IDM -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Skor IDM Total <span class="text-red-500">*</span></label>
                    <input type="number" step="0.0001" name="score" value="{{ old('score', $idm->score) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: 0.7890">
                    @error('score') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <hr class="border-gray-100">

            <h3 class="font-bold text-gray-900 text-lg">Rincian Indeks</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Indeks Sosial -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Indeks Ketahanan Sosial (IKS) <span class="text-red-500">*</span></label>
                    <input type="number" step="0.0001" name="social_index" value="{{ old('social_index', $idm->social_index) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: 0.8500">
                    @error('social_index') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Indeks Ekonomi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Indeks Ketahanan Ekonomi (IKE) <span class="text-red-500">*</span></label>
                    <input type="number" step="0.0001" name="economic_index" value="{{ old('economic_index', $idm->economic_index) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: 0.7500">
                    @error('economic_index') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Indeks Lingkungan -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Indeks Ketahanan Lingkungan (IKL) <span class="text-red-500">*</span></label>
                    <input type="number" step="0.0001" name="environmental_index" value="{{ old('environmental_index', $idm->environmental_index) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: 0.8000">
                    @error('environmental_index') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.idm.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
