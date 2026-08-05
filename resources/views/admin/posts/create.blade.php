@php
    $initialType = old('type', request('type', 'berita'));
    $initialLabel = $initialType === 'pengumuman' ? 'Pengumuman' : 'Berita';
@endphp
<x-admin-layout title="Tambah {{ $initialLabel }}">
    <x-slot:breadcrumb>Buat {{ strtolower($initialLabel) }} baru</x-slot:breadcrumb>

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
<!-- Status Publikasi -->
            <div>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" name="is_published" value="1" class="sr-only peer" {{ old('is_published', true) ? 'checked' : '' }}>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                    <span class="ms-3 text-sm font-semibold text-gray-900">Publikasikan Langsung</span>
                </label>
                <p class="mt-1 text-xs text-gray-500 ms-14">Matikan jika ingin menyimpan sebagai draft.</p>
            </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                    Simpan <span x-text="type === 'pengumuman' ? 'Pengumuman' : 'Berita'">{{ $initialLabel }}</span>
                </button>
                <a href="{{ route('admin.posts.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>

    <!-- Quill JS -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        // Auto-slug
        document.getElementById('title').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                            .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                            .replace(/\s+/g, '-')         // Replace spaces with -
                            .replace(/-+/g, '-');         // Replace multiple - with single -
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

        // Isi konten lama jika ada (validasi gagal)
        @if(old('content'))
        quill.clipboard.dangerouslyPasteHTML({!! json_encode(old('content')) !!});
        @endif

        // Sebelum submit, pindahkan isi Quill ke hidden input
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('content-input').value = quill.getSemanticHTML();
        });
    </script>
</x-admin-layout>
