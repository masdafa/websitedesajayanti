<x-admin-layout title="Tambah Kegiatan Rutin">
    <x-slot:breadcrumb>Tambah kegiatan rutin warga baru</x-slot:breadcrumb>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <form action="{{ route('admin.routine-activities.store') }}" method="POST" class="p-6 sm:p-8 space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Kegiatan <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Contoh: Kerja Bakti Lingkungan">
                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <input type="hidden" name="icon" value='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'>
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">No. Urut Tampil</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
            </div>
            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">Simpan</button>
                <a href="{{ route('admin.routine-activities.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">Batal</a>
            </div>
        </form>
    </div>
</x-admin-layout>
