<div wire:poll.5s>
    <x-ui.page-hero 
        title="Profil Jayanti Residence" 
        subtitle="Mengenal lebih dekat sejarah, visi misi, dan susunan pengurus Perumahan Jayanti Residence."
        badge="Profil"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="bg-gray-50 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <x-profil.main-content :settings="$settings" />
                <x-profil.sidebar-map />
            </div>
        </div>
    </div>
</div>
