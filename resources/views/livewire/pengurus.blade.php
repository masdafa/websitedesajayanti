<div wire:poll.5s>
    <x-ui.page-hero 
        title="Pengurus Perumahan" 
        subtitle="Susunan Pengurus RT & RW di lingkungan Perumahan Jayanti Residence."
        badge="Struktur Organisasi"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="py-16 bg-gray-50 overflow-x-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-w-max">
            <x-pengurus.styles />
            <x-pengurus.tree :staffs="$staffs" />
        </div>
    </div>
</div>
