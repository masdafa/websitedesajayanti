<x-admin-layout title="Tambah Produk">
    <x-slot:breadcrumb>Tambahkan produk baru untuk Belanja Desa</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-4xl">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nama Produk -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: Keripik Pisang Khas Jayanti">
                    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Harga -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price') }}" min="0"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: 15000">
                    <p class="mt-1 text-xs text-gray-500">Isi angka saja. Kosongkan jika tidak ada harga pasti.</p>
                    @error('price') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Nama Penjual -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Penjual / Toko</label>
                    <input type="text" name="seller_name" value="{{ old('seller_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: Ibu Siti / Toko Makmur">
                    @error('seller_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- No WhatsApp -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: 081234567890">
                    <p class="mt-1 text-xs text-gray-500">Gunakan format 08... atau 628...</p>
                    @error('whatsapp_number') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Social Media & E-Commerce -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Sosial Media -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Link Sosial Media (Opsional)</label>
                    <input type="url" name="social_media_link" value="{{ old('social_media_link') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: https://instagram.com/toko">
                    <p class="mt-1 text-xs text-gray-500">Link Instagram atau Facebook.</p>
                    @error('social_media_link') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- E-Commerce -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Link E-Commerce (Opsional)</label>
                    <input type="url" name="ecommerce_link" value="{{ old('ecommerce_link') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="Contoh: https://shopee.co.id/toko">
                    <p class="mt-1 text-xs text-gray-500">Link Shopee, Tokopedia, GoFood, dll.</p>
                    @error('ecommerce_link') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi Produk</label>
                <textarea name="description" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Jelaskan detail produk ini...">{{ old('description') }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Foto -->
            {{-- Multiple Image Upload --}}
            <div x-data="{ 
                previews: [],
                hasNewFiles: false,
                handleFileChange(e) {
                    let files = e.target.files;
                    this.hasNewFiles = files.length > 0;
                    
                    if (!this.hasNewFiles) {
                        this.previews = [];
                        return;
                    }
                    
                    this.previews = [];
                    let count = files.length > 10 ? 10 : files.length;
                    
                    let newPreviews = [];
                    for(let i = 0; i < count; i++) {
                        newPreviews.push(URL.createObjectURL(files[i]));
                    }
                    this.previews = newPreviews;
                },
                cancelFiles() {
                    this.previews = [];
                    this.hasNewFiles = false;
                    this.$refs.fileInput.value = '';
                }
            }">
                <label class="block text-sm font-semibold text-gray-900 mb-2">Gambar / Foto <span class="text-gray-400 font-normal">(opsional, maks 10)</span></label>
                
                <div class="flex flex-col gap-4">
                    <!-- Preview Area -->
                    <div class="flex flex-wrap gap-3" x-show="previews.length > 0" x-cloak>
                        <template x-for="(preview, index) in previews" :key="index">
                            <div class="w-24 h-24 rounded-xl bg-gray-100 overflow-hidden border border-gray-200 flex-shrink-0 relative group">
                                <img :src="preview" class="w-full h-full object-cover">
                            </div>
                        </template>
                    </div>
                    
                    <!-- Placeholder if empty -->
                    <div class="w-24 h-24 rounded-xl bg-gray-100 overflow-hidden border border-gray-200 flex items-center justify-center" x-show="previews.length === 0">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>

                    <!-- Input & Cancel Button -->
                    <div class="flex items-start gap-3">
                        <div class="flex-grow">
                            <input type="file" name="images[]" multiple accept="image/*" x-ref="fileInput"
                                x-on:change="handleFileChange($event)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                            <p class="mt-1 text-xs text-gray-500">Pilih hingga 10 gambar sekaligus. Format: JPG, PNG, WEBP. Maks. 2MB per file.</p>
                        </div>
                        <button type="button" x-show="hasNewFiles" x-on:click="cancelFiles()" 
                                class="bg-red-50 hover:bg-red-100 text-red-600 px-4 py-3 rounded-xl text-sm font-semibold transition-colors flex items-center gap-2 border border-red-200" x-cloak>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            Batal
                        </button>
                    </div>
                </div>
                @error('images') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                @error('images.*') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
<div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                    Simpan Produk
                </button>
                <a href="{{ route('admin.products.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
