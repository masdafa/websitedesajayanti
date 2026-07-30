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
