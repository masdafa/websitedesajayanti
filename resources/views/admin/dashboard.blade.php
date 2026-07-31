<x-admin-layout title="Dashboard">
    <x-slot:breadcrumb>Selamat datang di panel admin Perumahan Jayanti Residence</x-slot:breadcrumb>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        @php
            $cards = [
                ['label' => 'Berita',    'value' => $stats['posts'],     'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z', 'color' => 'emerald', 'route' => 'admin.posts.index'],
                ['label' => 'Galeri',    'value' => $stats['galleries'], 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z', 'color' => 'blue', 'route' => 'admin.galleries.index'],
                ['label' => 'Pengurus',  'value' => $stats['staff'],     'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'color' => 'violet', 'route' => 'admin.staff.index'],
                ['label' => 'UMKM',      'value' => $stats['products'],  'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z', 'color' => 'orange', 'route' => 'admin.products.index'],
                ['label' => 'Agenda',    'value' => $stats['agendas'],   'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'color' => 'teal', 'route' => 'admin.agendas.index'],
                ['label' => 'Dokumen',   'value' => $stats['documents'], 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'cyan', 'route' => 'admin.documents.index'],
                ['label' => 'FAQ',       'value' => $stats['faqs'],      'icon' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'indigo', 'route' => 'admin.faqs.index'],
                ['label' => 'Pengaduan Baru', 'value' => $stats['reports'], 'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z', 'color' => 'rose', 'route' => 'admin.reports.index'],
            ];
            $colorMap = [
                'emerald' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                'blue'    => 'bg-blue-50 text-blue-700 border-blue-200',
                'violet'  => 'bg-violet-50 text-violet-700 border-violet-200',
                'orange'  => 'bg-orange-50 text-orange-700 border-orange-200',
                'teal'    => 'bg-teal-50 text-teal-700 border-teal-200',
                'cyan'    => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                'indigo'  => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                'rose'    => 'bg-rose-50 text-rose-700 border-rose-200',
            ];
        @endphp
        @foreach($cards as $card)
            <a href="{{ route($card['route']) }}" class="bg-white rounded-2xl border {{ $colorMap[$card['color']] }} p-5 flex items-center gap-4 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center {{ $colorMap[$card['color']] }} flex-shrink-0 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/>
                    </svg>
                </div>
                <div>
                    <div class="text-3xl font-black text-gray-900 tracking-tight">{{ $card['value'] }}</div>
                    <div class="text-xs font-semibold text-gray-500 mt-0.5 uppercase tracking-wide">{{ $card['label'] }}</div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200 shadow-sm p-6 hover:shadow-md transition-shadow">
            <h2 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Statistik Konten
            </h2>
            <div id="contentChart" class="w-full h-72"></div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 hover:shadow-md transition-shadow">
            <h2 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                Komunitas & Interaksi
            </h2>
            <div id="interactionChart" class="w-full h-72 flex items-center justify-center"></div>
        </div>
    </div>

    <!-- Latest Posts -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-8">
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
            <h2 class="font-bold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                Berita Terbaru
            </h2>
            <a href="{{ route('admin.posts.create') }}" class="text-sm bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-4 py-2 rounded-xl shadow-sm shadow-emerald-200 hover:-translate-y-0.5 transition-all duration-200 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah
            </a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($latestPosts as $post)
                <div class="flex items-center gap-4 px-6 py-4 hover:bg-emerald-50/50 transition-colors group">
                    <div class="w-14 h-14 rounded-xl bg-gray-100 overflow-hidden flex-shrink-0 shadow-sm">
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="font-bold text-gray-900 truncate block hover:text-emerald-600 transition-colors">{{ $post->title }}</a>
                        <div class="flex items-center gap-3 text-xs text-gray-500 mt-1">
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    <span class="px-3 py-1.5 rounded-lg text-xs font-bold {{ $post->is_published ? 'bg-emerald-100 text-emerald-700 border border-emerald-200' : 'bg-gray-100 text-gray-600 border border-gray-200' }} shadow-sm">
                        {{ $post->is_published ? 'Publikasi' : 'Draft' }}
                    </span>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="w-10 h-10 rounded-xl flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:bg-emerald-50 transition-colors ml-2 shadow-sm border border-transparent hover:border-emerald-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </a>
                </div>
            @empty
                <div class="px-6 py-12 text-center flex flex-col items-center justify-center">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <p class="text-gray-500 font-medium">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stats = @json($stats);
            
            // Content Chart (Bar)
            const contentOptions = {
                series: [{
                    name: 'Total',
                    data: [stats.posts, stats.galleries, stats.agendas, stats.documents, stats.faqs]
                }],
                chart: {
                    type: 'bar',
                    height: 280,
                    toolbar: { show: false },
                    fontFamily: 'Inter, sans-serif'
                },
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        columnWidth: '45%',
                        distributed: true,
                    }
                },
                colors: ['#10b981', '#3b82f6', '#14b8a6', '#06b6d4', '#6366f1'],
                dataLabels: { enabled: false },
                legend: { show: false },
                xaxis: {
                    categories: ['Berita', 'Galeri', 'Agenda', 'Dokumen', 'FAQ'],
                    labels: { style: { colors: '#6b7280', fontWeight: 500 } },
                    axisBorder: { show: false },
                    axisTicks: { show: false }
                },
                yaxis: {
                    labels: { style: { colors: '#6b7280' } }
                },
                grid: {
                    borderColor: '#f3f4f6',
                    strokeDashArray: 4,
                }
            };
            const contentChart = new ApexCharts(document.querySelector("#contentChart"), contentOptions);
            contentChart.render();

            // Interaction Chart (Donut)
            const interactionOptions = {
                series: [stats.staff, stats.products, stats.reports],
                labels: ['Pengurus', 'UMKM', 'Pengaduan Baru'],
                chart: {
                    type: 'donut',
                    height: 280,
                    fontFamily: 'Inter, sans-serif'
                },
                colors: ['#8b5cf6', '#f97316', '#f43f5e'],
                plotOptions: {
                    pie: {
                        donut: {
                            size: '75%',
                            labels: {
                                show: true,
                                name: { show: true },
                                value: { show: true, fontWeight: 700, fontSize: '24px' },
                                total: {
                                    show: true,
                                    showAlways: true,
                                    label: 'Total',
                                    fontSize: '14px',
                                    fontWeight: 600,
                                    color: '#6b7280'
                                }
                            }
                        }
                    }
                },
                dataLabels: { enabled: false },
                stroke: { width: 0 },
                legend: {
                    position: 'bottom',
                    fontSize: '14px',
                    fontWeight: 500,
                    markers: { radius: 12 }
                }
            };
            const interactionChart = new ApexCharts(document.querySelector("#interactionChart"), interactionOptions);
            interactionChart.render();
        });
    </script>
    @endpush
</x-admin-layout>
