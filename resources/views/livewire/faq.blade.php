<div>
    <!-- Page Header -->
    <div class="hero-gradient pt-28 pb-16 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 text-emerald-300 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                FAQ
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-white mb-4">Pertanyaan Umum</h1>
            <p class="text-green-300 text-lg max-w-xl mx-auto">Temukan jawaban atas pertanyaan yang sering diajukan warga perumahan.</p>
        </div>
    </div>

    <div class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @forelse($faqs as $faq)
                <div data-aos="fade-up" x-data="{ open: false }" class="bg-white rounded-2xl border border-gray-100 shadow-sm mb-4 overflow-hidden">
                    <button @click="open = !open"
                            class="w-full flex items-center justify-between p-6 text-left hover:bg-green-50 transition-colors group">
                        <h3 class="font-black text-gray-900 text-base pr-6 group-hover:text-green-700 transition-colors">{{ $faq->question }}</h3>
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 group-hover:bg-green-200 flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4 text-green-700 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="px-6 pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-50 pt-4">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 text-gray-400">
                    <svg class="w-16 h-16 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="font-semibold text-lg">Belum ada FAQ tersedia.</p>
                </div>
            @endforelse

            <!-- Still have questions? -->
            <div data-aos="fade-up" data-aos-delay="200" class="mt-12 text-center bg-white rounded-3xl p-8 border border-gray-100 shadow-sm max-w-3xl mx-auto">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3">Tidak menemukan jawaban?</h2>
                <p class="text-gray-600 mb-6 max-w-md mx-auto">Tim pengurus perumahan siap membantu menjawab pertanyaan Anda melalui layanan kontak kami.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/layanan" wire:navigate class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-200 transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Layanan Warga
                    </a>
                    <a href="/kontak" wire:navigate class="px-6 py-3 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 font-bold rounded-xl transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
