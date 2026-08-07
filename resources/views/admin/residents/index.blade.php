<x-admin-layout title="Data Warga">
    <x-slot:breadcrumb>Kelola database warga perumahan</x-slot:breadcrumb>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl font-semibold text-sm">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl font-semibold text-sm">
            {{ session('error') }}
        </div>
    @endif

    <!-- Import Form Section -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-6 p-6">
        <h2 class="text-lg font-bold text-gray-900 mb-2">Import Data Warga (Excel)</h2>
        <p class="text-sm text-gray-500 mb-4">Unggah file Excel (format .xlsx, .csv) untuk memasukkan banyak data warga sekaligus. Pastikan header baris pertama sesuai (contoh: nama_lengkap, nik, no_kk, blok_rumah, no_hp, status_warga, agama, pekerjaan).</p>
        <form action="{{ route('admin.residents.import') }}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
            @csrf
            <input type="file" name="file_excel" accept=".xlsx,.xls,.csv" required
                class="block w-full sm:max-w-sm text-sm text-gray-500 border border-gray-300 rounded-xl p-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-xl transition whitespace-nowrap">
                Import Data
            </button>
        </form>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-gray-100 flex flex-col sm:flex-row gap-4 items-center justify-between">
            <h2 class="text-lg font-bold text-gray-800">Daftar Warga</h2>
            
            <a href="{{ route('admin.residents.create') }}" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold py-2.5 px-5 rounded-xl transition flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Warga
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold">Blok / Rumah</th>
                        <th scope="col" class="px-6 py-4 font-bold">RT</th>
                        <th scope="col" class="px-6 py-4 font-bold">Nama Ayah</th>
                        <th scope="col" class="px-6 py-4 font-bold">Nama Ibu</th>
                        <th scope="col" class="px-6 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($residents as $person)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-bold text-gray-900">
                                {{ $person->block ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $person->rt ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $person->nama_ayah ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $person->nama_ibu ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.residents.edit', $person) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.residents.destroy', $person) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                Belum ada data warga terdaftar. Silakan import dari Excel atau tambah secara manual.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
