<div class="min-h-screen bg-slate-50" x-data="{ tab: 'profil' }">
    <x-galeri.styles />
    <x-ui.page-hero 
        title="DKM Al-Muqimin" 
        subtitle="Dewan Kemakmuran Musholla Al-Muqimin Perumahan Jayanti Residence."
        badge="DKM Al-Muqimin"
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
                { id: 'dokumentasi', label: 'Dokumentasi' },
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
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Profil DKM Al-Muqimin</h2>
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
                            <p class="text-gray-500 text-lg">Jadwal kegiatan rutin DKM Al-Muqimin belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tab Laporan Keuangan -->
            <div x-show="tab === 'laporan'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-blue-50">
                        <h2 class="text-xl font-bold text-blue-900">Laporan Keuangan Kas Al-Muqimin</h2>
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
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden" 
                     x-data="{ 
                        incomeRaw: '', 
                        incomeFormatted: '', 
                        zakat: 0,
                        nisabPerBulan: 8500000, // Asumsi 85 gram emas/tahun dibagi 12 bulan (misal harga emas 1.2jt/gram)
                        wajibZakat: false,
                        formatIncome(value) {
                            let val = value.replace(/\D/g, '');
                            this.incomeRaw = val;
                            this.incomeFormatted = val ? new Intl.NumberFormat('id-ID').format(val) : '';
                            this.wajibZakat = this.incomeRaw >= this.nisabPerBulan;
                            // Sesuai syariat, zakat dihitung jika mencapai nishab
                            this.zakat = this.wajibZakat ? (this.incomeRaw * 0.025) : 0;
                        }
                     }">
                    <div class="px-8 py-6 border-b border-gray-100 bg-blue-50">
                        <h2 class="text-xl font-bold text-blue-900">Simulasi Perhitungan Zakat Penghasilan</h2>
                        <p class="text-sm text-blue-700 mt-1">Nishab zakat penghasilan sebesar 85 gram emas per tahun (2,5%). Asumsi nishab per bulan ~Rp 8.500.000.</p>
                    </div>
                    <div class="p-8">
                        <div class="max-w-xl mx-auto space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Total Penghasilan Per Bulan (Rp)</label>
                                <input type="text" x-model="incomeFormatted" @input="formatIncome($event.target.value)" placeholder="Contoh: 10.000.000" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-slate-50 text-lg py-3">
                            </div>
                            <div class="bg-blue-500 text-white rounded-2xl p-6 text-center shadow-lg relative overflow-hidden">
                                <!-- Indikator Wajib Zakat -->
                                <div x-show="incomeRaw > 0 && !wajibZakat" class="absolute top-0 left-0 w-full bg-yellow-500 text-yellow-900 text-xs font-bold py-1" style="display: none;">
                                    Belum Mencapai Nishab (Belum Wajib Zakat)
                                </div>
                                <div x-show="wajibZakat" class="absolute top-0 left-0 w-full bg-emerald-500 text-white text-xs font-bold py-1" style="display: none;">
                                    Sudah Mencapai Nishab (Wajib Zakat)
                                </div>
                                
                                <p class="text-sm font-medium opacity-90 mb-1 mt-4">Zakat yang harus dikeluarkan per bulan (2,5%)</p>
                                <div class="text-4xl font-black" x-text="new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(zakat)"></div>
                            </div>
                            <p class="text-xs text-center text-gray-500 mt-4">
                                *Sumber referensi nishab dan perhitungan: <strong>Badan Amil Zakat Nasional (BAZNAS) RI</strong> dan <strong>Fatwa MUI</strong>.
                            </p>
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
                        <p class="text-sm text-purple-700 mt-1">Dokumentasi dan kegiatan hari besar Islam di Musholla Al-Muqimin.</p>
                    </div>
                    <div class="p-8">
                        @if($phbiEvents->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($phbiEvents as $event)
                            <div class="bg-slate-50 border border-slate-100 rounded-2xl hover:shadow-md hover:border-purple-200 transition-all duration-300 group overflow-hidden">
                                @if(!empty($event->images))
                                <div class="w-full h-40 bg-gray-200 overflow-hidden relative group" x-data="{ activeSlide: 0, slides: {{ json_encode($event->images) }} }">
                                    <template x-for="(slide, index) in slides" :key="index">
                                        <img x-show="activeSlide === index" :src="'{{ asset('storage') }}/' + slide" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 absolute inset-0" x-transition.opacity.duration.300ms>
                                    </template>
                                    <template x-if="slides.length > 1">
                                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <button @click.prevent="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white p-1.5 rounded-full shadow z-10 focus:outline-none text-gray-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                            </button>
                                            <button @click.prevent="activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white p-1.5 rounded-full shadow z-10 focus:outline-none text-gray-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </button>
                                        </div>
                                    </template>
                                </div>
                                @endif
                                <div class="p-6">
                                    @if(empty($event->images))
                                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                    @endif
                                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $event->title }}</h3>
                                    <p class="text-sm text-gray-500 leading-relaxed">{{ $event->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center text-gray-500">Belum ada kegiatan PHBI.</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tab Dokumentasi -->
            <div x-show="tab === 'dokumentasi'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="pt-4">
                    <div class="flex flex-col sm:flex-row gap-4 items-center justify-end mb-6">
                        <!-- Filter Bulan -->
                        <select wire:model.live="selectedMonth" class="bg-white border-gray-200 text-gray-700 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 w-full sm:w-48 shadow-sm py-2.5">
                            <option value="">Semua Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>

                        <!-- Filter Tahun -->
                        <select wire:model.live="selectedYear" class="bg-white border-gray-200 text-gray-700 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 w-full sm:w-40 shadow-sm py-2.5">
                            <option value="">Semua Tahun</option>
                            @foreach($availableYears as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="-mx-4 sm:-mx-6 lg:-mx-8 -my-16">
                        <x-galeri.grid :galleries="$galleries" />
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
                        @php
                            $dakwahUrls = array_filter([$liveDakwahUrl, $liveDakwahUrl2 ?? null, $liveDakwahUrl3 ?? null, $liveDakwahUrl4 ?? null]);
                            if (!function_exists('getYoutubeEmbedUrl')) {
                                function getYoutubeEmbedUrl($url) {
                                    $videoId = '';
                                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?|live)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                                        $videoId = $match[1];
                                    }
                                    return $videoId ? 'https://www.youtube.com/embed/' . $videoId : $url;
                                }
                            }
                        @endphp
                        
                        @if(count($dakwahUrls) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($dakwahUrls as $index => $url)
                            <div class="bg-gray-50 p-4 rounded-3xl border border-gray-100">
                                <div class="aspect-video bg-gray-900 rounded-2xl overflow-hidden shadow-sm border border-gray-200">
                                    <iframe class="w-full h-full" src="{{ getYoutubeEmbedUrl($url) }}" title="Live Dakwah {{ $index + 1 }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="{{ $url }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-xl transition">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                                        Buka di YouTube
                                    </a>
                                </div>
                            </div>
                            @endforeach
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
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden"
                     x-data="{
                        times: [
                            { name: 'Imsak', time: '04:20' },
                            { name: 'Subuh', time: '04:30' },
                            { name: 'Dzuhur', time: '11:55' },
                            { name: 'Ashar', time: '15:15' },
                            { name: 'Maghrib', time: '18:00' },
                            { name: 'Isya', time: '19:15' }
                        ],
                        nextPrayer: null,
                        notification: '',
                        currentTime: '',
                        init() {
                            this.update();
                            setInterval(() => this.update(), 1000);
                        },
                        update() {
                            let now = new Date();
                            // Convert to WIB (UTC+7)
                            let utc = now.getTime() + (now.getTimezoneOffset() * 60000);
                            let wibDate = new Date(utc + (3600000 * 7));
                            let h = wibDate.getHours();
                            let m = wibDate.getMinutes();
                            let s = wibDate.getSeconds();
                            
                            this.currentTime = (h < 10 ? '0' + h : h) + ':' + (m < 10 ? '0' + m : m) + ':' + (s < 10 ? '0' + s : s);
                            let timeStr = (h < 10 ? '0' + h : h) + ':' + (m < 10 ? '0' + m : m);
                            
                            let nIdx = -1;
                            for (let i = 0; i < this.times.length; i++) {
                                if (timeStr < this.times[i].time) {
                                    nIdx = i;
                                    break;
                                }
                            }
                            if (nIdx === -1) nIdx = 0;
                            this.nextPrayer = this.times[nIdx];
                            
                            let cIdx = nIdx - 1;
                            if (cIdx === -1) cIdx = this.times.length - 1;
                            let currentPrayer = this.times[cIdx];
                            
                            let nextH = parseInt(this.nextPrayer.time.split(':')[0]);
                            let nextM = parseInt(this.nextPrayer.time.split(':')[1]);
                            
                            let currentTotalSeconds = (h * 3600) + (m * 60) + s;
                            let nextTotalSeconds = (nextH * 3600) + (nextM * 60);
                            
                            if (nextTotalSeconds < currentTotalSeconds) {
                                nextTotalSeconds += 24 * 3600;
                            }
                            
                            let diffSeconds = nextTotalSeconds - currentTotalSeconds;
                            
                            if (diffSeconds > 0 && diffSeconds <= 1800) {
                                let diffM = Math.floor(diffSeconds / 60);
                                let diffS = diffSeconds % 60;
                                this.notification = 'Peringatan: Waktu ' + this.nextPrayer.name + ' kurang dari ' + (diffM > 0 ? diffM + ' menit ' : '') + diffS + ' detik lagi.';
                            } else if (timeStr === currentPrayer.time) { 
                                this.notification = 'Saat ini telah masuk waktu ' + currentPrayer.name + '.';
                            } else {
                                this.notification = '';
                            }
                        }
                     }">
                    <div class="px-8 py-6 border-b border-gray-100 bg-emerald-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-emerald-900">Jadwal Waktu Sholat</h2>
                            <p class="text-sm text-emerald-700 mt-1">Resmi Wilayah Kabupaten Tangerang</p>
                        </div>
                        <div class="flex items-center gap-2 px-4 py-2 bg-emerald-600 text-white rounded-xl shadow-md">
                            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="font-bold text-lg tracking-wider" x-text="currentTime"></span>
                            <span class="text-sm font-medium opacity-90">WIB</span>
                        </div>
                    </div>
                    <div class="p-8">
                        
                        <!-- Notification Alert -->
                        <div x-show="notification" class="mb-8 bg-amber-50 border border-amber-200 text-amber-800 px-6 py-4 rounded-xl flex items-center gap-4 shadow-sm" style="display: none;" x-transition>
                            <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0 animate-pulse">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            </div>
                            <p class="font-bold text-lg" x-text="notification"></p>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 text-center">
                            <template x-for="prayer in times">
                                <div :class="nextPrayer && nextPrayer.name === prayer.name ? 'bg-emerald-500 border-emerald-600 shadow-sm text-white transform scale-105' : 'bg-slate-50 border-slate-100 text-slate-500 hover:border-emerald-200 hover:bg-emerald-50/50'" class="p-4 rounded-2xl border transition-all duration-300">
                                    <p class="text-sm font-medium mb-1" :class="nextPrayer && nextPrayer.name === prayer.name ? 'opacity-90' : 'text-slate-500'" x-text="prayer.name"></p>
                                    <p class="text-xl font-bold" :class="nextPrayer && nextPrayer.name === prayer.name ? 'text-white' : 'text-emerald-700'" x-text="prayer.time"></p>
                                </div>
                            </template>
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

    <x-galeri.lightbox />
    <x-galeri.scripts />
</div>
