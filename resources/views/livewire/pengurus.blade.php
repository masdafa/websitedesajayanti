<div wire:poll.5s>
    <x-ui.page-hero 
        title="Pengurus Perumahan" 
        subtitle="Susunan Pengurus RT & RW di lingkungan Perumahan Jayanti Residence."
        badge="Struktur Organisasi"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <div class="py-16 bg-gray-50 overflow-x-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-w-max">
            <div class="text-center mb-12 text-[#185E82]">
                <h2 class="text-2xl md:text-3xl font-bold uppercase tracking-wide">STRUKTUR ORGANISASI RW 09</h2>
                <h3 class="text-lg md:text-xl font-medium uppercase mt-2">PERUMAHAN JAYANTI RESIDENCE 2023 - 2028</h3>
            </div>

            <div class="relative mx-auto bg-transparent rounded-xl p-4" style="width: 1300px; height: 700px;">
                <style>
                    .org-box {
                        position: absolute;
                        width: 260px;
                        height: 100px;
                        background-color: #185E82;
                        color: white;
                        display: flex;
                        align-items: center;
                        padding: 8px;
                        border: 2px solid white;
                        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                        z-index: 10;
                    }
                    .org-photo {
                        width: 70px;
                        height: 80px;
                        background-color: #b0bec5;
                        border: 2px solid white;
                        flex-shrink: 0;
                    }
                    .org-text {
                        flex-grow: 1;
                        text-align: center;
                        font-size: 14px;
                        line-height: 1.3;
                        padding: 0 4px;
                    }
                    .org-text strong {
                        display: block;
                        font-size: 15px;
                        margin-bottom: 2px;
                        font-weight: 600;
                    }
                    .org-line-solid {
                        position: absolute;
                        background-color: #185E82;
                    }
                </style>

                <!-- Lines Level 2 -->
                <div class="org-line-solid" style="left:599px; top:100px; width:2px; height:250px;"></div>
                <div class="org-line-solid" style="left:510px; top:229px; width:180px; height:2px;"></div>
                
                <!-- Dashed Line to DKM -->
                <div class="absolute" style="left:730px; top:49px; width:400px; height:2px; border-top:2px dashed #185E82;"></div>
                <div class="absolute" style="left:1129px; top:50px; width:2px; height:130px; border-left:2px dashed #185E82;"></div>

                <!-- Lines Level 3 -->
                <div class="org-line-solid" style="left:250px; top:349px; width:700px; height:2px;"></div>
                <div class="org-line-solid" style="left:249px; top:350px; width:2px; height:50px;"></div>
                <div class="org-line-solid" style="left:599px; top:350px; width:2px; height:50px;"></div>
                <div class="org-line-solid" style="left:949px; top:350px; width:2px; height:50px;"></div>

                <!-- Lines Level 4 (Humas) -->
                <div class="org-line-solid" style="left:149px; top:500px; width:2px; height:80px;"></div>
                <div class="org-line-solid" style="left:150px; top:579px; width:50px; height:2px;"></div>
                
                <div class="org-line-solid" style="left:499px; top:500px; width:2px; height:80px;"></div>
                <div class="org-line-solid" style="left:500px; top:579px; width:50px; height:2px;"></div>
                
                <div class="org-line-solid" style="left:849px; top:500px; width:2px; height:80px;"></div>
                <div class="org-line-solid" style="left:850px; top:579px; width:50px; height:2px;"></div>

                @php
                    $rw = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'rw'));
                    $sek = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'sekretaris'));
                    $ben = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'bendahara'));
                    $dkm = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'dkm'));
                    
                    $rt23 = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'ketua rt 23') || str_contains(strtolower($s->position), 'ketua 23'));
                    $rt24 = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'ketua rt 24') || str_contains(strtolower($s->position), 'ketua 24'));
                    $rt25 = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'ketua rt 25') || str_contains(strtolower($s->position), 'ketua 25'));

                    $hum23 = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'humas rt 23'));
                    $hum24 = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'humas rt 24'));
                    $hum25 = $staffs->first(fn($s) => str_contains(strtolower($s->position), 'humas rt 25'));
                    
                    $bg = fn($s) => $s?->image ? (Str::startsWith($s->image, 'http') ? $s->image : asset('storage/'.$s->image)) : '';
                    $pos = fn($s, $def) => strtoupper($s?->position ?? $def);
                    $name = fn($s, $def) => strtoupper($s?->name ?? $def);
                @endphp

                <!-- Level 1 -->
                <div class="org-box" style="left:470px; top:0px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($rw) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($rw, 'KETUA RW 09') }}</strong>
                        <div class="text-[12px] leading-tight mt-1">{{ $name($rw, 'PARDIANSYAH') }}</div>
                    </div>
                </div>

                <!-- Level 2 -->
                <div class="org-box" style="left:250px; top:180px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($sek) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($sek, 'SEKRETARIS') }}</strong>
                        <div class="text-[12px] leading-tight mt-1">{{ $name($sek, 'EDY PURGIYANTO') }}</div>
                    </div>
                </div>
                <div class="org-box" style="left:690px; top:180px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($ben) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($ben, 'BENDAHARA') }}</strong>
                        <div class="text-[12px] leading-tight mt-1">{{ $name($ben, 'M STIAWAN') }}</div>
                    </div>
                </div>
                <div class="org-box" style="left:1000px; top:180px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($dkm) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($dkm, 'DKM AL-MUQIMIN') }}</strong>
                        @if($dkm && $dkm->name !== '-' && !empty(trim($dkm->name)))
                            <div class="text-[12px] leading-tight mt-1">{{ $name($dkm, '') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Level 3 -->
                <div class="org-box" style="left:120px; top:400px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($rt23) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($rt23, 'KETUA 23') }}</strong>
                        <div class="text-[12px] leading-tight mt-1">{{ $name($rt23, 'EDY SUSANTO') }}</div>
                    </div>
                </div>
                <div class="org-box" style="left:470px; top:400px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($rt24) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($rt24, 'KETUA RT 24') }}</strong>
                        <div class="text-[12px] leading-tight mt-1">{{ $name($rt24, 'ATI SURYATI') }}</div>
                    </div>
                </div>
                <div class="org-box" style="left:820px; top:400px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($rt25) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($rt25, 'KETUA RT 25') }}</strong>
                        <div class="text-[12px] leading-tight mt-1">{{ $name($rt25, 'FAISAL') }}</div>
                    </div>
                </div>

                <!-- Level 4 -->
                <div class="org-box" style="left:200px; top:530px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($hum23) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($hum23, 'HUMAS RT 23') }}</strong>
                        <div class="text-[11px] leading-tight mt-1">{{ $name($hum23, 'SUKIA') }}</div>
                    </div>
                </div>
                <div class="org-box" style="left:550px; top:530px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($hum24) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($hum24, 'HUMAS RT 24') }}</strong>
                        <div class="text-[11px] leading-tight mt-1">
                            @if($hum24 && !empty(trim($hum24->name)))
                                {!! nl2br(e($name($hum24, ''))) !!}
                            @else
                                <div class="text-left text-xs pl-6">
                                    1. EDY YUSMANTO<br>
                                    2. GEPENG
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="org-box" style="left:900px; top:530px;">
                    <div class="org-photo" style="background-image: url('{{ $bg($hum25) }}'); background-size: cover; background-position: center;"></div>
                    <div class="org-text">
                        <strong>{{ $pos($hum25, 'HUMAS RT 25') }}</strong>
                        <div class="text-[11px] leading-tight mt-1">{{ $name($hum25, 'WAHONO') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
