<!-- Emergency Numbers -->
<div data-aos="fade-up" class="bg-white rounded-3xl border border-red-100 shadow-sm overflow-hidden mb-10">
    <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4 flex items-center gap-3">
        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        <h2 class="text-xl font-black text-white">Nomor Darurat</h2>
    </div>
    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
        @php
            $emergency = [
                ['name' => 'Pos Satpam Perumahan', 'number' => '0812-XXXX-XXXX', 'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>', 'desc' => 'Tersedia 24 jam'],
                ['name' => 'Ketua RT/RW', 'number' => '0813-XXXX-XXXX', 'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>', 'desc' => 'Sesuai wilayah'],
                ['name' => 'Polsek Jayanti', 'number' => '(021) 5953-XXXX', 'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>', 'desc' => 'Darurat keamanan'],
                ['name' => 'Damkar Kab. Tangerang', 'number' => '119 / 021-5512XXX', 'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/></svg>', 'desc' => 'Kebakaran'],
                ['name' => 'Puskesmas Jayanti', 'number' => '(021) 5950-XXXX', 'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>', 'desc' => 'Layanan kesehatan'],
                ['name' => 'PLN (Listrik Padam)', 'number' => '123', 'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>', 'desc' => 'Laporan gangguan listrik'],
            ];
        @endphp
        @foreach($emergency as $i => $item)
            <div data-aos="fade-up" data-aos-delay="{{ $i * 60 }}" class="flex items-center gap-4 p-4 rounded-2xl bg-red-50 border border-red-100 hover:bg-red-100 transition">
                <div class="text-red-500">{!! $item['icon'] !!}</div>
                <div>
                    <div class="font-bold text-gray-900 text-sm">{{ $item['name'] }}</div>
                    <div class="text-red-700 font-black text-lg">{{ $item['number'] }}</div>
                    <div class="text-gray-500 text-xs">{{ $item['desc'] }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
