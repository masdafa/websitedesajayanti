<div class="max-w-xl mx-auto mb-12">
    <div class="relative">
        <input wire:model.live.debounce.300ms="search" type="text" class="w-full pl-12 pr-4 py-4 rounded-xl border border-gray-200 shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-gray-900 transition" placeholder="Cari berita atau informasi...">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>
    <div wire:loading class="text-sm text-emerald-600 mt-2 text-center w-full">Mencari...</div>
</div>
