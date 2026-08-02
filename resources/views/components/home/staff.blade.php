@props(['staffs'])

<!-- Pengurus / Perangkat -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-6">
            <div data-aos="fade-up">
                <span class="text-green-600 text-sm font-bold uppercase tracking-widest">Tim Kami</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-2 mb-3">Pengurus RT/RW</h2>
                <div class="w-16 h-1 bg-green-500 rounded-full"></div>
                <p class="mt-4 text-gray-500 max-w-md">Para pengurus yang berdedikasi melayani warga Perumahan Jayanti Residence dengan sepenuh hati.</p>
            </div>
            <a href="{{ route('pengurus') }}" wire:navigate class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition group">
                Lihat Semua <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($staffs as $staff)
            <a href="{{ route('pengurus') }}" wire:navigate data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100 hover:shadow-xl transition-all card-hover group block">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden bg-gray-100 mb-5 border-4 border-green-50 shadow-inner group-hover:border-green-100 transition-colors relative">
                    @if(!empty($staff->image))
                    <img src="{{ asset('storage/'.$staff->image) }}" alt="{{ $staff->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-green-50 to-green-100 text-green-600">
                        <div class="w-16 h-16 rounded-full bg-green-200/60 flex items-center justify-center text-3xl font-black">
                            {{ substr($staff->name, 0, 1) }}
                        </div>
                    </div>
                    @endif
                </div>
                <h3 class="text-lg font-black text-gray-900 mb-1 group-hover:text-green-600 transition-colors">{{ $staff->name }}</h3>
                <p class="text-green-600 font-bold text-sm bg-green-50/50 inline-block px-3 py-1 rounded-full">{{ $staff->position }}</p>
            </a>
            @empty
            <div class="col-span-full py-12 text-center text-gray-400 bg-white rounded-3xl border border-dashed border-gray-200">
                Belum ada data pengurus yang ditambahkan.
            </div>
            @endforelse
        </div>
    </div>
</div>
