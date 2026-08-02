<div wire:poll.5s>
    <x-galeri.styles />

    <div class="bg-slate-50 min-h-screen pb-24">
        <x-galeri.hero />
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 -mb-8 relative z-10">
            <div class="flex flex-col sm:flex-row gap-4 items-center justify-end">
                <select wire:model.live="selectedMonth" class="rounded-xl border-gray-200 text-gray-700 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white py-2.5 px-4 font-medium min-w-[150px]">
                    <option value="">Semua Bulan</option>
                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $index => $month)
                        <option value="{{ $index + 1 }}">{{ $month }}</option>
                    @endforeach
                </select>
                
                <select wire:model.live="selectedYear" class="rounded-xl border-gray-200 text-gray-700 text-sm shadow-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white py-2.5 px-4 font-medium min-w-[150px]">
                    <option value="">Semua Tahun</option>
                    @foreach($availableYears as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <x-galeri.grid :galleries="$galleries" />
        <x-galeri.lightbox />
    </div>

    <x-galeri.scripts />
</div>
