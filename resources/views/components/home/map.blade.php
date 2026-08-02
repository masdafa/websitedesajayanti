@props(['mapImage'])

@if(!empty($mapImage))
<section class="py-24 bg-white relative overflow-hidden" id="denah-lokasi">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16" x-data="{}" x-intersect="$el.classList.add('animate-fade-in-up')">
            <span class="text-emerald-600 font-bold tracking-wider uppercase text-sm mb-4 block">Peta & Lokasi</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Denah Perumahan Kami</h2>
            <p class="text-lg text-gray-600">Jelajahi letak blok, nomor rumah, dan fasilitas yang ada di dalam Jayanti Residence.</p>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="bg-gray-50 p-4 md:p-8 rounded-3xl shadow-lg border border-gray-100 relative group" x-data="{}" x-intersect="$el.classList.add('animate-fade-in-up')" style="animation-delay: 100ms;">
                <a href="{{ Storage::url($mapImage) }}" target="_blank" title="Klik untuk memperbesar denah" class="block overflow-hidden rounded-2xl relative">
                    <img src="{{ Storage::url($mapImage) }}" alt="Denah Perumahan" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700 cursor-zoom-in">
                    
                    <div class="absolute inset-0 bg-emerald-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center pointer-events-none">
                        <div class="bg-white/90 backdrop-blur-sm text-emerald-800 font-bold px-6 py-3 rounded-full flex items-center gap-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 shadow-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                            Lihat Gambar Penuh
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endif
