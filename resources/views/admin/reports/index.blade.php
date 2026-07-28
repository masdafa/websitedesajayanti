<x-admin-layout title="Pengaduan Warga">
    <x-slot:breadcrumb>Kelola laporan dan pengaduan dari warga perumahan</x-slot:breadcrumb>

    <!-- Filter Tabs -->
    <div class="flex gap-2 mb-5 flex-wrap">
        @foreach([''=>'Semua', 'pending'=>'Menunggu', 'proses'=>'Diproses', 'selesai'=>'Selesai'] as $val => $label)
            <a href="{{ route('admin.reports.index', $val ? ['status' => $val] : []) }}"
               class="px-4 py-2 rounded-xl text-sm font-bold transition {{ ($status ?? '') === $val ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 font-bold">Pelapor</th>
                        <th class="px-6 py-4 font-bold">Kategori</th>
                        <th class="px-6 py-4 font-bold">Isi Laporan</th>
                        <th class="px-6 py-4 font-bold">Tanggal</th>
                        <th class="px-6 py-4 font-bold">Status</th>
                        <th class="px-6 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($reports as $report)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900">{{ $report->name }}</div>
                                @if($report->address)<div class="text-xs text-gray-400">{{ $report->address }}</div>@endif
                                @if($report->phone)<div class="text-xs text-green-600 font-semibold">{{ $report->phone }}</div>@endif
                            </td>
                            <td class="px-6 py-4"><span class="bg-blue-100 text-blue-700 font-bold px-2.5 py-1 rounded-full text-xs">{{ $report->category }}</span></td>
                            <td class="px-6 py-4 max-w-xs">
                                <p class="text-gray-700 line-clamp-2">{{ $report->message }}</p>
                            </td>
                            <td class="px-6 py-4 text-xs whitespace-nowrap">{{ $report->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusMap = ['pending'=>'bg-amber-100 text-amber-700','proses'=>'bg-blue-100 text-blue-700','selesai'=>'bg-emerald-100 text-emerald-700'];
                                    $statusLabel = ['pending'=>'Menunggu','proses'=>'Diproses','selesai'=>'Selesai'];
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $statusMap[$report->status] ?? '' }}">
                                    {{ $statusLabel[$report->status] ?? $report->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.reports.show', $report) }}" class="p-2 text-emerald-600 bg-emerald-50 hover:bg-emerald-100 rounded-lg transition" title="Lihat & Tanggapi">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.reports.destroy', $report) }}" method="POST" onsubmit="return confirm('Hapus pengaduan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada pengaduan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($reports->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">{{ $reports->links() }}</div>
        @endif
    </div>
</x-admin-layout>
