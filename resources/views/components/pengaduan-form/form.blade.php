@props(['submitted', 'isLocked', 'category', 'services'])

<div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
    @if($submitted)
        <div class="text-center py-16">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h3 class="text-2xl font-black text-gray-900 mb-2">Laporan Terkirim!</h3>
            <p class="text-gray-500 mb-6">Terima kasih. Laporan/pengajuan Anda akan segera ditindaklanjuti oleh pengurus perumahan.</p>
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
                <select wire:model="category" {{ $isLocked ? 'disabled' : '' }}
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none text-sm transition {{ $isLocked ? 'bg-gray-100 cursor-not-allowed opacity-80 text-gray-700' : 'bg-white' }}">
                    <option value="Umum">Umum</option>
                    @foreach($services as $s)
                        <option value="{{ $s->title }}">{{ $s->title }}</option>
                    @endforeach
                    <option value="Keamanan">Keamanan</option>
                    <option value="Kebersihan">Kebersihan</option>
                    <option value="Infrastruktur">Infrastruktur</option>
                    <option value="Iuran">Iuran</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Isi Laporan / Pengajuan <span class="text-red-500">*</span></label>
                <textarea wire:model="message" rows="5" placeholder="Tulis rincian pengajuan atau aspirasi Anda secara detail..."
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none text-sm transition resize-none"></textarea>
                @error('message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
            <button type="submit"
                    class="btn-primary w-full text-white font-bold py-3.5 rounded-xl flex items-center justify-center gap-2 shadow-lg">
                <svg wire:loading class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                <span wire:loading.remove class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Kirim
                </span>
                <span wire:loading>Mengirim...</span>
            </button>
        </form>
    @endif
</div>
