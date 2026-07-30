<x-admin-layout title="Detail Pendaftaran Kegiatan">
    <x-slot:breadcrumb>
        <a href="{{ route('admin.activities-reg.index') }}" class="text-emerald-600 hover:text-emerald-700">Pendaftaran Kegiatan</a>
        <span class="mx-2">/</span> Detail
    </x-slot:breadcrumb>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Detail Info -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50/50">
                    <h3 class="font-bold text-gray-900">Informasi Pendaftar</h3>
                    <span class="text-xs text-gray-500">{{ $activities_reg->created_at->format('d M Y, H:i') }}</span>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Nama Pendaftar</p>
                            <p class="text-gray-900 font-medium">{{ $activities_reg->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">No. Handphone / WA</p>
                            <p class="text-gray-900 font-medium">{{ $activities_reg->phone ?: '-' }}</p>
                        </div>
                    </div>
                    
                    <hr class="border-gray-100 border-dashed">
                    
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Kegiatan yang Diikuti</p>
                        <p class="text-gray-900 font-medium text-lg">{{ $activities_reg->activity_name }}</p>
                    </div>

                    @if($activities_reg->notes)
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Keterangan Tambahan</p>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-gray-800 leading-relaxed whitespace-pre-wrap">{{ $activities_reg->notes }}</div>
                    </div>
                    @endif
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
                    <form action="{{ route('admin.activities-reg.update', $activities_reg) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Status Pendaftaran</label>
                            <select name="status" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition">
                                <option value="pending" {{ $activities_reg->status == 'pending' ? 'selected' : '' }}>Menunggu Validasi</option>
                                <option value="approved" {{ $activities_reg->status == 'approved' ? 'selected' : '' }}>Disetujui</option>
                                <option value="rejected" {{ $activities_reg->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Catatan Admin</label>
                            <textarea name="notes" rows="4" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition text-sm" placeholder="Tambahkan catatan jika perlu">{{ $activities_reg->notes }}</textarea>
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
