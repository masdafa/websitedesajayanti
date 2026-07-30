<!-- Quick Stats -->
<div class="py-12 bg-white shadow-sm relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @php
            $quickStats = [
            ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'value' => '2.500+', 'label' => 'Jiwa', 'color' => 'green'],
            ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'value' => '800+', 'label' => 'Unit Rumah', 'color' => 'blue'],
            ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'value' => '24/7', 'label' => 'Keamanan', 'color' => 'red'],
            ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'value' => '8+', 'label' => 'Fasilitas', 'color' => 'amber'],
            ];
            $statColors = ['green'=>'bg-green-50 text-green-600 border-green-100','blue'=>'bg-blue-50 text-blue-600 border-blue-100','red'=>'bg-red-50 text-red-600 border-red-100','amber'=>'bg-amber-50 text-amber-600 border-amber-100'];
            @endphp
            @foreach($quickStats as $i => $stat)
            <div data-aos="fade-up" data-aos-delay="{{ $i * 100 }}" class="text-center p-6 rounded-2xl border {{ $statColors[$stat['color']] }} card-hover">
                <div class="w-14 h-14 rounded-2xl {{ $statColors[$stat['color']] }} flex items-center justify-center mx-auto mb-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                    </svg>
                </div>
                <div class="text-3xl font-black text-gray-900 mb-1">{{ $stat['value'] }}</div>
                <div class="text-sm font-semibold text-gray-500">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
