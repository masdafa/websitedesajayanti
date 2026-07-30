@props(['routineActivities'])

<div data-aos="fade-up" class="mb-14">
    <div class="flex items-center gap-4 mb-6">
        <h2 class="text-2xl font-black text-gray-900">Kegiatan Rutin Warga</h2>
        <div class="h-px flex-1 bg-gray-200"></div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
        @forelse($routineActivities as $r)
            <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm hover:border-green-300 transition-colors flex items-center gap-4">
                <div class="bg-green-50 text-green-600 p-3 rounded-xl flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $r->icon }}"/></svg>
                </div>
                <h3 class="font-bold text-gray-800 text-sm leading-tight">{{ $r->title }}</h3>
            </div>
        @empty
            <p class="text-gray-400 col-span-3 text-center">Belum ada kegiatan rutin.</p>
        @endforelse
    </div>
</div>
