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
            <div class="bg-white rounded-full p-1 border border-gray-200 shadow-sm inline-flex flex-wrap justify-center gap-1">
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
                <button @click="activeTab = 'deposits'" 
                        :class="activeTab === 'deposits' ? 'bg-emerald-600 text-white shadow' : 'text-gray-600 hover:text-emerald-600 hover:bg-gray-50'"
                        class="px-6 py-2.5 rounded-full text-sm font-bold transition-all">
                    Data Setoran Ruko
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
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden mb-8">
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

        <!-- Map Lokasi Ruko -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-emerald-50 flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-emerald-900">Peta Lokasi Ruko Jayanti Residence</h3>
                    <p class="text-sm text-emerald-700 mt-0.5">Jl. Jayanti Residence, Tangerang — Klik marker untuk melihat detail ruko</p>
                </div>
            </div>

            <div class="p-6">
                <!-- Legend -->
                <div class="flex flex-wrap gap-3 mb-5">
                    <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-3 py-2 border border-gray-200">
                        <div class="w-5 h-5 rounded-full bg-yellow-400 border-2 border-yellow-600 shadow-sm flex-shrink-0"></div>
                        <span class="text-sm font-semibold text-gray-700">Ruko 1A</span>
                    </div>
                    <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-3 py-2 border border-gray-200">
                        <div class="w-5 h-5 rounded-full bg-red-500 border-2 border-red-700 shadow-sm flex-shrink-0"></div>
                        <span class="text-sm font-semibold text-gray-700">Ruko 1B</span>
                    </div>
                    <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-3 py-2 border border-gray-200">
                        <div class="w-5 h-5 rounded-full bg-orange-500 border-2 border-orange-700 shadow-sm flex-shrink-0"></div>
                        <span class="text-sm font-semibold text-gray-700">Ruko 1C</span>
                    </div>
                    <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-3 py-2 border border-gray-200">
                        <div class="w-5 h-5 rounded-full bg-white border-2 border-gray-400 shadow-sm flex-shrink-0"></div>
                        <span class="text-sm font-semibold text-gray-700">Ruko 2A</span>
                    </div>
                    <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-3 py-2 border border-gray-200">
                        <div class="w-5 h-5 rounded-full bg-gray-900 border-2 border-gray-600 shadow-sm flex-shrink-0"></div>
                        <span class="text-sm font-semibold text-gray-700">Ruko 2B</span>
                    </div>
                    <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-3 py-2 border border-gray-200">
                        <div class="w-5 h-5 rounded-full bg-pink-500 border-2 border-pink-700 shadow-sm flex-shrink-0"></div>
                        <span class="text-sm font-semibold text-gray-700">Ruko 2C</span>
                    </div>
                </div>

                <!-- Map Container -->
                <div id="ruko-leaflet-map" class="relative z-0 rounded-2xl overflow-hidden border border-gray-200 shadow-inner" style="height: 480px;"></div>

                <!-- Koordinat Picker Info -->
                <div id="ruko-coord-display" class="mt-2 px-4 py-2 bg-gray-800 text-green-400 text-xs font-mono rounded-lg" style="display:none;">
                    Klik pada peta untuk mendapatkan koordinat...
                </div>

                <script>
                (function() {
                    function initRukoMap() {
                        var el = document.getElementById('ruko-leaflet-map');
                        if (!el) return;
                        if (el._leaflet_id) {
                            el._leaflet_map && el._leaflet_map.invalidateSize();
                            return;
                        }

                        var map = L.map('ruko-leaflet-map', {
                            center: [-6.21975, 106.38568],
                            zoom: 18,
                            zoomControl: true,
                        });

                        el._leaflet_map = map;

                        // Esri World Imagery (satellite) - free, no API key
                        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, Maxar, Earthstar Geographics',
                            maxZoom: 19,
                            maxNativeZoom: 19
                        }).addTo(map);

                        // GROUP BARAT (kiri/atas) = Ruko 2A, 2B, 2C
                        // GROUP TIMUR (kanan/bawah) = Ruko 1A, 1B, 1C
                        var rukoAreas = [
                            // --- GROUP BARAT: 2C (atas) → 2B → 2A (bawah) ---
                            {
                                label: 'Ruko 2C',
                                color: '#ec4899', textColor: '#ffffff',
                                bounds: [[-6.21942, 106.38515], [-6.21928, 106.38535]],
                            },
                            {
                                label: 'Ruko 2B',
                                color: '#111827', textColor: '#ffffff',
                                bounds: [[-6.21958, 106.38515], [-6.21944, 106.38535]],
                            },
                            {
                                label: 'Ruko 2A',
                                color: '#f9fafb', textColor: '#111827',
                                bounds: [[-6.21974, 106.38515], [-6.21960, 106.38535]],
                            },

                            // --- GROUP TIMUR: 1C (atas) → 1B → 1A (bawah) ---
                            {
                                label: 'Ruko 1C',
                                color: '#f97316', textColor: '#ffffff',
                                bounds: [[-6.21995, 106.38570], [-6.21981, 106.38590]],
                            },
                            {
                                label: 'Ruko 1B',
                                color: '#ef4444', textColor: '#ffffff',
                                bounds: [[-6.22011, 106.38570], [-6.21997, 106.38590]],
                            },
                            {
                                label: 'Ruko 1A',
                                color: '#facc15', textColor: '#7c2d12',
                                bounds: [[-6.22027, 106.38570], [-6.22013, 106.38590]],
                            },
                        ];

                        rukoAreas.forEach(function(r) {
                            var rect = L.rectangle(r.bounds, {
                                color: '#0f172a',
                                weight: 2,
                                fillColor: r.color,
                                fillOpacity: 0.78,
                            }).addTo(map);

                            var center = [
                                (r.bounds[0][0] + r.bounds[1][0]) / 2,
                                (r.bounds[0][1] + r.bounds[1][1]) / 2
                            ];
                            var labelIcon = L.divIcon({
                                className: '',
                                html: '<div style="background:' + r.color + ';color:' + r.textColor + ';padding:3px 8px;border:1.5px solid rgba(0,0,0,0.5);font-size:11px;font-weight:900;white-space:nowrap;box-shadow:0 1px 4px rgba(0,0,0,0.7);font-family:sans-serif;border-radius:2px;pointer-events:none;">' + r.label + '</div>',
                                iconSize: null,
                                iconAnchor: [30, 11],
                            });
                            L.marker(center, {icon: labelIcon, interactive: false}).addTo(map);
                            rect.bindPopup('<b style="font-size:13px">' + r.label + '</b><br><span style="color:#6b7280;font-size:12px">Ruko Jayanti Residence</span>');
                        });

                        // ── KOORDINAT PICKER ──────────────────────────────
                        // Klik di peta untuk melihat koordinat (bantu kalibrasi posisi)
                        var coordBox = document.getElementById('ruko-coord-display');
                        map.on('click', function(e) {
                            if (coordBox) {
                                coordBox.textContent = '📍 Klik: Lat ' + e.latlng.lat.toFixed(7) + ', Lng ' + e.latlng.lng.toFixed(7);
                                coordBox.style.display = 'block';
                            }
                        });

                        setTimeout(function(){ map.invalidateSize(); }, 300);
                    }

                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initRukoMap);
                    } else {
                        setTimeout(initRukoMap, 100);
                    }

                    document.addEventListener('livewire:navigated', function() {
                        setTimeout(initRukoMap, 200);
                    });
                })();
                </script>

                <!-- Ruko Cards Below Map -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 mt-5">
                    @php
                    $rukoData = [
                        ['label' => 'Ruko 1A', 'color_bg' => 'bg-yellow-400', 'color_border' => 'border-yellow-600', 'color_text' => 'text-yellow-800', 'color_card' => 'bg-yellow-50', 'color_ring' => 'ring-yellow-300'],
                        ['label' => 'Ruko 1B', 'color_bg' => 'bg-red-500', 'color_border' => 'border-red-700', 'color_text' => 'text-red-800', 'color_card' => 'bg-red-50', 'color_ring' => 'ring-red-300'],
                        ['label' => 'Ruko 1C', 'color_bg' => 'bg-orange-500', 'color_border' => 'border-orange-700', 'color_text' => 'text-orange-800', 'color_card' => 'bg-orange-50', 'color_ring' => 'ring-orange-300'],
                        ['label' => 'Ruko 2A', 'color_bg' => 'bg-gray-100', 'color_border' => 'border-gray-400', 'color_text' => 'text-gray-800', 'color_card' => 'bg-gray-50', 'color_ring' => 'ring-gray-300'],
                        ['label' => 'Ruko 2B', 'color_bg' => 'bg-gray-900', 'color_border' => 'border-gray-700', 'color_text' => 'text-gray-900', 'color_card' => 'bg-gray-100', 'color_ring' => 'ring-gray-400'],
                        ['label' => 'Ruko 2C', 'color_bg' => 'bg-pink-500', 'color_border' => 'border-pink-700', 'color_text' => 'text-pink-800', 'color_card' => 'bg-pink-50', 'color_ring' => 'ring-pink-300'],
                    ];
                    @endphp
                    @foreach($rukoData as $ruko)
                    <div class="{{ $ruko['color_card'] }} rounded-2xl p-4 border border-gray-200 ring-1 {{ $ruko['color_ring'] }} text-center">
                        <div class="w-10 h-10 {{ $ruko['color_bg'] }} {{ $ruko['color_border'] }} border-2 rounded-full mx-auto mb-2 shadow-md"></div>
                        <p class="text-sm font-bold {{ $ruko['color_text'] }}">{{ $ruko['label'] }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Jayanti Residence</p>
                    </div>
                    @endforeach
                </div>
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

        <div x-show="activeTab === 'deposits'" style="display: none;">
            <!-- Year Filter -->
            <div class="mb-6 flex gap-4 items-center flex-wrap justify-center">
                <span class="text-sm font-semibold text-gray-700">Tahun:</span>
                @foreach($yearsList as $y)
                    <button wire:click="setYear({{ $y }})"
                       class="px-4 py-2 rounded-xl text-sm font-bold transition {{ $selectedYear == $y ? 'bg-emerald-600 text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
                        {{ $y }}
                    </button>
                @endforeach
            </div>

            <!-- Setoran Ruko Table -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden relative">
                <div wire:loading wire:target="setYear" class="absolute inset-0 bg-white/70 z-10 flex items-center justify-center backdrop-blur-sm">
                    <div class="animate-spin rounded-full h-10 w-10 border-4 border-emerald-500 border-t-transparent"></div>
                </div>

                <div class="p-6 border-b border-gray-100 bg-emerald-50">
                    <h3 class="text-xl font-bold text-emerald-900 mb-2">Data Setoran Ruko Tahun {{ $selectedYear }}</h3>
                    <p class="text-sm text-emerald-700">Rincian setoran bulanan tiap ruko pada tahun {{ $selectedYear }}.</p>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600 whitespace-nowrap">
                        <thead class="text-xs text-emerald-800 uppercase bg-emerald-100 border-b border-emerald-200">
                            <tr>
                                <th class="px-4 py-3 font-bold border-r border-emerald-200/50">NO</th>
                                <th class="px-4 py-3 font-bold border-r border-emerald-200/50">NAMA</th>
                                <th class="px-4 py-3 font-bold border-r border-emerald-200/50">RUKO No</th>
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
                                <th class="px-3 py-3 font-bold border-r border-emerald-200/50 text-right">Des</th>
                                <th class="px-4 py-3 font-bold border-r border-emerald-200/50 text-right">TOTAL</th>
                                <th class="px-4 py-3 font-bold border-r border-emerald-200/50 text-center">JML SETORAN</th>
                                <th class="px-4 py-3 font-bold">KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($rukoDeposits as $index => $deposit)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-3 font-medium text-gray-900 border-r border-gray-100 text-center">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 font-bold text-gray-900 border-r border-gray-100">{{ $deposit->name }}</td>
                                    <td class="px-4 py-3 font-semibold text-emerald-600 border-r border-gray-100 text-center">{{ $deposit->ruko_no }}</td>
                                    
                                    @foreach(['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'] as $month)
                                        <td class="px-3 py-3 text-right {{ $deposit->$month > 0 ? 'text-gray-900' : 'text-gray-300' }} {{ $month == 'december' ? 'border-r border-gray-100' : '' }}">
                                            {{ $deposit->$month > 0 ? number_format($deposit->$month, 0, ',', '.') : '-' }}
                                        </td>
                                    @endforeach
                                    
                                    <td class="px-4 py-3 font-bold text-emerald-700 border-r border-gray-100 text-right">
                                        Rp {{ number_format($deposit->total, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-900 border-r border-gray-100 text-center font-medium">{{ $deposit->deposit_count ?: '-' }}</td>
                                    <td class="px-4 py-3 text-gray-600 text-sm">{{ $deposit->notes }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="18" class="px-6 py-12 text-center text-gray-400">Belum ada data setoran ruko untuk tahun {{ $selectedYear }}.</td></tr>
                            @endforelse
                        </tbody>
                        <tfoot class="bg-gray-50 border-t border-gray-200">
                            <tr>
                                <th colspan="15" class="px-4 py-4 font-bold text-gray-900 text-right">TOTAL KESELURUHAN</th>
                                <th class="px-4 py-4 font-bold text-emerald-700 text-right">Rp {{ number_format($rukoDeposits->sum('total'), 0, ',', '.') }}</th>
                                <th colspan="2"></th>
                            </tr>
                        </tfoot>
                    </table>
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
