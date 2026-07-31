<!-- Contact Info -->
<div class="space-y-5">
    @php
        $contacts = [
            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>', 'label' => 'Lokasi Sekretariat', 'value' => 'Sekretariat Pengurus Perumahan Jayanti Residence Blok E', 'link' => 'https://maps.google.com/?q=-6.2198758,106.3852812'],
            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>', 'label' => 'Alamat', 'value' => 'Jl. Jayanti Residence RW 09 Desa Jayanti Kabupaten Tangerang - Banten', 'link' => 'https://maps.google.com/?q=-6.2198758,106.3852812'],
            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>', 'label' => 'Email', 'value' => 'admin@jayantiresidence.co.id'],
            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>', 'label' => 'WhatsApp', 'value' => '08xxxxxxxxxx', 'link' => 'https://wa.me/628xxxxxxxxxx'],
            ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>', 'label' => 'Jam Pelayanan', 'value' => 'Senin – Jumat: 08.00 – 16.00 WIB'],
        ];
    @endphp
    @foreach($contacts as $c)
        <div class="flex items-start gap-4">
            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl flex-shrink-0">{!! $c['icon'] !!}</div>
            <div>
                <p class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-0.5">{{ $c['label'] }}</p>
                @if(!empty($c['link']))
                    <a href="{{ $c['link'] }}" target="_blank" rel="noopener noreferrer" class="text-gray-900 font-semibold hover:text-emerald-600 transition-colors inline-flex items-center gap-1.5">
                        {{ $c['value'] }}
                        <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                @else
                    <p class="text-gray-900 font-semibold">{{ $c['value'] }}</p>
                @endif
            </div>
        </div>
    @endforeach
</div>
