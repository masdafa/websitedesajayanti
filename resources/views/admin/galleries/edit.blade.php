<x-admin-layout title="Edit Foto Galeri">
    <x-slot:breadcrumb>Ubah data foto galeri</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')

            <!-- Foto -->
            {{-- Multiple Image Upload --}}
            <div x-data="{ 
                initialPreviews: {{ json_encode(collect($gallery->images ?? [])->map(fn($img) => asset('storage/'.$img))->toArray()) }},
                previews: {{ json_encode(collect($gallery->images ?? [])->map(fn($img) => asset('storage/'.$img))->toArray()) }},
                hasNewFiles: false,
                handleFileChange(e) {
                    let files = e.target.files;
                    this.hasNewFiles = files.length > 0;
                    
                    if (!this.hasNewFiles) {
                        this.previews = JSON.parse(JSON.stringify(this.initialPreviews));
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
                    this.previews = JSON.parse(JSON.stringify(this.initialPreviews));
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
                            <p class="mt-1 text-xs text-gray-500">Pilih hingga 10 gambar sekaligus. Memilih file baru akan menggantikan gambar lama. Format: JPG, PNG, WEBP. Maks. 2MB per file.</p>
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
<!-- Judul -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Judul Foto <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Masukkan judul foto">
                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Tanggal Foto -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal Foto</label>
                <input type="date" name="published_date" value="{{ old('published_date', $gallery->published_date ? \Carbon\Carbon::parse($gallery->published_date)->format('Y-m-d') : '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah tanggal foto ini (otomatis menggunakan tanggal upload sebelumnya).</p>
                @error('published_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Deskripsi Singkat</label>
                <textarea name="description" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Opsional, tulis deskripsi singkat...">{{ old('description', $gallery->description) }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.galleries.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
