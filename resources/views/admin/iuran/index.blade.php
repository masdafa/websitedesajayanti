<x-admin-layout title="Informasi Iuran Warga">
    <x-slot:breadcrumb>Kelola informasi iuran untuk warga</x-slot:breadcrumb>

    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.iuran.create') }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl shadow-md shadow-emerald-500/20 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            Tambah Info Iuran
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 border-b border-gray-200 text-gray-600 font-bold">
                    <tr>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Info Iuran</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Nominal</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($iurans as $iuran)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900">{{ $iuran->title }}</div>
                            <div class="text-xs text-gray-500 mt-1 line-clamp-1">{{ $iuran->description }}</div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-emerald-600">
                            {{ $iuran->amount ? 'Rp ' . number_format($iuran->amount, 0, ',', '.') : '-' }}
                        </td>
                        <td class="px-6 py-4">
                            @if($iuran->is_active)
                                <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Aktif</span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs font-bold px-3 py-1 rounded-full">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.iuran.edit', $iuran) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form action="{{ route('admin.iuran.destroy', $iuran) }}" method="POST" onsubmit="return confirm('Hapus informasi iuran ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            Belum ada informasi iuran yang ditambahkan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
