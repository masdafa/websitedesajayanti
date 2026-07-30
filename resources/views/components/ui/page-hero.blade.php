@props(['title', 'subtitle', 'badge' => null, 'icon' => null, 'theme' => 'green'])

@php
    $themes = [
        'green' => [
            'bg' => 'bg-emerald-900',
            'text_light' => 'text-emerald-100',
            'badge_bg' => 'bg-emerald-800/50',
            'badge_border' => 'border-emerald-700/50',
        ],
        'red' => [
            'bg' => 'bg-rose-900',
            'text_light' => 'text-rose-100',
            'badge_bg' => 'bg-rose-800/50',
            'badge_border' => 'border-rose-700/50',
        ],
        'blue' => [
            'bg' => 'bg-blue-900',
            'text_light' => 'text-blue-100',
            'badge_bg' => 'bg-blue-800/50',
            'badge_border' => 'border-blue-700/50',
        ],
    ];
    $currentTheme = $themes[$theme] ?? $themes['green'];
@endphp

<!-- Page Header -->
<div class="{{ $currentTheme['bg'] }} pt-28 pb-16 relative overflow-hidden">
    <!-- Subtle pattern overlay -->
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center z-10">
        @if($badge)
        <span class="inline-flex items-center gap-1.5 {{ $currentTheme['badge_bg'] }} border {{ $currentTheme['badge_border'] }} text-white text-[11px] font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-6 shadow-sm">
            {{ $icon ?? '' }}
            {{ $badge }}
        </span>
        @endif
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-5 tracking-tight">{{ $title }}</h1>
        <p class="{{ $currentTheme['text_light'] }} text-lg max-w-2xl mx-auto leading-relaxed font-medium">{{ $subtitle }}</p>
    </div>
</div>

