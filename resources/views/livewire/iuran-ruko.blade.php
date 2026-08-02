<div>
    <x-ui.page-hero 
        title="Grafik Laporan Iuran Ruko" 
        subtitle="Transparansi keuangan kas Ruko untuk seluruh warga Jayanti Residence."
        badge="Iuran Ruko"
        theme="green"
        image="{{ asset('images/login-bg.png') }}"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ activeTab: 'yearly' }">
        
        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-full p-1 border border-gray-200 shadow-sm inline-flex">
                <button @click="activeTab = 'yearly'" 
                        :class="activeTab === 'yearly' ? 'bg-emerald-600 text-white shadow' : 'text-gray-600 hover:text-emerald-600 hover:bg-gray-50'"
                        class="px-6 py-2.5 rounded-full text-sm font-bold transition-all">
                    Grafik Pergerakan Kas (Tahunan)
                </button>
                <button @click="activeTab = 'total'" 
                        :class="activeTab === 'total' ? 'bg-emerald-600 text-white shadow' : 'text-gray-600 hover:text-emerald-600 hover:bg-gray-50'"
                        class="px-6 py-2.5 rounded-full text-sm font-bold transition-all">
                    Grafik Total Pemasukan vs Pengeluaran
                </button>
            </div>
        </div>

        <div x-show="activeTab === 'yearly'">

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden mb-12">
            <div class="p-6 sm:p-8">
                <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">Grafik Pergerakan Kas Ruko Periode 2020 s/d {{ date('Y') }}</h2>
                <div class="relative h-[400px] w-full">
                    <canvas id="financialChart"
                            data-labels="{{ json_encode($labels) }}"
                            data-income="{{ json_encode($incomeData) }}"
                            data-expense="{{ json_encode($expenseData) }}"
                            data-balance="{{ json_encode($balanceData) }}"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Table Data -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-emerald-50">
                <h3 class="text-xl font-bold text-emerald-900 mb-6">Rincian Data Keuangan Ruko Periode 2020 s/d {{ date('Y') }}</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-emerald-800 uppercase bg-emerald-100 border-b border-emerald-200">
                        <tr>
                            <th class="px-6 py-4 font-bold">Tahun</th>
                            <th class="px-6 py-4 font-bold">Total Pemasukan</th>
                            <th class="px-6 py-4 font-bold">Total Pengeluaran</th>
                            <th class="px-6 py-4 font-bold">Saldo Akhir</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($yearlyReports as $report)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $report['year'] }}</td>
                                <td class="px-6 py-4 font-semibold text-emerald-600">Rp {{ number_format($report['income'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-semibold text-red-600">Rp {{ number_format($report['expense'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-bold text-blue-700">Rp {{ number_format($report['balance'], 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-6 py-12 text-center text-gray-400">Belum ada data keuangan ruko.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <div x-show="activeTab === 'total'" style="display: none;">
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden mb-12">
                <div class="p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">Grafik Pemasukan Vs Pengeluaran Kas Ruko<br><span class="text-lg text-gray-500 font-medium">Periode 2020 s/d {{ date('Y') }}</span></h2>
                    <div class="relative h-[400px] w-full max-w-3xl mx-auto">
                        <canvas id="totalChart"
                                data-total-income="{{ $totalIncome }}"
                                data-total-expense="{{ $totalExpense }}"
                                data-total-balance="{{ $totalBalance }}"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @script
    <script>
            let chartInstance = null;

            const initChart = () => {
                const canvas = document.getElementById('financialChart');
                if (!canvas) return;
                
                const ctx = canvas.getContext('2d');
                
                const labels = JSON.parse(canvas.getAttribute('data-labels'));
                const incomeData = JSON.parse(canvas.getAttribute('data-income'));
                const expenseData = JSON.parse(canvas.getAttribute('data-expense'));
                const balanceData = JSON.parse(canvas.getAttribute('data-balance'));

                if (chartInstance) {
                    chartInstance.destroy();
                }

                chartInstance = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Pemasukan',
                                data: incomeData,
                                backgroundColor: '#10b981', // Emerald 500
                                order: 2
                            },
                            {
                                label: 'Pengeluaran',
                                data: expenseData,
                                backgroundColor: '#ef4444', // Red 500
                                order: 3
                            },
                            {
                                label: 'Saldo',
                                data: balanceData,
                                type: 'line',
                                borderColor: '#eab308', // Yellow 500
                                backgroundColor: '#eab308',
                                borderWidth: 3,
                                pointBackgroundColor: '#ca8a04',
                                pointRadius: 5,
                                fill: false,
                                order: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            duration: 500
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                    }
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed.y !== null) {
                                            label += 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                                        }
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            };

            const initTotalChart = () => {
                const canvas = document.getElementById('totalChart');
                if (!canvas) return;
                
                const ctx = canvas.getContext('2d');
                
                const totalIncome = parseFloat(canvas.getAttribute('data-total-income'));
                const totalExpense = parseFloat(canvas.getAttribute('data-total-expense'));
                const totalBalance = parseFloat(canvas.getAttribute('data-total-balance'));

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Total Keseluruhan'],
                        datasets: [
                            {
                                label: 'Pemasukan',
                                data: [totalIncome],
                                backgroundColor: '#3b82f6', // Blue
                                order: 2
                            },
                            {
                                label: 'Pengeluaran',
                                data: [totalExpense],
                                backgroundColor: '#ef4444', // Red
                                order: 3
                            },
                            {
                                label: 'Saldo',
                                data: [totalBalance],
                                type: 'line',
                                borderColor: '#84cc16', // Lime
                                backgroundColor: '#84cc16',
                                borderWidth: 3,
                                pointBackgroundColor: '#65a30d',
                                pointRadius: 5,
                                fill: false,
                                order: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            duration: 500
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                    }
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed.y !== null) {
                                            label += 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                                        }
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            };

            initChart();
            initTotalChart();
    </script>
    @endscript
</div>
