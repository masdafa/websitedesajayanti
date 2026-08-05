<div>
    <x-ui.page-hero 
        title="Info Iuran K3" 
        subtitle="Transparansi iuran K3 untuk Setoran RT dan Cost Budgeting."
        badge="Iuran K3"
        theme="green"
        image="{{ asset('images/login-bg.png') }}"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Year Selector -->
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            @foreach(range(2019, date('Y')) as $y)
                <button wire:click="setYear({{ $y }})" class="px-5 py-2.5 rounded-full font-bold text-sm transition-all {{ $year == $y ? 'bg-emerald-600 text-white shadow-md scale-105' : 'bg-white text-emerald-700 border border-emerald-200 hover:bg-emerald-50' }}">
                    Tahun {{ $y }}
                </button>
            @endforeach
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden mb-12">
            <div class="p-6 sm:p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Grafik Pergerakan Kas Tahun {{ $year }}</h2>
                <div class="relative h-[400px] w-full">
                    <canvas id="k3Chart"
                            data-labels="{{ json_encode($labels) }}"
                            data-rt23="{{ json_encode($rt23Data) }}"
                            data-rt24="{{ json_encode($rt24Data) }}"
                            data-rt25="{{ json_encode($rt25Data) }}"
                            data-jumlah="{{ json_encode($jumlahData) }}"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Table Data -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden mb-12">
            <div class="p-6 border-b border-gray-100 bg-emerald-50">
                <h3 class="text-xl font-bold text-emerald-900">Rincian Setoran KK per RT {{ $year }}</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-emerald-800 uppercase bg-emerald-100 border-b border-emerald-200">
                        <tr>
                            <th class="px-6 py-4 font-bold">Bulan</th>
                            <th class="px-6 py-4 font-bold">RT 23 (KK)</th>
                            <th class="px-6 py-4 font-bold">RT 24 (KK)</th>
                            <th class="px-6 py-4 font-bold">RT 25 (KK)</th>
                            <th class="px-6 py-4 font-bold">JUMLAH (KK)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($reports as $report)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $report->month }}</td>
                                <td class="px-6 py-4 font-semibold text-blue-600">{{ $report->rt_23 }}</td>
                                <td class="px-6 py-4 font-semibold text-red-600">{{ $report->rt_24 }}</td>
                                <td class="px-6 py-4 font-semibold text-emerald-600">{{ $report->rt_25 }}</td>
                                <td class="px-6 py-4 font-bold text-purple-700">{{ $report->jumlah }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-6 py-12 text-center text-gray-400">Belum ada data setoran untuk tahun {{ $year }}.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Budgeting Table -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-emerald-50">
                <h3 class="text-xl font-bold text-emerald-900">Cost Budgeting Iuran K3 {{ $year }}</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-emerald-800 uppercase bg-emerald-100 border-b border-emerald-200">
                        <tr>
                            <th class="px-6 py-4 font-bold">No</th>
                            <th class="px-6 py-4 font-bold">Item</th>
                            <th class="px-6 py-4 font-bold">Sesudah</th>
                            <th class="px-6 py-4 font-bold">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @php $totalBudget = 0; @endphp
                        @forelse($budgets as $index => $budget)
                            @php $totalBudget += $budget->amount; @endphp
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-gray-900">{{ $budget->item }}</td>
                                <td class="px-6 py-4 font-semibold text-emerald-600">Rp {{ number_format($budget->amount, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $budget->description }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-6 py-12 text-center text-gray-400">Belum ada data budgeting untuk tahun {{ $year }}.</td></tr>
                        @endforelse
                        
                        @if(count($budgets) > 0)
                        <tr class="bg-gray-50">
                            <td colspan="2" class="px-6 py-4 font-bold text-gray-900 text-right uppercase">Total</td>
                            <td class="px-6 py-4 font-bold text-blue-700 text-lg">Rp {{ number_format($totalBudget, 0, ',', '.') }}</td>
                            <td></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @script
    <script>
            let chartInstance = null;

            const initChart = () => {
                const canvas = document.getElementById('k3Chart');
                if (!canvas) return;
                
                const ctx = canvas.getContext('2d');
                
                const labels = JSON.parse(canvas.getAttribute('data-labels'));
                const rt23Data = JSON.parse(canvas.getAttribute('data-rt23'));
                const rt24Data = JSON.parse(canvas.getAttribute('data-rt24'));
                const rt25Data = JSON.parse(canvas.getAttribute('data-rt25'));
                const jumlahData = JSON.parse(canvas.getAttribute('data-jumlah'));

                if (chartInstance) {
                    chartInstance.destroy();
                }

                chartInstance = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'RT 23',
                                data: rt23Data,
                                backgroundColor: '#2563eb', // Blue 600
                                order: 2
                            },
                            {
                                label: 'RT 24',
                                data: rt24Data,
                                backgroundColor: '#dc2626', // Red 600
                                order: 3
                            },
                            {
                                label: 'RT 25',
                                data: rt25Data,
                                backgroundColor: '#84cc16', // Lime 500
                                order: 4
                            },
                            {
                                label: 'JUMLAH',
                                data: jumlahData,
                                type: 'line',
                                borderColor: '#7e22ce', // Purple 700
                                backgroundColor: '#7e22ce',
                                borderWidth: 3,
                                pointBackgroundColor: '#6b21a8',
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
                                beginAtZero: true
                            }
                        }
                    }
                });
            };

            initChart();

            $wire.on('chart-updated', () => {
                setTimeout(() => {
                    initChart();
                }, 50);
            });
    </script>
    @endscript
</div>
