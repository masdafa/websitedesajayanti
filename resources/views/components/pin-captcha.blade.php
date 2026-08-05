@props(['num1', 'num2'])

<div class="space-y-4 mb-6 pt-4 border-t border-gray-100">
    <div>
        <h4 class="text-sm font-semibold text-gray-900 mb-1">Keamanan Layanan (Warga Perumahan)</h4>
        <p class="text-xs text-gray-500 mb-4">Layanan ini hanya untuk warga. Silakan masukkan PIN dan selesaikan pertanyaan di bawah ini.</p>
    </div>

    <!-- PIN Rahasia -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">PIN Rahasia Perumahan <span class="text-red-500">*</span></label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <input type="password" wire:model="pin" class="pl-10 w-full rounded-xl border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" placeholder="Masukkan PIN rahasia">
        </div>
        @error('pin') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
    </div>

    <!-- Captcha -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Berapa hasil dari <strong>{{ $num1 }} + {{ $num2 }}</strong>? <span class="text-red-500">*</span></label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            </div>
            <input type="text" inputmode="numeric" wire:model="captchaAnswer" class="pl-10 w-full rounded-xl border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" placeholder="Ketik angka hasil penjumlahan">
        </div>
        @error('captchaAnswer') <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span> @enderror
    </div>
</div>
