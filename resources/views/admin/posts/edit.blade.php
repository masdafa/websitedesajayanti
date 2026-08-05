@php
    $initialType = old('type', $post->type);
    $initialLabel = $initialType === 'pengumuman' ? 'Pengumuman' : 'Berita';
@endphp
<x-admin-layout title="Edit {{ $initialLabel }}">
    <x-slot:breadcrumb>Ubah konten {{ strtolower($initialLabel) }}</x-slot:breadcrumb>

    {{-- Multiple Image Upload --}}
            <div x-data="{ 
                initialPreviews: {{ json_encode(collect($post->images ?? [])->map(fn($img) => asset('storage/'.$img))->toArray()) }},
                previews: {{ json_encode(collect($post->images ?? [])->map(fn($img) => asset('storage/'.$img))->toArray()) }},
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
<!-- Status Publikasi -->
            <div>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" name="is_published" value="1" class="sr-only peer" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                    <span class="ms-3 text-sm font-semibold text-gray-900">Publikasikan Langsung</span>
                </label>
            </div>

            <div class="pt-4 flex flex-wrap items-center justify-between gap-3 border-t border-gray-100">
                <div class="flex gap-3">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.posts.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">
                        Kembali
                    </a>
                </div>
                <button type="submit" form="delete-form" class="bg-red-50 hover:bg-red-500 text-red-600 hover:text-white border border-red-200 font-bold py-2.5 px-6 rounded-xl transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Hapus
                </button>
            </div>
        </form>

        <!-- Form Hapus -->
        <form id="delete-form" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="hidden" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini? Data yang dihapus tidak dapat dikembalikan.');">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <!-- Quill JS -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        // Auto-slug
        document.getElementById('title').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                            .replace(/[^a-z0-9\s-]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');
            document.getElementById('slug').value = slug;
        });

        // Init Quill
        const quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Tulis isi berita di sini...',
            modules: {
                toolbar: [
                    [{ header: [2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        // Isi konten awal dari data yang tersimpan
        const existingContent = {!! json_encode(old('content', $post->content)) !!};
        if (existingContent) {
            quill.clipboard.dangerouslyPasteHTML(existingContent);
        }

        // Sebelum submit, pindahkan isi Quill ke hidden input
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('content-input').value = quill.getSemanticHTML();
        });
    </script>
</x-admin-layout>
