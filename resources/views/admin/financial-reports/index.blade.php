<x-admin-layout title="Kelola Laporan Keuangan">
    <x-slot:breadcrumb>Kelola data grafik laporan iuran kas RW per tahun</x-slot:breadcrumb>

    <!-- Year Filter -->
    <div class="mb-6 flex gap-4 items-center flex-wrap">
        <span class="text-sm font-semibold text-gray-700">Tahun Laporan:</span>
        @foreach(range(2019, date('Y')) as $y)
            <a href="{{ route('admin.financial-reports.index', ['year' => $y]) }}" 
               class="px-4 py-2 rounded-xl text-sm font-bold transition {{ $year == $y ? 'bg-emerald-600 text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
                {{ $y }}
            </a>
        @endforeach
    </div>

    <!-- Data Form -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100 bg-gray-50">
            <h2 class="text-lg font-bold text-gray-900">Input Data Laporan ({{ $year }})</h2>
            <p class="text-sm text-gray-500 mt-1">Masukkan atau ubah data keuangan untuk bulan tertentu. Jika bulan sudah ada, data akan diperbarui.</p>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.financial-reports.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                @csrf
                <input type="hidden" name="year" value="{{ $year }}">
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Bulan</label>
                    <select id="month-input" name="month" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                        <option value="">Pilih Bulan</option>
                        @foreach($months as $m)
                            <option value="{{ $m }}">{{ $m }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Pemasukan (Rp)</label>
                    <input type="number" id="income-input" name="income" required min="0" value="0" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Pengeluaran (Rp)</label>
                    <input type="number" id="expense-input" name="expense" required min="0" value="0" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Saldo (Rp)</label>
                    <input type="number" id="balance-input" name="balance" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                </div>
                <div>
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
                        <th class="px-6 py-4 font-bold">Bulan</th>
                        <th class="px-6 py-4 font-bold">Pemasukan</th>
                        <th class="px-6 py-4 font-bold">Pengeluaran</th>
                        <th class="px-6 py-4 font-bold">Saldo</th>
                        <th class="px-6 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($reports as $report)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-bold text-gray-900">{{ $report->month }}</td>
                            <td class="px-6 py-4 font-semibold text-emerald-600">Rp {{ number_format($report->income, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 font-semibold text-red-600">Rp {{ number_format($report->expense, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 font-bold text-blue-700">Rp {{ number_format($report->balance, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button type="button" 
                                            onclick="editData('{{ $report->month }}', {{ $report->income }}, {{ $report->expense }}, {{ $report->balance }})" 
                                            class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition inline-flex">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </button>
                                    <form action="{{ route('admin.financial-reports.destroy', $report) }}" method="POST" onsubmit="return confirm('Hapus data bulan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition inline-flex">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-12 text-center text-gray-400">Belum ada data keuangan untuk tahun {{ $year }}.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const incomeInput = document.getElementById('income-input');
            const expenseInput = document.getElementById('expense-input');
            const balanceInput = document.getElementById('balance-input');
            
            window.editData = function(month, income, expense, balance) {
                document.getElementById('month-input').value = month;
                incomeInput.value = income;
                expenseInput.value = expense;
                balanceInput.value = balance;
                
                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
                
                // Highlight form lightly to show it's ready
                const form = document.querySelector('form');
                form.classList.add('ring-2', 'ring-emerald-500', 'ring-offset-2', 'rounded-2xl', 'transition-all', 'duration-300');
                setTimeout(() => {
                    form.classList.remove('ring-2', 'ring-emerald-500', 'ring-offset-2');
                }, 1500);
            };
        });
    </script>
</x-admin-layout>
