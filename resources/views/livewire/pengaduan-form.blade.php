<div>
    <x-ui.page-hero 
        title="{{ $isLocked ? 'Form ' . $category : 'Form Pengaduan / Layanan' }}" 
        subtitle="Silakan lengkapi form di bawah ini untuk {{ $isLocked ? 'keperluan ' . strtolower($category) : 'menyampaikan pengaduan atau menggunakan layanan' }}."
        badge="Layanan & Pengaduan"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-pengaduan-form.form 
                :submitted="$submitted" 
                :is-locked="$isLocked" 
                :category="$category" 
                :services="$services" 
            />
            
            <div class="mt-8 text-center">
                <a href="/layanan" class="text-green-600 hover:text-green-700 font-medium inline-flex items-center gap-1 transition-colors" wire:navigate>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Info Layanan
                </a>
            </div>
        </div>
    </div>
</div>
