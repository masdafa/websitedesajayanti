<x-admin-layout title="Pengaturan DKM">
    <x-slot:breadcrumb>Kelola profil dan saluran dakwah DKM Al-Muqimin</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-4xl">
        @if(session('success'))
            <div class="m-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl font-semibold text-sm">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('admin.dkm-settings.update') }}" method="POST" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="border-b border-gray-100 pb-4 mb-4">
                <h2 class="text-lg font-bold text-gray-800">Section Profil DKM</h2>
                <p class="text-sm text-gray-500 mt-1">Teks yang tampil di halaman profil DKM.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Teks Profil DKM</label>
                <textarea name="dkm_profile_text" rows="5"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Uraian singkat tentang profil DKM...">{{ old('dkm_profile_text', $settings['dkm_profile_text'] ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Visi & Misi DKM</label>
                <textarea name="dkm_vision_text" rows="5"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Visi dan misi DKM...">{{ old('dkm_vision_text', $settings['dkm_vision_text'] ?? '') }}</textarea>
            </div>

            <div class="border-b border-gray-100 pb-4 mt-8 mb-2">
                <h2 class="text-lg font-bold text-gray-800">Saluran Dakwah (Live)</h2>
                <p class="text-sm text-gray-500 mt-1">Masukkan maksimal 4 link YouTube Live.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">URL Live Dakwah 1</label>
                    <input type="url" name="live_dakwah_url" value="{{ old('live_dakwah_url', $settings['live_dakwah_url'] ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: https://youtube.com/...">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">URL Live Dakwah 2</label>
                    <input type="url" name="live_dakwah_url_2" value="{{ old('live_dakwah_url_2', $settings['live_dakwah_url_2'] ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Kosongkan jika tidak ada">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">URL Live Dakwah 3</label>
                    <input type="url" name="live_dakwah_url_3" value="{{ old('live_dakwah_url_3', $settings['live_dakwah_url_3'] ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Kosongkan jika tidak ada">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">URL Live Dakwah 4</label>
                    <input type="url" name="live_dakwah_url_4" value="{{ old('live_dakwah_url_4', $settings['live_dakwah_url_4'] ?? '') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Kosongkan jika tidak ada">
                </div>
            </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
