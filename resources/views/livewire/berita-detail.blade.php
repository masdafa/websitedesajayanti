<div class="bg-gray-50 min-h-screen">

    {{-- ============================================================ --}}
    {{-- HERO --}}
    {{-- ============================================================ --}}
    <div class="relative bg-emerald-950 overflow-hidden" style="min-height: 440px;">

        {{-- Background Image --}}
        @if(!empty($post->images) && isset($post->images[0]))
            <div class="absolute inset-0">
                <img src="{{ Str::startsWith($post->images[0], 'http') ? $post->images[0] : asset('storage/'.$post->images[0]) }}"
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(4,30,20,0.55) 0%, rgba(4,50,35,0.88) 65%, rgba(4,30,20,0.97) 100%);"></div>
            </div>
        @else
            <div class="absolute inset-0" style="background: linear-gradient(135deg, #064e3b 0%, #047857 50%, #065f46 100%);"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 40px 40px;"></div>
        @endif

        {{-- Soft bottom fade to page bg --}}
        <div class="absolute bottom-0 left-0 right-0 h-32" style="background: linear-gradient(to bottom, transparent, #f9fafb);"></div>

        {{-- Content --}}
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8" style="padding-top: 5rem; padding-bottom: 5.5rem;">

            {{-- Back link --}}
            <a href="/berita" wire:navigate
               class="inline-flex items-center gap-2 text-sm text-emerald-200 hover:text-white font-medium mb-8 group transition-colors duration-200">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Berita
            </a>

            {{-- Category badge --}}
            <div class="mb-5">
                <span class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full"
                      style="background: rgba(52,211,153,0.15); border: 1px solid rgba(110,231,183,0.3); color: #6ee7b7;">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    Berita & Artikel
                </span>
            </div>

            {{-- Title --}}
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight mb-6"
                style="text-shadow: 0 4px 24px rgba(0,0,0,0.5); max-width: 820px;">
                {{ $post->title }}
            </h1>

            {{-- Meta --}}
            @php
                $wordCount = str_word_count(strip_tags($post->content));
                $readTime = max(1, ceil($wordCount / 200));
            @endphp
            <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm text-emerald-200">
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ $post->created_at->translatedFormat('d F Y') }}
                </span>
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $readTime }} menit membaca
                </span>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- MAIN 2-COLUMN LAYOUT --}}
    {{-- ============================================================ --}}
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-20 relative z-10">
        <div class="lg:grid lg:grid-cols-3 lg:gap-10 items-start">

            {{-- ========== Article Body ========== --}}
            <main class="lg:col-span-2">
                <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                    {{-- Featured image inside article (if available) --}}
                    @if(!empty($post->images))
                        <div class="w-full overflow-hidden border-b border-gray-100 relative group" style="height: 380px;" x-data="{ activeSlide: 0, slides: {{ json_encode($post->images) }} }">
                            
                            <!-- Slides -->
                            <template x-for="(slide, index) in slides" :key="index">
                                <img x-show="activeSlide === index"
                                     x-transition:enter="transition ease-out duration-500"
                                     x-transition:enter-start="opacity-0 transform scale-95"
                                     x-transition:enter-end="opacity-100 transform scale-100"
                                     :src="slide.startsWith('http') ? slide : '{{ asset('storage/') }}/' + slide"
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover object-center absolute inset-0">
                            </template>

                            <!-- Prev/Next Arrows -->
                            <template x-if="slides.length > 1">
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button @click="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1" 
                                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white text-gray-800 p-2.5 rounded-full shadow-lg transition z-10 focus:outline-none">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                    </button>
                                    <button @click="activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1" 
                                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/70 hover:bg-white text-gray-800 p-2.5 rounded-full shadow-lg transition z-10 focus:outline-none">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </button>
                                </div>
                            </template>
                            
                            <!-- Indicators -->
                            <template x-if="slides.length > 1">
                                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10 bg-black/30 px-3 py-1.5 rounded-full backdrop-blur-sm">
                                    <template x-for="(slide, index) in slides" :key="index">
                                        <button @click="activeSlide = index"
                                                :class="activeSlide === index ? 'w-6 bg-emerald-400' : 'w-2.5 bg-white/60 hover:bg-white'"
                                                class="h-2.5 rounded-full shadow transition-all duration-300 focus:outline-none"></button>
                                    </template>
                                </div>
                            </template>
                        </div>
                    @endif

                    <div class="p-6 sm:p-10">
                        {{-- Section Label --}}
                        <div class="flex items-center gap-3 mb-8">
                            <div class="h-1 w-10 rounded-full bg-emerald-500"></div>
                            <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Isi Artikel</span>
                        </div>

                        {{-- Content --}}
                        <div class="prose prose-lg prose-emerald max-w-none
                                    prose-headings:font-bold prose-headings:text-gray-900
                                    prose-p:text-gray-700 prose-p:leading-relaxed
                                    prose-a:text-emerald-600 prose-a:no-underline hover:prose-a:underline
                                    prose-img:rounded-xl prose-img:shadow-md
                                    prose-blockquote:border-l-4 prose-blockquote:border-emerald-500 prose-blockquote:bg-emerald-50 prose-blockquote:rounded-r-xl prose-blockquote:py-2 prose-blockquote:pl-4 prose-blockquote:text-gray-600">
                            {!! $post->content !!}
                        </div>

                        {{-- Share Section --}}
                        <div class="mt-12 pt-8 border-t border-gray-100">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Bagikan Artikel Ini</p>
                            <div class="flex flex-wrap gap-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-100 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                                    Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}" target="_blank"
                                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold bg-sky-50 text-sky-700 hover:bg-sky-100 border border-sky-100 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                                    Twitter
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank"
                                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold bg-green-50 text-green-700 hover:bg-green-100 border border-green-100 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Back to all news --}}
                <div class="mt-8">
                    <a href="/berita" wire:navigate
                       class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 hover:border-gray-300 font-semibold text-sm px-5 py-3 rounded-xl transition-all duration-200 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Lihat Semua Berita
                    </a>
                </div>
            </main>

            {{-- ========== Sidebar ========== --}}
            <aside class="mt-10 lg:mt-0 space-y-6 lg:sticky lg:top-24">

                {{-- Info Card --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-5 flex items-center gap-2">
                        <div class="w-1 h-4 bg-emerald-500 rounded-full"></div>
                        Informasi Artikel
                    </h3>
                    <ul class="space-y-5">
                        <li class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl bg-emerald-50 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-medium">Dipublikasikan</p>
                                <p class="text-gray-800 font-semibold text-sm mt-0.5">{{ $post->created_at->translatedFormat('d F Y') }}</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-medium">Estimasi Baca</p>
                                <p class="text-gray-800 font-semibold text-sm mt-0.5">± {{ $readTime }} menit</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl bg-purple-50 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-medium">Kategori</p>
                                <p class="text-gray-800 font-semibold text-sm mt-0.5">Berita & Artikel</p>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- Highlight CTA Card --}}
                <div class="rounded-2xl p-6 text-white shadow-lg" style="background: linear-gradient(135deg, #059669 0%, #0d9488 100%);">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h4 class="font-bold text-base mb-1">Perumahan Jayanti Residence</h4>
                    <p class="text-emerald-100 text-sm leading-relaxed mb-4">Informasi lengkap dan pelayanan untuk seluruh warga perumahan.</p>
                    <a href="/" wire:navigate
                       class="inline-flex items-center gap-1.5 bg-white text-emerald-700 font-bold text-xs px-4 py-2.5 rounded-xl hover:bg-emerald-50 transition-colors duration-200">
                        Ke Beranda
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

            </aside>
        </div>
    </div>
</div>

