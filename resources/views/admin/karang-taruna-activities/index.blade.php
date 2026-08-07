<x-admin-layout title="Kegiatan Karang Taruna">
    <x-slot:breadcrumb>Kelola jadwal dan informasi kegiatan Karang Taruna</x-slot:breadcrumb>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        @if(session('success'))
            <div class="m-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl font-semibold text-sm">{{ session('success') }}</div>
        @endif
        <div class="p-4 sm:p-6 border-b border-gray-100 flex flex-col sm:flex-row gap-4 items-center justify-between">
            <h2 class="font-bold text-gray-800">Daftar Kegiatan</h2>
            <a href="{{ route('admin.karang-taruna-activities.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-5 rounded-xl transition flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Kegiatan
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4">Informasi Kegiatan</th>
                        <th class="px-6 py-4">Tanggal & Waktu</th>
                        <th class="px-6 py-4">Lokasi</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($activities as $a)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if($a->image)
                                        <img src="{{ Storage::url($a->image) }}" class="w-16 h-16 rounded-lg object-cover border border-gray-200 shadow-sm">
                                    @else
                                        <div class="w-16 h-16 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-500 border border-emerald-100">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-bold text-gray-900 text-base mb-1">{{ $a->title }}</div>
                                        <div class="text-xs text-gray-500 truncate max-w-xs">{{ Str::limit($a->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-700">
                                {{ $a->date ? \Carbon\Carbon::parse($a->date)->translatedFormat('d F Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-700">{{ $a->location ?? '-' }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.karang-taruna-activities.edit', $a) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.karang-taruna-activities.destroy', $a) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-12 text-center text-gray-400">Belum ada data kegiatan Karang Taruna.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
