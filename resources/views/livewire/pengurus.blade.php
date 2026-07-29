<div>
    <!-- Page Header -->
    <div class="hero-gradient pt-28 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute bottom-0 right-0 w-72 h-72 rounded-full bg-green-300 blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 text-green-300 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Struktur Organisasi
                </span>
                <h1 class="text-4xl md:text-5xl font-black text-white mb-4">Pengurus Perumahan</h1>
                <p class="text-green-300 text-lg max-w-xl mx-auto">Susunan Pengurus RT & RW di lingkungan Perumahan Jayanti Residence.</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($staffs as $staff)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100 hover:shadow-xl transition-shadow">
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden bg-gray-200 mb-4 border-4 border-emerald-50">
                            @if($staff->image)
                                <img src="{{ asset('storage/'.$staff->image) }}" alt="{{ $staff->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">
                                    <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                </div>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $staff->name }}</h3>
                        <p class="text-emerald-600 font-medium mt-1">{{ $staff->position }}</p>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-12">
                        Data pengurus belum ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
