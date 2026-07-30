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
