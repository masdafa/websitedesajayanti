@props(['products'])

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse($products as $product)
        <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 80 }}" class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden card-hover group">
            <!-- Image Gallery Carousel -->
            <div class="aspect-square bg-gray-100 overflow-hidden relative" x-data="{ activeIndex: 0 }">
                @if(!empty($product->images) && count($product->images) > 0)
                    <div class="w-full h-full relative group/slider">
                        <!-- Images -->
                        @foreach($product->images as $index => $img)
                            <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/'.$img) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 absolute inset-0"
                                 x-show="activeIndex === {{ $index }}"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 style="display: {{ $index === 0 ? 'block' : 'none' }};">
                        @endforeach
                        
                        <!-- Navigation Arrows (only if > 1 image) -->
                        @if(count($product->images) > 1)
                            <button @click.prevent="activeIndex = activeIndex === 0 ? {{ count($product->images) - 1 }} : activeIndex - 1" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-1.5 rounded-full shadow-sm opacity-0 group-hover/slider:opacity-100 transition-opacity">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button @click.prevent="activeIndex = activeIndex === {{ count($product->images) - 1 }} ? 0 : activeIndex + 1" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-1.5 rounded-full shadow-sm opacity-0 group-hover/slider:opacity-100 transition-opacity">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                            
                            <!-- Indicators -->
                            <div class="absolute bottom-2 left-0 right-0 flex justify-center gap-1.5">
                                @foreach($product->images as $index => $img)
                                    <button @click.prevent="activeIndex = {{ $index }}" :class="activeIndex === {{ $index }} ? 'bg-white w-3' : 'bg-white/50 w-1.5 hover:bg-white/80'" class="h-1.5 rounded-full transition-all duration-300"></button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-300 bg-gradient-to-br from-green-50 to-emerald-100">
                        <svg class="w-16 h-16 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                @endif
            </div>
            
            <div class="p-5 flex flex-col justify-between h-[calc(100%-100%)]"> <!-- Using flex column for proper button spacing -->
                <div>
                    <h3 class="font-black text-gray-900 text-base mb-1 group-hover:text-green-700 transition-colors">{{ $product->name }}</h3>
                    @if(!empty($product->seller_name))
                        <p class="text-gray-400 text-xs font-semibold mb-2 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            {{ $product->seller_name }}
                        </p>
                    @endif
                    @if(!empty($product->description))
                        <p class="text-gray-500 text-xs mb-3 line-clamp-2">{{ $product->description }}</p>
                    @endif
                    @if(!empty($product->price))
                        <div class="text-green-700 font-black text-lg mb-4">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="mt-4 flex flex-col gap-2">
                    @if(!empty($product->whatsapp_number))
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->whatsapp_number) }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}" target="_blank"
                           class="w-full bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold py-2 px-4 rounded-xl transition flex items-center justify-center gap-2 text-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.571-.012c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                            Hubungi Penjual
                        </a>
                    @endif
                    
                    <div class="flex gap-2">
                        @if(!empty($product->ecommerce_link))
                            <a href="{{ $product->ecommerce_link }}" target="_blank" class="flex-1 bg-orange-50 hover:bg-orange-100 text-orange-600 font-bold py-2 px-3 rounded-xl transition flex items-center justify-center gap-1.5 text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                Beli Online
                            </a>
                        @endif

                        @if(!empty($product->social_media_link))
                            <a href="{{ $product->social_media_link }}" target="_blank" class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-600 font-bold py-2 px-3 rounded-xl transition flex items-center justify-center gap-1.5 text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                Sosial Media
                            </a>
                        @endif
                    </div>
                </div>
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
