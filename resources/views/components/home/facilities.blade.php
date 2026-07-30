@props(['facilities'])

<!-- Fasilitas Perumahan -->
<div class="py-20 bg-gradient-to-br from-green-950 via-green-900 to-green-950 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-10 left-10 w-96 h-96 rounded-full bg-green-400 blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 rounded-full bg-emerald-400 blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div data-aos="fade-up" class="text-center mb-14">
            <span class="text-green-400 text-sm font-bold uppercase tracking-widest">Fasilitas</span>
            <h2 class="text-3xl md:text-5xl font-black text-white mt-2 mb-4">Fasilitas Perumahan</h2>
            <div class="w-16 h-1 bg-green-400 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($facilities as $i => $f)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}" class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-2xl p-5 backdrop-blur-sm hover:bg-white/10 transition-colors">
                <div class="text-emerald-400 bg-emerald-500/20 p-3 rounded-xl flex-shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $f->icon }}" />
                    </svg>
                </div>
                <h4 class="font-bold text-white text-lg">{{ $f->title }}</h4>
            </div>
            @empty
            <p class="text-white/60 col-span-3 text-center">Belum ada data fasilitas.</p>
            @endforelse
        </div>
    </div>
</div>
