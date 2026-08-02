<x-admin-layout title="Pengaturan Website">
    <x-slot:breadcrumb>Kelola teks dan konten utama website perumahan</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-4xl">
        @if(session('success'))
            <div class="m-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl font-semibold text-sm">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="border-b border-gray-100 pb-4 mb-4">
                <h2 class="text-lg font-bold text-gray-800">Section Hero (Beranda)</h2>
                <p class="text-sm text-gray-500 mt-1">Teks yang tampil di bagian paling atas halaman beranda.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Hero / Sambutan</label>
                <input type="text" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Contoh: Selamat Datang di Jayanti Residence">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Subjudul / Deskripsi Hero</label>
                <textarea name="hero_subtitle" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Teks deskripsi di bawah judul hero...">{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Teks Pengumuman (Banner)</label>
                <input type="text" name="announcement" value="{{ old('announcement', $settings['announcement'] ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Contoh: Pengumuman: Kerja Bakti Rutin setiap Minggu pertama...">
                <p class="mt-1 text-xs text-gray-500">Kosongkan untuk menyembunyikan banner pengumuman.</p>
            </div>

            <div class="border-b border-gray-100 pb-4 mt-8 mb-2">
                <h2 class="text-lg font-bold text-gray-800">Section Profil Perumahan</h2>
                <p class="text-sm text-gray-500 mt-1">Teks yang tampil di halaman Profil.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Teks Profil / Sejarah Singkat</label>
                <textarea name="profil_text" rows="5"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Uraian singkat tentang perumahan...">{{ old('profil_text', $settings['profil_text'] ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Visi</label>
                <textarea name="visi_text" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Pernyataan visi perumahan...">{{ old('visi_text', $settings['visi_text'] ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Misi</label>
                <textarea name="misi_text" rows="5"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Pernyataan misi perumahan (pisahkan tiap poin dengan baris baru)...">{{ old('misi_text', $settings['misi_text'] ?? '') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Pisahkan tiap poin misi dengan Enter (baris baru).</p>
            </div>

            <div class="border-b border-gray-100 pb-4 mt-8 mb-2">
                <h2 class="text-lg font-bold text-gray-800">Section DKM Musholla</h2>
                <p class="text-sm text-gray-500 mt-1">Teks yang tampil di halaman DKM Musholla.</p>
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

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">URL Live Dakwah (Saluran Dakwah)</label>
                <input type="url" name="live_dakwah_url" value="{{ old('live_dakwah_url', $settings['live_dakwah_url'] ?? '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Contoh: https://youtube.com/...">
            </div>

            <div class="border-b border-gray-100 pb-4 mt-8 mb-2">
                <h2 class="text-lg font-bold text-gray-800">Section Peta & Denah</h2>
                <p class="text-sm text-gray-500 mt-1">Gambar denah yang tampil di Beranda dan Halaman Profil.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Gambar Denah Perumahan</label>
                @if(!empty($settings['housing_map_image']))
                    <div class="mb-4">
                        <img src="{{ Storage::url($settings['housing_map_image']) }}" alt="Denah Saat Ini" class="w-full max-w-sm rounded-lg border border-gray-200 shadow-sm">
                    </div>
                @endif
                <input type="file" name="housing_map_image" accept="image/jpeg,image/png,image/webp,image/jpg"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                <p class="mt-1 text-xs text-gray-500">Abaikan jika tidak ingin mengubah denah. Maksimal 5MB. Format: JPG, PNG, WEBP.</p>
            </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
