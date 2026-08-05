@props(['facilities'])

@php
$gradients = [
    ['from' => '#059669', 'to' => '#065f46'],
    ['from' => '#047857', 'to' => '#064e3b'],
    ['from' => '#0d9488', 'to' => '#0f766e'],
    ['from' => '#16a34a', 'to' => '#15803d'],
    ['from' => '#0f766e', 'to' => '#065f46'],
    ['from' => '#15803d', 'to' => '#047857'],
];
@endphp

<section class="py-24 overflow-hidden" style="background: #071a0f;">

    {{-- Background decorations --}}
    <div class="absolute inset-0 pointer-events-none" style="position:relative;">
    </div>
    <div style="position:absolute; top:-150px; left:-150px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle, rgba(34,197,94,0.15) 0%, transparent 70%); pointer-events:none;"></div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:radial-gradient(circle, rgba(16,185,129,0.12) 0%, transparent 70%); pointer-events:none;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="position:relative; z-index:1;">

        {{-- Section Header --}}
        <div data-aos="fade-up" style="text-align:center; margin-bottom:56px;">
            {{-- Badge --}}
            <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(34,197,94,0.1); border:1px solid rgba(34,197,94,0.25); border-radius:99px; padding:6px 16px; margin-bottom:20px;">
                <span style="width:8px; height:8px; border-radius:50%; background:#4ade80; display:inline-block; animation: pulse 2s infinite;"></span>
                <span style="color:#4ade80; font-size:11px; font-weight:700; letter-spacing:0.2em; text-transform:uppercase;">Fasilitas</span>
            </div>

            {{-- Title --}}
            <h2 style="color:#ffffff; font-size:clamp(2rem, 5vw, 3rem); font-weight:900; line-height:1.2; margin-bottom:16px;">
                Fasilitas <span style="color:#4ade80;">Perumahan</span>
            </h2>

            {{-- Subtitle --}}
            <p style="color:rgba(255,255,255,0.5); font-size:1rem; max-width:480px; margin:0 auto;">
                Berbagai fasilitas lengkap untuk kenyamanan dan keamanan seluruh warga
            </p>

            {{-- Divider --}}
            <div style="display:flex; align-items:center; justify-content:center; gap:8px; margin-top:20px;">
                <div style="height:1px; width:48px; background:rgba(74,222,128,0.3);"></div>
                <div style="width:8px; height:8px; border-radius:50%; background:#4ade80;"></div>
                <div style="height:1px; width:48px; background:rgba(74,222,128,0.3);"></div>
            </div>
        </div>

        {{-- Facilities Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($facilities as $f)
            @php
                $g = $gradients[$loop->index % count($gradients)];
                $num = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
            @endphp

            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}"
                 class="facility-card"
                 style="border-radius:16px; overflow:hidden; background:#0d2718; border:1px solid rgba(255,255,255,0.07); transition: transform 0.35s ease, box-shadow 0.35s ease; cursor:default;"
                 onmouseenter="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 24px 48px rgba(0,0,0,0.5), 0 0 0 1px rgba(74,222,128,0.25)'"
                 onmouseleave="this.style.transform='translateY(0)'; this.style.boxShadow='none'">

                {{-- Image / Gradient Area --}}
                <div style="position:relative; height:200px; overflow:hidden;">

                    @if($f->image)
                        <img src="{{ Str::startsWith($f->image, 'http') ? $f->image : asset('storage/'.$f->image) }}"
                             alt="{{ $f->title }}"
                             style="width:100%; height:100%; object-fit:cover; transition:transform 0.6s ease;"
                             class="facility-img">
                    @else
                        <div style="width:100%; height:100%; background: linear-gradient(135deg, {{ $g['from'] }}, {{ $g['to'] }});"></div>
                    @endif

                    {{-- Bottom gradient overlay --}}
                    <div style="position:absolute; inset:0; background:linear-gradient(to bottom, transparent 40%, rgba(0,0,0,0.6) 100%);"></div>

                    {{-- Number badge - top right --}}
                    <div style="position:absolute; top:12px; right:14px; color:rgba(255,255,255,0.4); font-size:11px; font-weight:700; letter-spacing:0.05em;">
                        {{ $num }}
                    </div>

                    {{-- Icon badge - bottom left --}}
                    <div style="position:absolute; bottom:14px; left:14px; width:40px; height:40px; border-radius:10px; display:flex; align-items:center; justify-content:center; background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.25); backdrop-filter:blur(8px);">
                        <svg width="18" height="18" fill="none" stroke="white" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="{{ $f->icon }}" />
                        </svg>
                    </div>
                </div>

                {{-- Card Body --}}
                <div style="padding:18px 20px 20px;" class="facility-body">
                    {{-- Title --}}
                    <h3 style="color:#ffffff; font-size:1.05rem; font-weight:700; margin:0 0 8px; line-height:1.3; transition:color 0.3s;" class="facility-title">
                        {{ $f->title }}
                    </h3>

                    {{-- Description --}}
                    @if($f->description)
                        <p style="color:rgba(255,255,255,0.45); font-size:0.82rem; line-height:1.6; margin:0;">
                            {{ Str::limit($f->description, 80) }}
                        </p>
                    @else
                        <p style="color:rgba(255,255,255,0.28); font-size:0.82rem; font-style:italic; margin:0;">
                            Fasilitas tersedia untuk seluruh warga perumahan
                        </p>
                    @endif

                    {{-- Bottom accent line --}}
                    <div class="facility-line" style="margin-top:14px; height:2px; width:0; border-radius:2px; background:linear-gradient(to right, #4ade80, #22d3ee); transition:width 0.5s ease;"></div>
                </div>
            </div>
            @empty
            <div style="grid-column:span 3; text-align:center; padding:64px 0;">
                <div style="width:56px; height:56px; border-radius:16px; background:rgba(255,255,255,0.05); display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
                    <svg width="28" height="28" fill="none" stroke="rgba(255,255,255,0.3)" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5" />
                    </svg>
                </div>
                <p style="color:rgba(255,255,255,0.35); font-size:0.875rem;">Belum ada data fasilitas.</p>
            </div>
            @endforelse
        </div>

        {{-- Stats Bar --}}
        @if($facilities->count() > 0)
        <div data-aos="fade-up" data-aos-delay="200"
             style="margin-top:56px; display:flex; align-items:center; justify-content:center; gap:48px; flex-wrap:wrap;">

            <div style="text-align:center;">
                <div style="color:#ffffff; font-size:2rem; font-weight:900; line-height:1;">{{ $facilities->count() }}</div>
                <div style="color:rgba(74,222,128,0.7); font-size:10px; font-weight:700; letter-spacing:0.2em; text-transform:uppercase; margin-top:4px;">Total Fasilitas</div>
            </div>

            <div style="width:1px; height:40px; background:rgba(255,255,255,0.1);"></div>

            <div style="text-align:center;">
                <div style="color:#ffffff; font-size:2rem; font-weight:900; line-height:1;">24/7</div>
                <div style="color:rgba(74,222,128,0.7); font-size:10px; font-weight:700; letter-spacing:0.2em; text-transform:uppercase; margin-top:4px;">Tersedia</div>
            </div>

            <div style="width:1px; height:40px; background:rgba(255,255,255,0.1);"></div>

            <div style="text-align:center;">
                <div style="color:#ffffff; font-size:2rem; font-weight:900; line-height:1;">100%</div>
                <div style="color:rgba(74,222,128,0.7); font-size:10px; font-weight:700; letter-spacing:0.2em; text-transform:uppercase; margin-top:4px;">Untuk Warga</div>
            </div>
        </div>
        @endif

    </div>

    {{-- Scoped hover styles --}}
    <style>
        .facility-card:hover .facility-img {
            transform: scale(1.08);
        }
        .facility-card:hover .facility-title {
            color: #4ade80 !important;
        }
        .facility-card:hover .facility-line {
            width: 100% !important;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
    </style>
</section>
