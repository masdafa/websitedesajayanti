<div wire:poll.5s>
    <x-ui.page-hero 
        title="Pertanyaan Umum" 
        subtitle="Temukan jawaban atas pertanyaan yang sering diajukan warga perumahan."
        badge="FAQ"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-faq.list :faqs="$faqs" />
            <x-faq.contact-cta />
        </div>
    </div>
</div>
