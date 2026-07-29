<x-admin-layout title="Edit Layanan Warga">
    <x-slot:breadcrumb>Perbarui data layanan warga</x-slot:breadcrumb>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <form action="{{ route('admin.service-infos.update', $serviceInfo) }}" method="POST" class="p-6 sm:p-8 space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Layanan <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $serviceInfo->title) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="description" rows="3" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">{{ old('description', $serviceInfo->description) }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Ikon (SVG Path) <span class="text-red-500">*</span></label>
                <textarea name="icon" rows="3" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3 font-mono">{{ old('icon', $serviceInfo->icon) }}</textarea>
                @error('icon') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Warna Tema <span class="text-red-500">*</span></label>
                <select name="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                    @foreach(['blue' => 'Biru', 'green' => 'Hijau', 'red' => 'Merah', 'amber' => 'Kuning'] as $val => $label)
                        <option value="{{ $val }}" {{ old('color', $serviceInfo->color) == $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">No. Urut Tampil</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $serviceInfo->sort_order) }}" min="0"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
            </div>
            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">Perbarui</button>
                <a href="{{ route('admin.service-infos.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">Batal</a>
            </div>
        </form>
    </div>
</x-admin-layout>
