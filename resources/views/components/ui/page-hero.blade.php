@props(['title', 'subtitle', 'badge', 'icon', 'theme' => 'green'])

@php
    $themes = [
        'green' => [
            'bg' => 'bg-gradient-to-br from-green-900 via-emerald-800 to-green-950',
            'text_light' => 'text-green-300',
        ],
        'red' => [
            'bg' => 'bg-gradient-to-br from-red-900 via-red-800 to-red-950',
            'text_light' => 'text-red-300',
        ],
        'blue' => [
            'bg' => 'bg-gradient-to-br from-blue-900 via-blue-800 to-blue-950',
            'text_light' => 'text-blue-300',
        ],
    ];
    $currentTheme = $themes[$theme] ?? $themes['green'];
@endphp

<!-- Page Header -->
<div class="{{ $currentTheme['bg'] }} pt-28 pb-16 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        @if($badge)
        <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 {{ $currentTheme['text_light'] }} text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
            {{ $icon ?? '' }}
            {{ $badge }}
        </span>
        @endif
        <h1 class="text-4xl md:text-5xl font-black text-white mb-4">{{ $title }}</h1>
        <p class="{{ $currentTheme['text_light'] }} text-lg max-w-xl mx-auto">{{ $subtitle }}</p>
    </div>
</div>
