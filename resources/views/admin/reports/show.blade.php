<x-admin-layout title="Detail Pengaduan">
    <x-slot:breadcrumb>Detail laporan dari {{ $report->name }}</x-slot:breadcrumb>

    <div class="max-w-2xl space-y-6">
        <!-- Info Pelapor -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <h2 class="font-black text-gray-900 mb-5 text-lg">Informasi Pelapor</h2>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Nama</p>
                    <p class="font-semibold text-gray-900">{{ $report->name }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">No. HP</p>
                    <p class="font-semibold text-gray-900">{{ $report->phone ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Alamat</p>
                    <p class="font-semibold text-gray-900">{{ $report->address ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Tanggal Lapor</p>
                    <p class="font-semibold text-gray-900">{{ $report->created_at->format('d M Y H:i') }} WIB</p>
                </div>
            </div>
        </div>

        <!-- Isi Laporan -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-black text-gray-900 text-lg">Isi Laporan</h2>
                <span class="bg-blue-100 text-blue-700 font-bold px-3 py-1 rounded-full text-xs">{{ $report->category }}</span>
            </div>
            <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $report->message }}</p>
        </div>

        <!-- Update Status & Tanggapan -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <h2 class="font-black text-gray-900 mb-5 text-lg">Tanggapan Admin</h2>
            <form action="{{ route('admin.reports.update', $report) }}" method="POST" class="space-y-4">
                @csrf @method('PUT')

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Status <span class="text-red-500">*</span></label>
                    <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm bg-white">
                        <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>⏳ Menunggu</option>
                        <option value="proses" {{ $report->status === 'proses' ? 'selected' : '' }}>🔄 Sedang Diproses</option>
                        <option value="selesai" {{ $report->status === 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Tanggapan / Catatan</label>
                    <textarea name="response" rows="4" placeholder="Tulis tanggapan atau catatan penanganan..."
                              class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm resize-none">{{ $report->response }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">Simpan Tanggapan</button>
                    <a href="{{ route('admin.reports.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2.5 px-6 rounded-xl transition">← Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
