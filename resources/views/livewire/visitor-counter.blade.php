<div wire:poll.10s class="bg-white text-slate-700 px-3 py-1.5 sm:px-4 sm:py-2.5 rounded-xl shadow-md flex items-center gap-2 sm:gap-3 border border-slate-200/60">
    <div class="bg-emerald-50 text-emerald-600 p-1 sm:p-1.5 rounded-lg">
        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
    </div>
    <div>
        <div class="text-[8px] sm:text-[10px] font-semibold uppercase tracking-wider text-slate-400">Kunjungan Hari Ini</div>
        <div class="font-bold text-sm sm:text-lg leading-none mt-0.5">{{ $count }}</div>
    </div>
</div>
