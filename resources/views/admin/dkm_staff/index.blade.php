<x-admin-layout title="Pengurus DKM Al-Muhajirin">
    <x-slot:breadcrumb>Kelola susunan pengurus DKM Al-Muhajirin</x-slot:breadcrumb>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        @if(session('success'))
            <div class="m-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl font-semibold text-sm">{{ session('success') }}</div>
        @endif
        <div class="p-4 sm:p-6 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-800">Daftar Pengurus DKM</h2>
            <a href="{{ route('admin.dkm-staff.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-5 rounded-xl transition flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Pengurus
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 w-16 text-center">Urut</th>
                        <th class="px-6 py-4">Profil</th>
                        <th class="px-6 py-4">Jabatan</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($staffs as $s)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-center font-bold">{{ $s->sort_order }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-sm flex-shrink-0">
                                        @if($s->image)
                                            <img src="{{ asset('storage/'.$s->image) }}" class="w-full h-full object-cover rounded-full">
                                        @else
                                            {{ substr($s->name, 0, 1) }}
                                        @endif
                                    </div>
                                    <span class="font-bold text-gray-900">{{ $s->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4"><span class="bg-emerald-100 text-emerald-700 font-bold px-3 py-1 rounded-full text-xs">{{ $s->position }}</span></td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.dkm-staff.edit', $s) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.dkm-staff.destroy', $s) }}" method="POST" onsubmit="return confirm('Hapus pengurus ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-12 text-center text-gray-400">Belum ada data pengurus DKM.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
