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

            <div class="relative mx-auto bg-transparent rounded-xl p-4" style="width: 1200px; height: 700px;">
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
                <div class="absolute" style="left:730px; top:49px; width:320px; height:2px; border-top:2px dashed #185E82;"></div>
                <div class="absolute" style="left:1049px; top:50px; width:2px; height:130px; border-left:2px dashed #185E82;"></div>

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

                <!-- Level 1 -->
                <div class="org-box" style="left:470px; top:0px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>KETUA RW 09</strong>
                        PARDIANSYAH
                    </div>
                </div>

                <!-- Level 2 -->
                <div class="org-box" style="left:250px; top:180px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>SEKRETARIS</strong>
                        EDY PURGIYANTO
                    </div>
                </div>
                <div class="org-box" style="left:690px; top:180px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>BENDAHARA</strong>
                        M STIAWAN
                    </div>
                </div>
                <div class="org-box" style="left:920px; top:180px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>DKM AL-MUQIMIN</strong>
                    </div>
                </div>

                <!-- Level 3 -->
                <div class="org-box" style="left:120px; top:400px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>KETUA 23</strong>
                        EDY SUSANTO
                    </div>
                </div>
                <div class="org-box" style="left:470px; top:400px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>KETUA RT 24</strong>
                        ATI SURYATI
                    </div>
                </div>
                <div class="org-box" style="left:820px; top:400px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>KETUA RT 25</strong>
                        FAISAL
                    </div>
                </div>

                <!-- Level 4 -->
                <div class="org-box" style="left:200px; top:530px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>HUMAS RT 23</strong>
                        SUKIA
                    </div>
                </div>
                <div class="org-box" style="left:550px; top:530px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>HUMAS RT 24</strong>
                        <div class="text-left text-xs pl-6">
                            1. EDY YUSMANTO<br>
                            2. GEPENG
                        </div>
                    </div>
                </div>
                <div class="org-box" style="left:900px; top:530px;">
                    <div class="org-photo"></div>
                    <div class="org-text">
                        <strong>HUMAS RT 25</strong>
                        WAHONO
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
