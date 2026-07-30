@props(['siskamlings'])

<!-- Jadwal Siskamling -->
<div data-aos="fade-up" class="bg-white rounded-3xl border border-blue-100 shadow-sm p-6 sm:p-8 mb-10">
    <div class="flex items-center gap-3 mb-5">
        <div class="p-2 bg-blue-100 text-blue-600 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
        </div>
        <h2 class="text-xl font-black text-gray-900">Jadwal Siskamling (Keamanan Malam)</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-blue-700 uppercase bg-blue-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-black rounded-l-xl w-1/4">Hari</th>
                    <th scope="col" class="px-6 py-4 font-black rounded-r-xl">Petugas Siskamling</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siskamlings as $s)
                    <tr class="bg-white border-b border-gray-50 hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900">{{ $s->day }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $s->members }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-8 text-center text-gray-400">Belum ada jadwal siskamling.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
