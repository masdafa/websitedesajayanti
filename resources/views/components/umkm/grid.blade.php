@props(['products'])

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse($products as $product)
        <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 80 }}" class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden card-hover group">
            <div class="aspect-square bg-gray-100 overflow-hidden relative">
                @if(!empty((!empty($product->images) ? $product->images[0] : null)))
                    <img src="{{ Str::startsWith((!empty($product->images) ? $product->images[0] : null), 'http') ? (!empty($product->images) ? $product->images[0] : null) : asset('storage/'.(!empty($product->images) ? $product->images[0] : null)) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-300 bg-gradient-to-br from-green-50 to-emerald-100">
                        <svg class="w-16 h-16 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                @endif
            </div>
            <div class="p-5">
                <h3 class="font-black text-gray-900 text-base mb-1 group-hover:text-green-700 transition-colors">{{ $product->name }}</h3>
                @if(!empty($product->description))
                    <p class="text-gray-500 text-xs mb-3 line-clamp-2">{{ $product->description }}</p>
                @endif
                @if(!empty($product->price))
                    <div class="text-green-700 font-black text-lg">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                @endif
                @if(!empty($product->contact))
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->seller_phone) }}" target="_blank"
                       class="w-full mt-4 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold py-2 px-4 rounded-xl transition flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        Hubungi Penjual
                    </a>
                @endif
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-20 text-gray-400">
            <svg class="w-16 h-16 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            <p class="font-semibold text-lg">Belum ada produk UMKM.</p>
            <p class="text-sm mt-1">Produk warga akan ditampilkan di sini.</p>
        </div>
    @endforelse
</div>
