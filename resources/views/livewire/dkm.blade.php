<div class="min-h-screen bg-slate-50" x-data="{ tab: 'profil' }">
    <x-ui.page-hero 
        title="DKM Musholla" 
        subtitle="Dewan Kemakmuran Musholla Al-Muhajirin Perumahan Jayanti Residence."
        badge="DKM Musholla"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-2 overflow-x-auto flex gap-2 whitespace-nowrap hide-scrollbar">
            <template x-for="item in [
                { id: 'profil', label: 'Profil' },
                { id: 'struktur', label: 'Struktur Pengurus' },
                { id: 'kegiatan', label: 'Kegiatan' },
                { id: 'laporan', label: 'Laporan Keuangan' },
                { id: 'ziswaf', label: 'Ziswaf' },
                { id: 'phbi', label: 'PHBI' },
                { id: 'saluran', label: 'Saluran Dakwah' }
            ]">
                <button @click="tab = item.id"
                        :class="tab === item.id ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600'"
                        class="px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200"
                        x-text="item.label"></button>
            </template>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Tab Profil -->
            <div x-show="tab === 'profil'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Profil Musholla</h2>
                    <div class="prose max-w-none text-gray-600 leading-relaxed text-lg">
                        <p>{!! nl2br(e($profileText)) !!}</p>
                        @if($visionText)
                        <br>
                        <p>{!! nl2br(e($visionText)) !!}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tab Struktur Pengurus -->
            <div x-show="tab === 'struktur'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                    <x-dkm.grid :dkmStaffs="$dkmStaffs" />
                </div>
            </div>

            <!-- Tab Kegiatan -->
            <div x-show="tab === 'kegiatan'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                    @if($activities->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($activities as $activity)
                            <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $activity->title }}</h3>
                                <div class="text-sm font-semibold text-emerald-600 mb-3">{{ $activity->schedule }}</div>
                                <p class="text-gray-600 leading-relaxed">{{ $activity->description }}</p>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center p-8">
                            <div class="w-20 h-20 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Jadwal Kegiatan</h3>
                            <p class="text-gray-500 text-lg">Jadwal kegiatan rutin DKM Musholla belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tab Laporan Keuangan -->
            <div x-show="tab === 'laporan'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-blue-50">
                        <h2 class="text-xl font-bold text-blue-900">Laporan Keuangan Kas Musholla</h2>
                        <p class="text-sm text-blue-700 mt-1">Transparansi pemasukan dan pengeluaran kas.</p>
                    </div>
                    <div class="p-8">
                        @if($financialReports->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-600">
                                <thead class="text-xs text-blue-800 uppercase bg-blue-100 border-b border-blue-200">
                                    <tr>
                                        <th class="px-6 py-4 font-bold">Periode</th>
                                        <th class="px-6 py-4 font-bold">Pemasukan</th>
                                        <th class="px-6 py-4 font-bold">Pengeluaran</th>
                                        <th class="px-6 py-4 font-bold">Saldo Akhir</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($financialReports as $report)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-bold text-gray-900">{{ $report->month }} - {{ $report->year }}</td>
                                        <td class="px-6 py-4 font-semibold text-emerald-600">Rp {{ number_format($report->income, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 font-semibold text-red-600">Rp {{ number_format($report->expense, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 font-bold text-blue-700">Rp {{ number_format($report->balance, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="text-center p-8 text-gray-500">
                            Laporan keuangan kas DKM belum tersedia.
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tab Ziswaf -->
            <div x-show="tab === 'ziswaf'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                
                <!-- Laporan Ziswaf Bulanan -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-yellow-50">
                        <h2 class="text-xl font-bold text-yellow-900">Laporan ZISWAF Bulanan</h2>
                        <p class="text-sm text-yellow-700 mt-1">Transparansi penyaluran Zakat, Infaq, Shadaqah, dan Wakaf</p>
                    </div>
                    <div class="p-8">
                        @if($ziswafReports->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-600">
                                <thead class="text-xs text-yellow-800 uppercase bg-yellow-100 border-b border-yellow-200">
                                    <tr>
                                        <th class="px-6 py-4 font-bold">Bulan / Periode</th>
                                        <th class="px-6 py-4 font-bold">Total Penerimaan</th>
                                        <th class="px-6 py-4 font-bold">Total Penyaluran</th>
                                        <th class="px-6 py-4 font-bold">Saldo Akhir</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($ziswafReports as $report)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-bold text-gray-900">{{ $report->month_name }}</td>
                                        <td class="px-6 py-4 font-semibold text-emerald-600">Rp {{ number_format($report->income, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 font-semibold text-red-600">Rp {{ number_format($report->expense, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 font-bold text-blue-700">Rp {{ number_format($report->balance, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="text-center p-8 text-gray-500">Belum ada data laporan ZISWAF.</div>
                        @endif
                    </div>
                </div>

                <!-- Kategori Penerima (8 Asnaf) -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-emerald-50">
                        <h2 class="text-xl font-bold text-emerald-900">Kategori Penerima Zakat (8 Asnaf)</h2>
                    </div>
                    <div class="p-8">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @php
                                $asnaf = [
                                    'Fakir' => 'Orang yang hampir tidak memiliki apa-apa sehingga tidak mampu memenuhi kebutuhan pokok.',
                                    'Miskin' => 'Orang yang memiliki harta namun tidak cukup untuk memenuhi kebutuhan dasar.',
                                    'Amil' => 'Orang yang mengumpulkan dan mendistribusikan zakat.',
                                    'Mualaf' => 'Orang yang baru masuk Islam dan membutuhkan bantuan untuk menguatkan tauhid.',
                                    'Riqab' => 'Hamba sahaya atau budak yang ingin memerdekakan dirinya.',
                                    'Gharimin' => 'Orang yang berhutang untuk kebutuhan halal namun tidak sanggup membayarnya.',
                                    'Fisabilillah' => 'Orang yang berjuang di jalan Allah dalam kegiatan dakwah, pendidikan, dsb.',
                                    'Ibnu Sabil' => 'Musafir yang kehabisan bekal dalam perjalanan yang halal.'
                                ];
                            @endphp
                            @foreach($asnaf as $name => $desc)
                            <div class="bg-slate-50 border border-slate-100 p-4 rounded-2xl hover:border-emerald-200 transition-colors">
                                <h3 class="font-bold text-emerald-700 mb-2">{{ $name }}</h3>
                                <p class="text-sm text-slate-500 leading-relaxed">{{ $desc }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Simulasi Kalkulator Zakat -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden" x-data="{ income: '', zakat: 0, calculate() { this.zakat = this.income ? (this.income * 0.025) : 0; } }">
                    <div class="px-8 py-6 border-b border-gray-100 bg-blue-50">
                        <h2 class="text-xl font-bold text-blue-900">Simulasi Perhitungan Zakat Penghasilan</h2>
                        <p class="text-sm text-blue-700 mt-1">Nishab zakat penghasilan sebesar 85 gram emas per tahun (2,5%)</p>
                    </div>
                    <div class="p-8">
                        <div class="max-w-xl mx-auto space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Total Penghasilan Per Bulan (Rp)</label>
                                <input type="number" x-model="income" @input="calculate()" placeholder="Contoh: 10000000" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-slate-50 text-lg py-3">
                            </div>
                            <div class="bg-blue-500 text-white rounded-2xl p-6 text-center shadow-lg">
                                <p class="text-sm font-medium opacity-90 mb-1">Zakat yang harus dikeluarkan per bulan (2,5%)</p>
                                <div class="text-4xl font-black" x-text="new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(zakat)"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Ziswaf -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden" x-data="{ openZiswafFaq: null }">
                    <div class="px-8 py-6 border-b border-gray-100 bg-purple-50">
                        <h2 class="text-xl font-bold text-purple-900">FAQ: Seputar ZISWAF</h2>
                    </div>
                    <div class="p-4 sm:p-8 space-y-4">
                        @php
                            $ziswaf_faqs = [
                                ['q' => 'Apa syarat wajib zakat mal?', 'a' => 'Syarat wajibnya adalah beragama Islam, merdeka, harta milik sempurna, mencapai nishab (batas minimal), dan telah berlalu masa satu tahun (haul).'],
                                ['q' => 'Apakah zakat profesi/penghasilan itu wajib?', 'a' => 'Ya, mayoritas ulama kontemporer mewajibkan zakat profesi jika penghasilan telah mencapai nishab (senilai 85 gram emas per tahun) dan dikeluarkan sebesar 2,5%.'],
                                ['q' => 'Bolehkah menyalurkan zakat ke luar daerah?', 'a' => 'Pada dasarnya zakat diprioritaskan untuk mustahik di lingkungan terdekat tempat muzakki tinggal. Namun boleh disalurkan ke daerah lain jika ada kebutuhan yang lebih mendesak atau di daerah tersebut sudah terpenuhi.'],
                                ['q' => 'Apa beda Infaq dan Shadaqah?', 'a' => 'Infaq umumnya merujuk pada pemberian harta (materi) di jalan Allah, sedangkan Shadaqah lebih luas mencakup pemberian harta maupun non-harta seperti tenaga, pikiran, atau bahkan senyuman.']
                            ];
                        @endphp

                        @foreach($ziswaf_faqs as $index => $faq)
                        <div class="border border-slate-200 rounded-2xl overflow-hidden">
                            <button @click="openZiswafFaq === {{ $index }} ? openZiswafFaq = null : openZiswafFaq = {{ $index }}" class="w-full px-6 py-4 flex items-center justify-between bg-slate-50 hover:bg-slate-100 transition-colors">
                                <span class="font-bold text-slate-800 text-left">{{ $faq['q'] }}</span>
                                <svg class="w-5 h-5 text-purple-600 transition-transform duration-200" :class="{'rotate-180': openZiswafFaq === {{ $index }}}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="openZiswafFaq === {{ $index }}" class="px-6 py-4 bg-white text-slate-600 leading-relaxed border-t border-slate-100" style="display: none;" x-transition>
                                {{ $faq['a'] }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Tab PHBI -->
            <div x-show="tab === 'phbi'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-purple-50">
                        <h2 class="text-xl font-bold text-purple-900">Peringatan Hari Besar Islam (PHBI)</h2>
                        <p class="text-sm text-purple-700 mt-1">Dokumentasi dan kegiatan hari besar Islam di Musholla Al-Muhajirin.</p>
                    </div>
                    <div class="p-8">
                        @if($phbiEvents->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($phbiEvents as $event)
                            <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl hover:shadow-md hover:border-purple-200 transition-all duration-300 group">
                                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $event->title }}</h3>
                                <div class="text-xs font-semibold text-purple-600 mb-3">{{ $event->date }}</div>
                                <p class="text-sm text-gray-500 leading-relaxed">{{ $event->description }}</p>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center text-gray-500">Belum ada kegiatan PHBI.</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tab Saluran Dakwah -->
            <div x-show="tab === 'saluran'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                
                <!-- Live Dakwah -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-red-50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                            <h2 class="text-xl font-bold text-red-900">Live Dakwah</h2>
                        </div>
                    </div>
                    <div class="p-8">
                        @if($liveDakwahUrl)
                        <div class="aspect-video bg-gray-900 rounded-2xl overflow-hidden shadow-lg border border-gray-200">
                            <iframe class="w-full h-full" src="{{ str_replace('watch?v=', 'embed/', $liveDakwahUrl) }}" title="Live Dakwah" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="{{ $liveDakwahUrl }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                                Buka di YouTube
                            </a>
                        </div>
                        @else
                        <div class="aspect-video bg-gray-50 rounded-2xl flex flex-col items-center justify-center text-gray-400 border-2 border-dashed border-gray-200">
                            <svg class="w-16 h-16 mb-4 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                            <p class="font-medium text-gray-500">Link Live Dakwah Belum Tersedia</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Live Waktu Sholat -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-emerald-50">
                        <h2 class="text-xl font-bold text-emerald-900">Jadwal Waktu Sholat</h2>
                        <p class="text-sm text-emerald-700 mt-1">Resmi Wilayah Kabupaten Tangerang</p>
                    </div>
                    <div class="p-8">
                        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 text-center">
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <p class="text-sm text-slate-500 font-medium mb-1">Imsak</p>
                                <p class="text-xl font-bold text-emerald-700">04:20</p>
                            </div>
                            <div class="bg-emerald-500 p-4 rounded-2xl border border-emerald-600 shadow-sm text-white">
                                <p class="text-sm font-medium mb-1 opacity-90">Subuh</p>
                                <p class="text-xl font-bold">04:30</p>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <p class="text-sm text-slate-500 font-medium mb-1">Dzuhur</p>
                                <p class="text-xl font-bold text-emerald-700">11:55</p>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <p class="text-sm text-slate-500 font-medium mb-1">Ashar</p>
                                <p class="text-xl font-bold text-emerald-700">15:15</p>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <p class="text-sm text-slate-500 font-medium mb-1">Maghrib</p>
                                <p class="text-xl font-bold text-emerald-700">18:00</p>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <p class="text-sm text-slate-500 font-medium mb-1">Isya</p>
                                <p class="text-xl font-bold text-emerald-700">19:15</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Rukun Islam -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden" x-data="{ openFaq: null }">
                    <div class="px-8 py-6 border-b border-gray-100 bg-blue-50">
                        <h2 class="text-xl font-bold text-blue-900">FAQ: Seputar Rukun Islam</h2>
                    </div>
                    <div class="p-4 sm:p-8 space-y-4">
                        @php
                            $faqs = [
                                ['q' => 'Apa itu Syahadat?', 'a' => 'Syahadat adalah persaksian bahwa tiada Tuhan yang berhak disembah selain Allah, dan Nabi Muhammad adalah utusan Allah.'],
                                ['q' => 'Bagaimana ketentuan Sholat 5 waktu?', 'a' => 'Sholat 5 waktu terdiri dari Subuh (2 rakaat), Dzuhur (4 rakaat), Ashar (4 rakaat), Maghrib (3 rakaat), dan Isya (4 rakaat) yang wajib dilaksanakan setiap muslim yang sudah baligh.'],
                                ['q' => 'Apa perbedaan Zakat Fitrah dan Zakat Mal?', 'a' => 'Zakat Fitrah dikeluarkan pada bulan Ramadhan sebelum sholat Idul Fitri (berupa makanan pokok/uang), sedangkan Zakat Mal dikeluarkan apabila harta sudah mencapai nishab dan haul.'],
                                ['q' => 'Siapa saja yang wajib berpuasa Ramadhan?', 'a' => 'Puasa Ramadhan wajib bagi setiap muslim yang baligh, berakal, sehat, dan mukim (tidak sedang musafir), serta suci dari haid dan nifas bagi wanita.'],
                                ['q' => 'Kapan Haji diwajibkan?', 'a' => 'Haji diwajibkan sekali seumur hidup bagi muslim yang mampu, baik secara fisik maupun finansial (istitha\'ah).']
                            ];
                        @endphp

                        @foreach($faqs as $index => $faq)
                        <div class="border border-slate-200 rounded-2xl overflow-hidden">
                            <button @click="openFaq === {{ $index }} ? openFaq = null : openFaq = {{ $index }}" class="w-full px-6 py-4 flex items-center justify-between bg-slate-50 hover:bg-slate-100 transition-colors">
                                <span class="font-bold text-slate-800 text-left">{{ $faq['q'] }}</span>
                                <svg class="w-5 h-5 text-emerald-600 transition-transform duration-200" :class="{'rotate-180': openFaq === {{ $index }}}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="openFaq === {{ $index }}" class="px-6 py-4 bg-white text-slate-600 leading-relaxed border-t border-slate-100" style="display: none;" x-transition>
                                {{ $faq['a'] }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</div>
