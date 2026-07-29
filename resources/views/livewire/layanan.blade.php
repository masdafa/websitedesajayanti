<div>
    <!-- Page Header -->
    <div class="hero-gradient pt-28 pb-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 text-green-300 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Layanan
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-white mb-4">Layanan Warga</h1>
            <p class="text-green-300 text-lg max-w-xl mx-auto">Sampaikan pengaduan, pertanyaan, atau kebutuhan Anda kepada pengurus perumahan.</p>
        </div>
    </div>

    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $serviceColors = ['blue'=>'border-blue-100 bg-blue-50 text-blue-600','red'=>'border-red-100 bg-red-50 text-red-600','green'=>'border-green-100 bg-green-50 text-green-600','amber'=>'border-amber-100 bg-amber-50 text-amber-600'];
                @endphp
                @foreach($services as $s)
                    <a href="/pengaduan?kategori={{ urlencode($s->title) }}" wire:navigate class="block bg-white rounded-3xl border {{ $serviceColors[$s->color] ?? 'border-green-100 bg-green-50 text-green-600' }} p-6 cursor-pointer hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                        <div class="mb-4 bg-white/50 w-12 h-12 rounded-2xl flex items-center justify-center">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $s->icon }}"/></svg>
                        </div>
                        <h3 class="text-lg font-black text-gray-900 mb-2">{{ $s->title }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $s->description }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
