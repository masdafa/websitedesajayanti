<div>
    <x-ui.page-hero 
        title="UMKM Warga" 
        subtitle="Dukung produk dan jasa milik warga Perumahan Jayanti Residence."
        badge="UMKM Warga"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-umkm.search />
            <x-umkm.grid :products="$products" />

            <div class="mt-8">{{ $products->links() }}</div>
        </div>
    </div>
</div>
