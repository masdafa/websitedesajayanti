<div>
    <!-- Hero Section -->
    <x-ui.page-hero 
        title="Informasi Iuran Warga" 
        subtitle="Berikut adalah informasi terkait kewajiban dan tagihan iuran di lingkungan kita."
    />

    <div class="py-16 bg-gray-50/50">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="space-y-6">
                @forelse($iurans as $iuran)
                <div class="bg-white rounded-3xl shadow-lg shadow-gray-200/40 border border-gray-100 overflow-hidden group hover:-translate-y-1 transition duration-300">
                    <div class="p-6 sm:p-8 flex flex-col md:flex-row gap-6 items-start md:items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition">{{ $iuran->title }}</h3>
                            </div>
                            <div class="prose prose-sm text-gray-600 mt-4 leading-relaxed">
                                {!! nl2br(e($iuran->description)) !!}
                            </div>
                        </div>
                        
                        @if($iuran->amount)
                        <div class="bg-emerald-50 border border-emerald-100 px-6 py-4 rounded-2xl md:min-w-[200px] text-center">
                            <p class="text-xs font-semibold text-emerald-600 uppercase tracking-wider mb-1">Nominal Iuran</p>
                            <p class="text-2xl font-bold text-emerald-700">Rp {{ number_format($iuran->amount, 0, ',', '.') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-12 text-center">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Informasi</h3>
                    <p class="text-gray-500">Saat ini belum ada informasi iuran warga yang ditambahkan oleh pengurus.</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-8 text-center">
                <a href="{{ route('layanan') }}" class="inline-flex items-center gap-2 text-emerald-600 font-semibold hover:text-emerald-700 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Layanan Warga
                </a>
            </div>
        </div>
    </div>
</div>
