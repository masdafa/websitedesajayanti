<div wire:poll.5s>
    <x-ui.page-hero 
        title="Download Dokumen" 
        subtitle="Formulir, peraturan, dan dokumen penting yang dapat diunduh oleh warga perumahan."
        badge="Dokumen"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-dokumen.search-filter :categories="$categories" />
            <x-dokumen.list :documents="$documents" />

            <div class="mt-6">{{ $documents->links() }}</div>
        </div>
    </div>
</div>
