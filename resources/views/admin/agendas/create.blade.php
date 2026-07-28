@php $isEdit = isset($agenda); @endphp
<x-admin-layout title="{{ $isEdit ? 'Edit Agenda' : 'Tambah Agenda' }}">
    <x-slot:breadcrumb>{{ $isEdit ? 'Edit agenda kegiatan' : 'Tambah agenda kegiatan baru' }}</x-slot:breadcrumb>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
            <form action="{{ $isEdit ? route('admin.agendas.update', $agenda) : route('admin.agendas.store') }}" method="POST" class="space-y-5">
                @csrf
                @if($isEdit) @method('PUT') @endif

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Judul Agenda <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $agenda->title ?? '') }}" required
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-sm">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Tanggal <span class="text-red-500">*</span></label>
                        <input type="date" name="event_date" value="{{ old('event_date', isset($agenda) ? $agenda->event_date->format('Y-m-d') : '') }}" required
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Waktu</label>
                        <input type="time" name="event_time" value="{{ old('event_time', $agenda->event_time ?? '') }}"
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Kategori <span class="text-red-500">*</span></label>
                        <select name="category" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm bg-white">
                            @foreach(['Umum','Keagamaan','Olahraga','Sosial','Kebersihan','Keamanan','Rapat','Lainnya'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $agenda->category ?? 'Umum') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Lokasi</label>
                        <input type="text" name="location" value="{{ old('location', $agenda->location ?? '') }}" placeholder="Contoh: Balai Pertemuan"
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Deskripsi</label>
                    <textarea name="description" rows="4" placeholder="Keterangan tambahan..."
                              class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm resize-none">{{ old('description', $agenda->description ?? '') }}</textarea>
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $agenda->is_published ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500">
                    <label for="is_published" class="text-sm font-semibold text-gray-700">Tampilkan di website</label>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                        {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Agenda' }}
                    </button>
                    <a href="{{ route('admin.agendas.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2.5 px-6 rounded-xl transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
