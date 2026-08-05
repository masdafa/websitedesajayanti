<div>
    <!-- Hero Section -->
    <x-ui.page-hero 
        title="Buku Tamu Digital" 
        subtitle="Mohon isi buku tamu digital jika Anda berkunjung atau memiliki keperluan dengan warga / pengurus."
    />

    <div class="py-16 bg-gray-50/50">
        <div class="container mx-auto px-4 max-w-3xl">
            <!-- Back to Layanan link -->
            <div class="mb-6">
                <a href="{{ route('layanan') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-emerald-600 transition-colors group">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Halaman Layanan
                </a>
            </div>

            @if($successMessage)
                <div class="mb-8 p-6 bg-green-50 rounded-2xl border border-green-200 text-center animate-fade-in">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Terima Kasih!</h3>
                    <p class="text-gray-600">Data kunjungan Anda telah kami rekam. Selamat berkunjung di lingkungan kami.</p>
                    <button wire:click="$set('successMessage', false)" class="mt-6 px-6 py-2.5 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition">
                        Isi Buku Tamu Kembali
                    </button>
                </div>
            @else
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden">
                    <div class="p-8 sm:p-10">
                        <form wire:submit.prevent="submit" class="space-y-6">
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Tamu <span class="text-red-500">*</span></label>
                                    <input type="text" wire:model.defer="name" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 outline-none text-sm placeholder-gray-400" placeholder="Nama Lengkap" required>
                                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">No. Handphone / WA</label>
                                    <input type="text" wire:model.defer="phone" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 outline-none text-sm placeholder-gray-400" placeholder="08xxxxxxxxxx">
                                    @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">Asal / Instansi</label>
                                    <input type="text" wire:model.defer="origin" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 outline-none text-sm placeholder-gray-400" placeholder="Misal: Keluarga Bpk. X, Dinas Kesehatan, dll">
                                    @error('origin') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">Tanggal / Waktu Kunjungan</label>
                                    <input type="datetime-local" wire:model.defer="visit_date" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 outline-none text-sm placeholder-gray-400">
                                    @error('visit_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">Keperluan Kunjungan <span class="text-red-500">*</span></label>
                                <textarea wire:model.defer="purpose" rows="4" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-200 outline-none text-sm placeholder-gray-400 resize-none" placeholder="Sebutkan tujuan kunjungan Anda..." required></textarea>
                                @error('purpose') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <x-pin-captcha :num1="$captchaNum1" :num2="$captchaNum2" />

                            <div class="pt-6">
                                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/30 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                    <span>Kirim Data Kunjungan</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
