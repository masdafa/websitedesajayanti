@php $isEdit = isset($document); @endphp
<x-admin-layout title="{{ $isEdit ? 'Edit Dokumen' : 'Upload Dokumen' }}">
    <x-slot:breadcrumb>{{ $isEdit ? 'Edit dokumen' : 'Upload dokumen baru' }}</x-slot:breadcrumb>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
            <form action="{{ $isEdit ? route('admin.documents.update', $document) : route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @if($isEdit) @method('PUT') @endif

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Judul Dokumen <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $document->title ?? '') }}" required
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Kategori <span class="text-red-500">*</span></label>
                    <select name="category" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm bg-white">
                        @foreach(['Formulir','Peraturan','AD/ART','Laporan','Pengumuman','Lainnya'] as $cat)
                            <option value="{{ $cat }}" {{ old('category', $document->category ?? 'Formulir') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm resize-none">{{ old('description', $document->description ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">
                        File {{ $isEdit ? '(Kosongkan jika tidak ingin mengganti)' : '' }} <span class="{{ $isEdit ? 'text-gray-400' : 'text-red-500' }}">{{ $isEdit ? '' : '*' }}</span>
                    </label>
                    @if($isEdit && $document->file_path)
                        <div class="mb-2 text-xs text-gray-500 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg>
                            File saat ini: {{ pathinfo($document->file_path, PATHINFO_BASENAME) }}
                        </div>
                    @endif
                    <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx" {{ !$isEdit ? 'required' : '' }}
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm bg-white">
                    <p class="text-xs text-gray-400 mt-1">Format: PDF, DOC, DOCX, XLS, XLSX. Maks 10MB.</p>
                    @error('file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $document->is_published ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500">
                    <label for="is_published" class="text-sm font-semibold text-gray-700">Tampilkan di website</label>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                        {{ $isEdit ? 'Simpan Perubahan' : 'Upload Dokumen' }}
                    </button>
                    <a href="{{ route('admin.documents.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2.5 px-6 rounded-xl transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
