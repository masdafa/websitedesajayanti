@props(['documents'])

<div class="space-y-4">
    @forelse($documents as $doc)
        <div data-aos="fade-up" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex items-center gap-5 hover:border-green-200 hover:shadow-md transition-all group">
            <!-- Icon -->
            <div class="flex-shrink-0 w-14 h-14 bg-blue-50 border border-blue-100 rounded-2xl flex items-center justify-center">
                @php
                    $ext = pathinfo($doc->file_path, PATHINFO_EXTENSION);
                    $iconMap = ['pdf'=>'text-red-500','doc'=>'text-blue-500','docx'=>'text-blue-500','xls'=>'text-green-500','xlsx'=>'text-green-500'];
                @endphp
                <svg class="w-7 h-7 {{ $iconMap[$ext] ?? 'text-gray-400' }}" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zm4 18H6V4h7v5h5v11z"/>
                </svg>
            </div>
            <!-- Info -->
            <div class="flex-1 min-w-0">
                <span class="inline-block bg-green-100 text-green-700 text-xs font-bold px-2 py-0.5 rounded-full mb-1">{{ $doc->category }}</span>
                <h3 class="font-black text-gray-900 group-hover:text-green-700 transition-colors leading-snug">{{ $doc->title }}</h3>
                @if($doc->description)
                    <p class="text-gray-500 text-xs mt-0.5">{{ $doc->description }}</p>
                @endif
                <p class="text-gray-400 text-xs mt-1">{{ strtoupper($ext) }} &bull; {{ $doc->created_at->format('d M Y') }}</p>
            </div>
            <!-- Download Button -->
            <a href="{{ asset('storage/'.$doc->file_path) }}" download="{{ $doc->title }}.{{ pathinfo($doc->file_path, PATHINFO_EXTENSION) }}"
               class="flex-shrink-0 btn-primary text-white font-bold px-5 py-2.5 rounded-xl flex items-center gap-2 text-sm shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Unduh
            </a>
        </div>
    @empty
        <div class="text-center py-20 text-gray-400">
            <svg class="w-16 h-16 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <p class="font-semibold text-lg">Belum ada dokumen tersedia.</p>
        </div>
    @endforelse
</div>
