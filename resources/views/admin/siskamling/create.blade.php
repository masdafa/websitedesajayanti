<x-admin-layout title="Tambah Jadwal Siskamling">
    <x-slot:breadcrumb>Tambah jadwal ronda malam baru</x-slot:breadcrumb>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <form action="{{ route('admin.siskamling.store') }}" method="POST" class="p-6 sm:p-8 space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Hari <span class="text-red-500">*</span></label>
                <input type="text" name="day" value="{{ old('day') }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Contoh: Senin">
                @error('day') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Anggota Ronda <span class="text-red-500">*</span></label>
                <textarea name="members" rows="3" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Contoh: Budi, Anto, Samsul">{{ old('members') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Pisahkan tiap nama dengan koma atau Enter.</p>
                @error('members') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">No. Urut Tampil</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
            </div>
            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">Simpan</button>
                <a href="{{ route('admin.siskamling.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">Batal</a>
            </div>
        </form>
    </div>
</x-admin-layout>
