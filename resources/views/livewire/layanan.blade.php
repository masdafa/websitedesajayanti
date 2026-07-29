<div>
    <!-- Page Header -->
    <div class="hero-gradient pt-28 pb-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 text-green-300 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Layanan
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-white mb-4">Layanan Warga</h1>
            <p class="text-green-300 text-lg max-w-xl mx-auto">Sampaikan pengaduan, pertanyaan, atau kebutuhan Anda kepada pengurus perumahan.</p>
        </div>
    </div>

    <div class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Info Cards -->
                <div class="space-y-5">
                    <h2 class="text-xl font-black text-gray-900 mb-4">Info Layanan</h2>
                    @php
                        $serviceColors = ['blue'=>'border-blue-100 bg-blue-50 text-blue-600','red'=>'border-red-100 bg-red-50 text-red-600','green'=>'border-green-100 bg-green-50 text-green-600','amber'=>'border-amber-100 bg-amber-50 text-amber-600'];
                    @endphp
                    @foreach($services as $s)
                        <div class="bg-white rounded-2xl border {{ $serviceColors[$s->color] ?? 'border-green-100 bg-green-50 text-green-600' }} p-5">
                            <div class="mb-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $s->icon }}"/></svg></div>
                            <h3 class="font-bold text-gray-900 mb-1">{{ $s->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $s->description }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Form Pengaduan -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
                        <h2 class="text-2xl font-black text-gray-900 mb-6">Form Pengaduan / Aspirasi</h2>

                        @if($submitted)
                            <div class="text-center py-16">
                                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <h3 class="text-2xl font-black text-gray-900 mb-2">Laporan Terkirim!</h3>
                                <p class="text-gray-500 mb-6">Terima kasih. Laporan Anda akan segera ditindaklanjuti oleh pengurus perumahan.</p>
                                <button wire:click="$set('submitted', false)" class="btn-primary text-white font-bold px-6 py-3 rounded-xl">
                                    Kirim Laporan Lagi
                                </button>
                            </div>
                        @else
                            <form wire:submit="submit" class="space-y-5">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                                        <input wire:model="name" type="text" placeholder="Masukkan nama Anda"
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none text-sm transition">
                                        @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-1.5">No. HP / WhatsApp</label>
                                        <input wire:model="phone" type="text" placeholder="08xxxxxxxxxx"
                                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none text-sm transition">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Rumah</label>
                                    <input wire:model="address" type="text" placeholder="Contoh: Blok A No. 10"
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none text-sm transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Kategori <span class="text-red-500">*</span></label>
                                    <select wire:model="category"
                                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none text-sm transition bg-white">
                                        <option value="Umum">Umum</option>
                                        <option value="Keamanan">Keamanan</option>
                                        <option value="Kebersihan">Kebersihan</option>
                                        <option value="Infrastruktur">Infrastruktur</option>
                                        <option value="Iuran">Iuran</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Isi Laporan / Aspirasi <span class="text-red-500">*</span></label>
                                    <textarea wire:model="message" rows="5" placeholder="Tulis laporan atau aspirasi Anda secara detail..."
                                              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none text-sm transition resize-none"></textarea>
                                    @error('message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit"
                                        class="btn-primary w-full text-white font-bold py-3.5 rounded-xl flex items-center justify-center gap-2 shadow-lg">
                                    <svg wire:loading class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                                    <span wire:loading.remove class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                        Kirim Laporan
                                    </span>
                                    <span wire:loading>Mengirim...</span>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
