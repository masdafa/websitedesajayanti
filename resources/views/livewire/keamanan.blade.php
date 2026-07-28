<div>
    <!-- Page Header -->
    <div class="bg-gradient-to-br from-red-900 via-red-800 to-red-950 pt-28 pb-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 text-red-300 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Keamanan
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-white mb-4">Keamanan & Darurat</h1>
            <p class="text-red-300 text-lg max-w-xl mx-auto">Informasi keamanan dan nomor darurat yang perlu diketahui seluruh warga perumahan.</p>
        </div>
    </div>

    <div class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
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

            <!-- Security Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div data-aos="fade-right" class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="p-2 bg-red-100 text-red-600 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        </div>
                        <h2 class="text-xl font-black text-gray-900">Prosedur Darurat</h2>
                    </div>
                    <ol class="space-y-3">
                        @php
                            $procedures = [
                                'Tenang dan jangan panik',
                                'Hubungi Pos Satpam segera',
                                'Amankan diri dan keluarga',
                                'Jangan menghalangi akses darurat',
                                'Tunggu instruksi petugas',
                                'Laporkan kejadian secara detail',
                            ];
                        @endphp
                        @foreach($procedures as $i => $step)
                            <li class="flex gap-3 items-start text-sm text-gray-700">
                                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-red-600 text-white text-xs font-black flex items-center justify-center">{{ $i + 1 }}</span>
                                {{ $step }}
                            </li>
                        @endforeach
                    </ol>
                </div>

                <div data-aos="fade-left" class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h2 class="text-xl font-black text-gray-900">Jadwal Keamanan</h2>
                    </div>
                    <div class="space-y-3">
                        @php
                            $schedule = [
                                ['shift' => 'Pagi', 'time' => '07:00 – 15:00 WIB', 'count' => '2 Personel'],
                                ['shift' => 'Siang', 'time' => '15:00 – 23:00 WIB', 'count' => '2 Personel'],
                                ['shift' => 'Malam', 'time' => '23:00 – 07:00 WIB', 'count' => '2 Personel'],
                            ];
                        @endphp
                        @foreach($schedule as $s)
                            <div class="flex items-center justify-between p-3.5 rounded-xl bg-gray-50 border border-gray-100">
                                <div>
                                    <div class="font-bold text-gray-900 text-sm">Shift {{ $s['shift'] }}</div>
                                    <div class="text-green-600 text-sm font-semibold">{{ $s['time'] }}</div>
                                </div>
                                <span class="text-xs bg-green-100 text-green-700 font-bold px-2.5 py-1 rounded-full">{{ $s['count'] }}</span>
                            </div>
                        @endforeach
                        <div class="mt-3 p-3 bg-green-50 rounded-xl border border-green-100 text-xs text-green-700 font-semibold text-center flex items-center justify-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Pos Satpam beroperasi 24 jam / 7 hari
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tips Keamanan -->
            <div data-aos="fade-up" class="bg-amber-50 border border-amber-200 rounded-3xl p-6 sm:p-8">
                <div class="flex items-center gap-3 mb-5">
                    <div class="p-2 bg-amber-100 text-amber-600 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </div>
                    <h2 class="text-xl font-black text-gray-900">Tips Keamanan Lingkungan</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @php
                        $tips = [
                            'Selalu kunci pintu & jendela saat keluar rumah',
                            'Pastikan tamu melapor ke Pos Satpam',
                            'Kenali tetangga sekitar rumah Anda',
                            'Laporkan hal mencurigakan kepada satpam',
                            'Pasang lampu depan rumah di malam hari',
                            'Jangan biarkan rumah kosong tanpa pemberitahuan',
                        ];
                    @endphp
                    @foreach($tips as $tip)
                        <div class="flex items-start gap-2.5 text-sm text-gray-700">
                            <svg class="w-4 h-4 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            {{ $tip }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
