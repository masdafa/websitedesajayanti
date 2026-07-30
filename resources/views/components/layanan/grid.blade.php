@props(['services'])

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @php
        $serviceColors = ['blue'=>'border-blue-100 bg-blue-50 text-blue-600','red'=>'border-red-100 bg-red-50 text-red-600','green'=>'border-green-100 bg-green-50 text-green-600','amber'=>'border-amber-100 bg-amber-50 text-amber-600'];
    @endphp
    @foreach($services as $s)
        <a href="/pengaduan?kategori={{ urlencode($s->title) }}" wire:navigate class="block bg-white rounded-3xl border {{ $serviceColors[$s->color] ?? 'border-green-100 bg-green-50 text-green-600' }} p-6 cursor-pointer hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
            <div class="mb-4 bg-white/50 w-12 h-12 rounded-2xl flex items-center justify-center">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $s->icon }}"/></svg>
            </div>
            <h3 class="text-lg font-black text-gray-900 mb-2">{{ $s->title }}</h3>
            <p class="text-gray-600 leading-relaxed">{{ $s->description }}</p>
        </a>
    @endforeach
</div>
