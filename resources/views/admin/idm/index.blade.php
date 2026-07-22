<x-admin-layout title="Data IDM (Indeks Desa Membangun)">
    <x-slot:breadcrumb>Kelola data status Indeks Desa Membangun</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-gray-100 flex flex-col sm:flex-row gap-4 items-center justify-between">
            <form method="GET" action="{{ route('admin.idm.index') }}" class="w-full sm:max-w-md flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan tahun..." 
                    class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-2.5">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2.5 rounded-xl hover:bg-gray-900 transition">Cari</button>
            </form>
            
            <a href="{{ route('admin.idm.create') }}" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold py-2.5 px-5 rounded-xl transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Data IDM
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold text-center w-24">Tahun</th>
                        <th scope="col" class="px-6 py-4 font-bold">Status Desa</th>
                        <th scope="col" class="px-6 py-4 font-bold text-center">Skor IDM</th>
                        <th scope="col" class="px-6 py-4 font-bold text-center">Indeks Sosial</th>
                        <th scope="col" class="px-6 py-4 font-bold text-center">Indeks Ekonomi</th>
                        <th scope="col" class="px-6 py-4 font-bold text-center">Indeks Lingkungan</th>
                        <th scope="col" class="px-6 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($idmData as $idm)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-center font-bold text-gray-900 text-lg">
                                {{ $idm->year }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColors = [
                                        'Mandiri' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                                        'Maju' => 'bg-blue-100 text-blue-800 border-blue-200',
                                        'Berkembang' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                        'Tertinggal' => 'bg-orange-100 text-orange-800 border-orange-200',
                                        'Sangat Tertinggal' => 'bg-red-100 text-red-800 border-red-200',
                                    ];
                                    $colorClass = $statusColors[$idm->status] ?? 'bg-gray-100 text-gray-800 border-gray-200';
                                @endphp
                                <span class="px-3 py-1.5 rounded-lg text-sm font-bold border {{ $colorClass }}">
                                    {{ $idm->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-emerald-600 text-base">
                                {{ $idm->score }}
                            </td>
                            <td class="px-6 py-4 text-center text-gray-900 font-medium">
                                {{ $idm->social_index }}
                            </td>
                            <td class="px-6 py-4 text-center text-gray-900 font-medium">
                                {{ $idm->economic_index }}
                            </td>
                            <td class="px-6 py-4 text-center text-gray-900 font-medium">
                                {{ $idm->environmental_index }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.idm.edit', $idm) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.idm.destroy', $idm) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data IDM ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                Belum ada data IDM.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($idmData->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $idmData->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
