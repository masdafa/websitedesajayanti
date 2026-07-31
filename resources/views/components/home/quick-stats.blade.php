<!-- Quick Stats -->
<div class="py-12 bg-white relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
            @php
            $quickStats = [
                ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'value' => '2.500+', 'label' => 'Jiwa', 'color' => 'emerald'],
                ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'value' => '800+', 'label' => 'Unit Rumah', 'color' => 'blue'],
                ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'value' => '24/7', 'label' => 'Keamanan', 'color' => 'rose'],
                ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'value' => '8+', 'label' => 'Fasilitas', 'color' => 'amber'],
            ];
            
            $iconThemes = [
                'emerald' => 'bg-emerald-100 text-emerald-600 ring-emerald-50',
                'blue'    => 'bg-blue-100 text-blue-600 ring-blue-50',
                'rose'    => 'bg-rose-100 text-rose-600 ring-rose-50',
                'amber'   => 'bg-amber-100 text-amber-600 ring-amber-50',
            ];
            @endphp
            
            @foreach($quickStats as $i => $stat)
            <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}" class="group relative bg-white rounded-[2rem] p-8 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                <!-- Soft background glow on hover -->
                <div class="absolute top-0 right-0 -mt-6 -mr-6 w-32 h-32 bg-gradient-to-br from-gray-50 to-transparent rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                <div class="relative z-10 flex flex-col items-center text-center">
                    <!-- Icon Box -->
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 {{ $iconThemes[$stat['color']] }} ring-8 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                        </svg>
                    </div>
                    
                    <!-- Text Content -->
                    <h4 class="text-4xl font-black text-gray-900 mb-1.5 tracking-tight">{{ $stat['value'] }}</h4>
                    <p class="text-sm font-bold text-gray-400 uppercase tracking-[0.2em]">{{ $stat['label'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
