<div>
    <x-ui.page-hero 
        title="Hubungi Kami" 
        subtitle="Informasi kontak dan lokasi kantor sekretariat Perumahan Jayanti Residence."
        badge="Kontak"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <x-kontak.info />
                <x-kontak.map-social />
            </div>
        </div>
    </div>
</div>
