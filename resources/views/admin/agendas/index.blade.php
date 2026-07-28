<x-admin-layout title="Kelola Agenda">
    <x-slot:breadcrumb>Kelola jadwal kegiatan perumahan</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-gray-100 flex flex-col sm:flex-row gap-4 items-center justify-between">
            <form method="GET" action="{{ route('admin.agendas.index') }}" class="w-full sm:max-w-md flex gap-2">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari agenda..."
                    class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-2.5">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2.5 rounded-xl hover:bg-gray-900 transition">Cari</button>
            </form>
            <a href="{{ route('admin.agendas.create') }}" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-5 rounded-xl transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Agenda
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 font-bold">Tanggal</th>
                        <th class="px-6 py-4 font-bold">Judul Agenda</th>
                        <th class="px-6 py-4 font-bold">Kategori</th>
                        <th class="px-6 py-4 font-bold">Lokasi</th>
                        <th class="px-6 py-4 font-bold">Status</th>
                        <th class="px-6 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($agendas as $agenda)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-bold text-emerald-700 whitespace-nowrap">
                                {{ $agenda->event_date->format('d M Y') }}
                                @if($agenda->event_time)
                                    <div class="text-xs text-gray-400 font-normal">{{ \Carbon\Carbon::parse($agenda->event_time)->format('H:i') }} WIB</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $agenda->title }}</td>
                            <td class="px-6 py-4"><span class="bg-emerald-100 text-emerald-700 font-bold px-3 py-1 rounded-full text-xs">{{ $agenda->category }}</span></td>
                            <td class="px-6 py-4 text-gray-500">{{ $agenda->location ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $agenda->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-600' }}">
                                    {{ $agenda->is_published ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.agendas.edit', $agenda) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.agendas.destroy', $agenda) }}" method="POST" onsubmit="return confirm('Hapus agenda ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada agenda.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($agendas->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">{{ $agendas->links() }}</div>
        @endif
    </div>
</x-admin-layout>
