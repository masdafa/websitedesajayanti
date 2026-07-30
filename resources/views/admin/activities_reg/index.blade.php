<x-admin-layout title="Pendaftaran Kegiatan">
    <x-slot:breadcrumb>Kelola pendaftaran kegiatan warga</x-slot:breadcrumb>

    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex gap-2">
            <a href="{{ route('admin.activities-reg.index') }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ !request('status') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
                Semua
            </a>
            <a href="{{ route('admin.activities-reg.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') == 'pending' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
                Menunggu
            </a>
            <a href="{{ route('admin.activities-reg.index', ['status' => 'approved']) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') == 'approved' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
                Disetujui
            </a>
            <a href="{{ route('admin.activities-reg.index', ['status' => 'rejected']) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') == 'rejected' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
                Ditolak
            </a>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 border-b border-gray-200 text-gray-600 font-bold">
                    <tr>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Pendaftar</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Kegiatan</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Tanggal Daftar</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($activities as $reg)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900">{{ $reg->name }}</div>
                            <div class="text-xs text-gray-500 mt-1">{{ $reg->phone }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-800 font-semibold">{{ $reg->activity_name }}</p>
                            @if($reg->notes)
                            <p class="text-xs text-gray-500 mt-1 line-clamp-1">{{ $reg->notes }}</p>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500">
                            {{ $reg->created_at->format('d M Y') }}<br>
                            <span class="text-xs">{{ $reg->created_at->format('H:i') }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($reg->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">Menunggu</span>
                            @elseif($reg->status == 'approved')
                                <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Disetujui</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.activities-reg.show', $reg) }}" class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Lihat Detail">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                                <form action="{{ route('admin.activities-reg.destroy', $reg) }}" method="POST" onsubmit="return confirm('Hapus pendaftaran ini?')">
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
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            Belum ada pendaftaran kegiatan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($activities->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $activities->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
