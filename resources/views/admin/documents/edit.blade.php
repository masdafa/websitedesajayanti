<x-admin-layout title="Edit Dokumen">
    <x-slot:breadcrumb>Ubah data dokumen publik</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <form action="{{ route('admin.documents.update', $document) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')

            <!-- File Dokumen -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">File Dokumen Baru</label>
                
                <div class="mb-4 flex items-center gap-3 p-3 bg-gray-50 border border-gray-200 rounded-xl">
                    <div class="p-2 bg-emerald-100 text-emerald-600 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate">Dokumen Saat Ini:</p>
                        <a href="{{ Str::startsWith($document->file_path, 'http') ? $document->file_path : asset('storage/'.$document->file_path) }}" target="_blank" class="text-xs text-blue-600 hover:underline truncate block">Lihat File</a>
                    </div>
                </div>

                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl bg-gray-50 hover:bg-gray-100 transition relative">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="file_path" class="relative cursor-pointer bg-white rounded-md font-medium text-emerald-600 hover:text-emerald-500 focus-within:outline-none px-2 py-1 shadow-sm border border-gray-200">
                                <span>Pilih file baru</span>
                                <input id="file_path" name="file_path" type="file" class="sr-only" onchange="document.getElementById('file-name').textContent = this.files[0].name">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500 font-medium mt-2" id="file-name">Biarkan kosong jika tidak ingin mengubah file dokumen.</p>
                    </div>
                </div>
                @error('file_path') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Judul Dokumen -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Nama / Judul Dokumen <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $document->title) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Contoh: Formulir Pendaftaran Surat Pengantar">
                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Keterangan / Deskripsi Singkat</label>
                <textarea name="description" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                    placeholder="Opsional, jelaskan kegunaan dokumen ini...">{{ old('description', $document->description) }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.documents.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
