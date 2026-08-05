<x-admin-layout title="Kelola Keuangan & Setoran Ruko">
    <x-slot:breadcrumb>Kelola laporan keuangan dan rincian setoran kas Ruko per tahun</x-slot:breadcrumb>

    <!-- Year Filter -->
    <div class="mb-6 flex gap-4 items-center flex-wrap">
        <span class="text-sm font-semibold text-gray-700">Tahun Laporan:</span>
        @foreach(range(2019, date('Y')) as $y)
            <a href="{{ route('admin.ruko-financial-reports.index', ['year' => $y]) }}" 
               class="px-4 py-2 rounded-xl text-sm font-bold transition {{ $year == $y ? 'bg-emerald-600 text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
                {{ $y }}
            </a>
        @endforeach
    </div>

    <div>
        <!-- Tabs -->
        <div class="flex gap-2 mb-6 border-b border-gray-200 pb-4">
            <button id="tab-laporan" onclick="switchTab('laporan')" 
                    class="px-5 py-2.5 rounded-lg text-sm font-bold transition bg-emerald-600 text-white shadow">
                Rekap Laporan Keuangan
            </button>
            <button id="tab-setoran" onclick="switchTab('setoran')" 
                    class="px-5 py-2.5 rounded-lg text-sm font-bold transition bg-white text-gray-600 hover:bg-gray-50 border border-gray-200">
                Rincian Setoran Tiap Ruko
            </button>
        </div>

        <!-- Laporan Tab -->
        <div id="content-laporan">
            <!-- Data Form -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-100 bg-gray-50">
                    <h2 class="text-lg font-bold text-gray-900">Input Data Laporan ({{ $year }})</h2>
                    <p class="text-sm text-gray-500 mt-1">Masukkan atau ubah data keuangan untuk bulan tertentu. Jika bulan sudah ada, data akan diperbarui.</p>
                </div>
                <div class="p-6">
                    <form id="form-laporan" action="{{ route('admin.ruko-financial-reports.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
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
                                Simpan Laporan
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
                                                    onclick="editDataLaporan('{{ $report->month }}', {{ $report->income }}, {{ $report->expense }}, {{ $report->balance }})" 
                                                    class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition inline-flex">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                            </button>
                                            <form action="{{ route('admin.ruko-financial-reports.destroy', $report) }}" method="POST" onsubmit="return confirm('Hapus data bulan ini?')">
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
        </div>

        <!-- Setoran Tab -->
        <div id="content-setoran" style="display: none;">
            <!-- Data Form -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-100 bg-gray-50">
                    <h2 class="text-lg font-bold text-gray-900">Input Setoran Ruko ({{ $year }})</h2>
                    <p class="text-sm text-gray-500 mt-1">Masukkan atau ubah data setoran untuk ruko tertentu. Jika Ruko No sudah ada pada tahun yang sama, data akan diperbarui.</p>
                </div>
                <div class="p-6">
                    <form id="form-setoran" action="{{ route('admin.ruko-deposits.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="year" value="{{ $year }}">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Pemilik <span class="text-red-500">*</span></label>
                                <input type="text" id="name-input" name="name" required placeholder="Contoh: SUWITO (2A)" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">No. Ruko <span class="text-red-500">*</span></label>
                                <select id="ruko_no-input" name="ruko_no" required class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                                    <option value="">-- Pilih No. Ruko --</option>
                                    <option value="1A">Ruko 1A</option>
                                    <option value="1B">Ruko 1B</option>
                                    <option value="1C">Ruko 1C</option>
                                    <option value="2A">Ruko 2A</option>
                                    <option value="2B">Ruko 2B</option>
                                    <option value="2C">Ruko 2C</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Jml Setoran <span class="text-gray-400 font-normal">(opsional)</span></label>
                                <input type="number" id="deposit_count-input" name="deposit_count" min="0" placeholder="12" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Keterangan <span class="text-gray-400 font-normal">(opsional)</span></label>
                                <input type="text" id="notes-input" name="notes" placeholder="Contoh: 1.5 bulan" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mt-4 border-t border-gray-200 pt-4">
                            @foreach(['january'=>'Jan', 'february'=>'Feb', 'march'=>'Mar', 'april'=>'Apr', 'may'=>'Mei', 'june'=>'Jun', 'july'=>'Jul', 'august'=>'Ags', 'september'=>'Sep', 'october'=>'Okt', 'november'=>'Nov', 'december'=>'Des'] as $field => $label)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">{{ $label }}</label>
                                <input type="number" id="{{ $field }}-input" name="{{ $field }}" min="0" value="0" class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block px-4 py-2.5 text-sm">
                            </div>
                            @endforeach
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-6 rounded-xl transition shadow-sm">
                                Simpan Setoran
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Data List -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600 whitespace-nowrap">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 font-bold border-r border-gray-200">NO</th>
                                <th class="px-4 py-3 font-bold border-r border-gray-200 min-w-[150px]">NAMA</th>
                                <th class="px-4 py-3 font-bold border-r border-gray-200">RUKO No</th>
                                <th class="px-3 py-3 font-bold text-right">Jan</th>
                                <th class="px-3 py-3 font-bold text-right">Feb</th>
                                <th class="px-3 py-3 font-bold text-right">Mar</th>
                                <th class="px-3 py-3 font-bold text-right">Apr</th>
                                <th class="px-3 py-3 font-bold text-right">Mei</th>
                                <th class="px-3 py-3 font-bold text-right">Jun</th>
                                <th class="px-3 py-3 font-bold text-right">Jul</th>
                                <th class="px-3 py-3 font-bold text-right">Ags</th>
                                <th class="px-3 py-3 font-bold text-right">Sep</th>
                                <th class="px-3 py-3 font-bold text-right">Okt</th>
                                <th class="px-3 py-3 font-bold text-right">Nov</th>
                                <th class="px-3 py-3 font-bold border-r border-gray-200 text-right">Des</th>
                                <th class="px-4 py-3 font-bold border-r border-gray-200 text-right">TOTAL</th>
                                <th class="px-4 py-3 font-bold border-r border-gray-200 text-center">JML SETORAN</th>
                                <th class="px-4 py-3 font-bold border-r border-gray-200 min-w-[100px]">KETERANGAN</th>
                                <th class="px-4 py-3 font-bold text-right sticky right-0 bg-gray-50">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($deposits as $index => $deposit)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-3 font-medium text-gray-900 border-r border-gray-200 text-center">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 font-bold text-gray-900 border-r border-gray-200">{{ $deposit->name }}</td>
                                    <td class="px-4 py-3 font-semibold text-emerald-600 border-r border-gray-200 text-center">{{ $deposit->ruko_no }}</td>
                                    
                                    @foreach(['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'] as $month)
                                        <td class="px-3 py-3 text-right {{ $deposit->$month > 0 ? 'text-gray-900' : 'text-gray-300' }} {{ $month == 'december' ? 'border-r border-gray-200' : '' }}">
                                            {{ $deposit->$month > 0 ? number_format($deposit->$month, 0, ',', '.') : '-' }}
                                        </td>
                                    @endforeach
                                    
                                    <td class="px-4 py-3 font-bold text-emerald-700 border-r border-gray-200 text-right">
                                        Rp {{ number_format($deposit->total, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-900 border-r border-gray-200 text-center font-medium">{{ $deposit->deposit_count ?: '-' }}</td>
                                    <td class="px-4 py-3 text-gray-600 border-r border-gray-200 text-sm">{{ $deposit->notes }}</td>
                                    <td class="px-4 py-3 text-right sticky right-0 bg-white group-hover:bg-gray-50 border-l border-gray-200">
                                        <div class="flex justify-end gap-2">
                                            <button type="button" 
                                                    onclick="editDataSetoran({{ json_encode($deposit) }})" 
                                                    class="p-1.5 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition inline-flex">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                            </button>
                                            <form action="{{ route('admin.ruko-deposits.destroy', $deposit) }}" method="POST" onsubmit="return confirm('Hapus data setoran ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="p-1.5 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition inline-flex">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="19" class="px-6 py-12 text-center text-gray-400">Belum ada data setoran ruko untuk tahun {{ $year }}.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching logic
            window.switchTab = function(tab) {
                const tabLaporan = document.getElementById('tab-laporan');
                const tabSetoran = document.getElementById('tab-setoran');
                const contentLaporan = document.getElementById('content-laporan');
                const contentSetoran = document.getElementById('content-setoran');

                if (tab === 'laporan') {
                    // Update classes for active state
                    tabLaporan.className = "px-5 py-2.5 rounded-lg text-sm font-bold transition bg-emerald-600 text-white shadow";
                    tabSetoran.className = "px-5 py-2.5 rounded-lg text-sm font-bold transition bg-white text-gray-600 hover:bg-gray-50 border border-gray-200";
                    
                    // Toggle visibility
                    contentLaporan.style.display = 'block';
                    contentSetoran.style.display = 'none';

                    // Update URL hash
                    window.history.replaceState(null, null, ' ');
                } else if (tab === 'setoran') {
                    // Update classes for active state
                    tabSetoran.className = "px-5 py-2.5 rounded-lg text-sm font-bold transition bg-emerald-600 text-white shadow";
                    tabLaporan.className = "px-5 py-2.5 rounded-lg text-sm font-bold transition bg-white text-gray-600 hover:bg-gray-50 border border-gray-200";
                    
                    // Toggle visibility
                    contentSetoran.style.display = 'block';
                    contentLaporan.style.display = 'none';

                    // Update URL hash
                    window.history.replaceState(null, null, '#setoran');
                }
            };

            // Initialize tab based on URL hash
            if (window.location.hash === '#setoran') {
                switchTab('setoran');
            }

            // Laporan Functions
            const incomeInput = document.getElementById('income-input');
            const expenseInput = document.getElementById('expense-input');
            const balanceInput = document.getElementById('balance-input');
            
            window.editDataLaporan = function(month, income, expense, balance) {
                document.getElementById('month-input').value = month;
                incomeInput.value = income;
                expenseInput.value = expense;
                balanceInput.value = balance;
                
                window.scrollTo({ top: 0, behavior: 'smooth' });
                
                const form = document.getElementById('form-laporan');
                form.classList.add('ring-2', 'ring-emerald-500', 'ring-offset-2', 'rounded-2xl', 'transition-all', 'duration-300');
                setTimeout(() => {
                    form.classList.remove('ring-2', 'ring-emerald-500', 'ring-offset-2');
                }, 1500);
            };

            // Setoran Functions
            window.editDataSetoran = function(deposit) {
                document.getElementById('name-input').value = deposit.name;
                document.getElementById('ruko_no-input').value = deposit.ruko_no;
                document.getElementById('deposit_count-input').value = deposit.deposit_count || '';
                document.getElementById('notes-input').value = deposit.notes || '';
                
                const months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
                months.forEach(m => {
                    document.getElementById(m + '-input').value = parseInt(deposit[m]) || 0;
                });
                
                window.scrollTo({ top: 0, behavior: 'smooth' });
                
                const form = document.getElementById('form-setoran');
                form.classList.add('ring-2', 'ring-emerald-500', 'ring-offset-2', 'rounded-2xl', 'transition-all', 'duration-300');
                setTimeout(() => {
                    form.classList.remove('ring-2', 'ring-emerald-500', 'ring-offset-2');
                }, 1500);
            };
        });
    </script>
</x-admin-layout>
