<x-admin-layout title="Surat Pengantar">
    <x-slot:breadcrumb>Kelola pengajuan surat pengantar warga</x-slot:breadcrumb>

    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex gap-2">
            <a href="{{ route('admin.letters.index') }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ !request('status') ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
                Semua
            </a>
            <a href="{{ route('admin.letters.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') == 'pending' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
                Menunggu
            </a>
            <a href="{{ route('admin.letters.index', ['status' => 'proses']) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') == 'proses' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
                Diproses
            </a>
            <a href="{{ route('admin.letters.index', ['status' => 'selesai']) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') == 'selesai' ? 'bg-emerald-600 text-white shadow-md shadow-emerald-500/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
                Selesai
            </a>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 border-b border-gray-200 text-gray-600 font-bold">
                    <tr>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider w-16">No</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Pelapor / Pemohon</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Keperluan</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($letters as $letter)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-gray-500 font-medium">{{ $letters->firstItem() + $loop->index }}</td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900">{{ $letter->name }}</div>
                            @if($letter->phone)
                                @php
                                    $waNumber = preg_replace('/[^0-9]/', '', $letter->phone);
                                    if(str_starts_with($waNumber, '0')) {
                                        $waNumber = '62' . substr($waNumber, 1);
                                    }
                                @endphp
                                <div class="text-xs mt-1">
                                    @if($waNumber)
                                        <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="text-emerald-600 hover:text-emerald-700 font-medium inline-flex items-center gap-1 transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                                            {{ $letter->phone }}
                                        </a>
                                    @else
                                        <span class="text-gray-500">{{ $letter->phone }}</span>
                                    @endif
                                </div>
                            @endif
                            @if($letter->address)
                                <div class="text-xs text-gray-500 mt-1 leading-relaxed">{{ $letter->address }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-800 line-clamp-2">{{ $letter->purpose }}</p>
                        </td>
                        <td class="px-6 py-4 text-gray-500">
                            {{ $letter->created_at->format('d M Y') }}<br>
                            <span class="text-xs">{{ $letter->created_at->format('H:i') }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($letter->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">Menunggu</span>
                            @elseif($letter->status == 'proses')
                                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">Diproses</span>
                            @else
                                <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Selesai</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.letters.show', $letter) }}" class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Lihat Detail">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                                <form action="{{ route('admin.letters.destroy', $letter) }}" method="POST" onsubmit="return confirm('Hapus pengajuan ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="flex items-center gap-1.5 px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg transition font-medium text-xs" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            Belum ada pengajuan surat pengantar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($letters->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $letters->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
