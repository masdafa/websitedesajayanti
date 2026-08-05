<x-admin-layout title="Kelola Cost Budgeting K3">
    <x-slot:breadcrumb>Kelola data rincian budget K3 per tahun</x-slot:breadcrumb>

    <!-- Year Filter -->
    <div class="mb-6 flex gap-4 items-center flex-wrap">
        <span class="text-sm font-semibold text-gray-700">Tahun Laporan:</span>
        @foreach(range(2019, date('Y') + 1) as $y)
            <a href="{{ route('admin.k3-budgets.index', ['year' => $y]) }}" 
               class="px-4 py-2 rounded-xl text-sm font-bold transition {{ $year == $y ? 'bg-emerald-600 text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
                {{ $y }}
            </a>
        @endforeach
    </div>

    <!-- Data Form -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100 bg-gray-50">
            <h2 class="text-lg font-bold text-gray-900">Tambah Data Budgeting ({{ $year }})</h2>
            <p class="text-sm text-gray-500 mt-1">Tambahkan item budget untuk tahun {{ $year }}.</p>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.k3-budgets.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                @csrf
                <input type="hidden" name="year" value="{{ $year }}">
                
                <div class="md:col-span-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Item</label>
                    <input type="text" name="item" required placeholder="Contoh: Biaya Kebersihan" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                </div>
                <div class="md:col-span-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Jumlah (Rp)</label>
                    <input type="number" name="amount" required min="0" value="0" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Keterangan</label>
                    <input type="text" name="description" placeholder="Contoh: IN RW" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                </div>
                <div class="md:col-span-1">
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-5 rounded-xl transition shadow-sm">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Data List -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 font-bold">No</th>
                        <th class="px-6 py-4 font-bold">Item</th>
                        <th class="px-6 py-4 font-bold">Amount</th>
                        <th class="px-6 py-4 font-bold">Keterangan</th>
                        <th class="px-6 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php $total = 0; @endphp
                    @forelse($budgets as $index => $budget)
                        @php $total += $budget->amount; @endphp
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-bold text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-900">{{ $budget->item }}</td>
                            <td class="px-6 py-4 font-semibold text-emerald-600">Rp {{ number_format($budget->amount, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $budget->description }}</td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.k3-budgets.destroy', $budget) }}" method="POST" onsubmit="return confirm('Hapus item ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition inline-flex">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-12 text-center text-gray-400">Belum ada data budgeting untuk tahun {{ $year }}.</td></tr>
                    @endforelse
                    
                    @if(count($budgets) > 0)
                    <tr class="bg-gray-50">
                        <td colspan="2" class="px-6 py-4 font-bold text-gray-900 text-right uppercase">Total</td>
                        <td class="px-6 py-4 font-bold text-blue-700 text-lg">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        <td colspan="2"></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
