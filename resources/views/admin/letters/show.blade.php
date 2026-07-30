<x-admin-layout title="Detail Surat Pengantar">
    <x-slot:breadcrumb>
        <a href="{{ route('admin.letters.index') }}" class="text-emerald-600 hover:text-emerald-700">Surat Pengantar</a>
        <span class="mx-2">/</span> Detail
    </x-slot:breadcrumb>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Detail Info -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50/50">
                    <h3 class="font-bold text-gray-900">Informasi Pemohon</h3>
                    <span class="text-xs text-gray-500">{{ $letter->created_at->format('d M Y, H:i') }}</span>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Nama Lengkap</p>
                            <p class="text-gray-900 font-medium">{{ $letter->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">NIK</p>
                            <p class="text-gray-900 font-medium">{{ $letter->nik ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">No. WhatsApp</p>
                            <p class="text-gray-900 font-medium">{{ $letter->phone ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Alamat Domisili</p>
                            <p class="text-gray-900">{{ $letter->address ?: '-' }}</p>
                        </div>
                    </div>
                    
                    <hr class="border-gray-100 border-dashed">
                    
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Keperluan Pembuatan Surat</p>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-gray-800 leading-relaxed whitespace-pre-wrap">{{ $letter->purpose }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Management -->
        <div class="lg:col-span-1">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden sticky top-6">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
                    <h3 class="font-bold text-gray-900">Status & Catatan</h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.letters.update', $letter) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Status Pengajuan</label>
                            <select name="status" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition">
                                <option value="pending" {{ $letter->status == 'pending' ? 'selected' : '' }}>Menunggu (Baru)</option>
                                <option value="proses" {{ $letter->status == 'proses' ? 'selected' : '' }}>Sedang Diproses</option>
                                <option value="selesai" {{ $letter->status == 'selesai' ? 'selected' : '' }}>Selesai / Siap Diambil</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Catatan (Opsional)</label>
                            <textarea name="notes" rows="4" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition text-sm" placeholder="Tambahkan catatan jika perlu (misal: syarat kurang, surat bisa diambil besok, dll)">{{ $letter->notes }}</textarea>
                        </div>
                        
                        <button type="submit" class="w-full py-2.5 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-xl transition shadow-md shadow-emerald-500/20">
                            Perbarui Status
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
