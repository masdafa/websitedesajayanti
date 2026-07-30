@props(['faqs'])

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
