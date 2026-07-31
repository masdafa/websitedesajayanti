<div wire:poll.5s>
    <x-ui.page-hero 
        title="Layanan Warga" 
        subtitle="Sampaikan pengaduan, pertanyaan, atau kebutuhan Anda kepada pengurus perumahan."
        badge="Layanan"
        theme="green"
        image="{{ asset('images/layanan-hero.png') }}"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-layanan.grid :services="$services" />
        </div>
    </div>
</div>
