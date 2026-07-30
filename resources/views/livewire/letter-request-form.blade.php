<div>
    <!-- Hero Section -->
    <x-ui.page-hero 
        title="Pengajuan Surat Pengantar" 
        subtitle="Isi form berikut untuk mengajukan surat pengantar dari RT/RW setempat."
    />

    <div class="py-16 bg-gray-50/50">
        <div class="container mx-auto px-4 max-w-3xl">
            @if($successMessage)
                <div class="mb-8 p-6 bg-green-50 rounded-2xl border border-green-200 text-center animate-fade-in">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pengajuan Berhasil Dikirim!</h3>
                    <p class="text-gray-600">Terima kasih, pengajuan surat pengantar Anda akan segera diproses oleh pengurus. Kami akan menghubungi Anda jika surat sudah siap.</p>
                    <button wire:click="$set('successMessage', false)" class="mt-6 px-6 py-2.5 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition">
                        Ajukan Surat Lainnya
                    </button>
                </div>
            @else
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden">
                    <div class="p-8 sm:p-10">
                        <form wire:submit.prevent="submit" class="space-y-6">
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Lengkap Pemohon <span class="text-red-500">*</span></label>
                                    <input type="text" wire:model.defer="name" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition" placeholder="Sesuai KTP" required>
                                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">NIK (Nomor Induk Kependudukan)</label>
                                    <input type="text" wire:model.defer="nik" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition" placeholder="16 digit NIK">
                                    @error('nik') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">No. Handphone / WhatsApp</label>
                                    <input type="text" wire:model.defer="phone" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition" placeholder="08xxxxxxxxxx">
                                    @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-900 mb-2">Alamat Domisili</label>
                                    <input type="text" wire:model.defer="address" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition" placeholder="Nama Jalan, RT/RW, Blok">
                                    @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">Keperluan Pembuatan Surat <span class="text-red-500">*</span></label>
                                <textarea wire:model.defer="purpose" rows="4" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition" placeholder="Misal: Pengantar pembuatan KTP baru, Pengantar Surat Pindah, dll..." required></textarea>
                                @error('purpose') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div class="pt-6">
                                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/30 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                    <span>Kirim Pengajuan</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </button>
                            </div>
                            
                            <div class="mt-4 text-xs text-gray-500 flex items-start gap-2">
                                <svg class="w-4 h-4 flex-shrink-0 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p>Pastikan data yang Anda masukkan sudah benar dan sesuai KTP.</p>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
