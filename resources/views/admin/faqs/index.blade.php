<x-admin-layout title="Kelola FAQ">
    <x-slot:breadcrumb>Kelola pertanyaan yang sering diajukan warga</x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-gray-100 flex justify-end">
            <a href="{{ route('admin.faqs.create') }}" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-5 rounded-xl transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah FAQ
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 font-bold w-12 text-center">Urutan</th>
                        <th class="px-6 py-4 font-bold">Pertanyaan</th>
                        <th class="px-6 py-4 font-bold">Status</th>
                        <th class="px-6 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($faqs as $faq)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-center font-bold text-gray-400">{{ $faq->order }}</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900">{{ Str::limit($faq->question, 80) }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">{{ Str::limit($faq->answer, 100) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $faq->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-600' }}">
                                    {{ $faq->is_published ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Hapus FAQ ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-12 text-center text-gray-400">Belum ada FAQ.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($faqs->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">{{ $faqs->links() }}</div>
        @endif
    </div>
</x-admin-layout>
