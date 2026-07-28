@php $isEdit = isset($faq); @endphp
<x-admin-layout title="{{ $isEdit ? 'Edit FAQ' : 'Tambah FAQ' }}">
    <x-slot:breadcrumb>{{ $isEdit ? 'Edit pertanyaan' : 'Tambah pertanyaan baru' }}</x-slot:breadcrumb>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
            <form action="{{ $isEdit ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" method="POST" class="space-y-5">
                @csrf
                @if($isEdit) @method('PUT') @endif

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Pertanyaan <span class="text-red-500">*</span></label>
                    <textarea name="question" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm resize-none">{{ old('question', $faq->question ?? '') }}</textarea>
                    @error('question') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Jawaban <span class="text-red-500">*</span></label>
                    <textarea name="answer" rows="6" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm resize-none">{{ old('answer', $faq->answer ?? '') }}</textarea>
                    @error('answer') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $faq->order ?? 0) }}" min="0"
                           class="w-32 px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm">
                    <p class="text-xs text-gray-400 mt-1">Angka kecil tampil lebih awal.</p>
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $faq->is_published ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500">
                    <label for="is_published" class="text-sm font-semibold text-gray-700">Tampilkan di website</label>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">
                        {{ $isEdit ? 'Simpan Perubahan' : 'Tambah FAQ' }}
                    </button>
                    <a href="{{ route('admin.faqs.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2.5 px-6 rounded-xl transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
