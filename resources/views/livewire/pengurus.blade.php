<div>
    <!-- Page Header -->
    <div class="hero-gradient pt-28 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute bottom-0 right-0 w-72 h-72 rounded-full bg-green-300 blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <span class="inline-flex items-center gap-1.5 bg-white/10 border border-white/20 text-green-300 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Struktur Organisasi
                </span>
                <h1 class="text-4xl md:text-5xl font-black text-white mb-4">Pengurus Perumahan</h1>
                <p class="text-green-300 text-lg max-w-xl mx-auto">Susunan Pengurus RT & RW di lingkungan Perumahan Jayanti Residence.</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="py-16 bg-gray-50 overflow-x-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-w-max">
            
            <style>
                .org-tree {
                    display: flex;
                    justify-content: center;
                    padding-bottom: 2rem;
                }
                .org-tree ul {
                    padding-top: 24px; 
                    position: relative;
                    display: flex; 
                    justify-content: center;
                }
                .org-tree li {
                    text-align: center;
                    list-style-type: none;
                    position: relative;
                    padding: 24px 8px 0 8px;
                    flex: 0 1 auto;
                }
                /* Connecting Lines */
                .org-tree li::before, .org-tree li::after {
                    content: ''; position: absolute; top: 0; right: 50%;
                    border-top: 2px solid #94a3b8; /* Slate 400 */
                    width: 50%; height: 24px;
                }
                .org-tree li::after {
                    right: auto; left: 50%;
                    border-left: 2px solid #94a3b8;
                }
                .org-tree li:only-child::after, .org-tree li:only-child::before {
                    display: none;
                }
                .org-tree li:only-child { padding-top: 0; }
                .org-tree li:first-child::before, .org-tree li:last-child::after { border: 0 none; }
                .org-tree li:last-child::before { border-right: 2px solid #94a3b8; border-radius: 0 4px 0 0; }
                .org-tree li:first-child::after { border-radius: 4px 0 0 0; }
                .org-tree ul ul::before {
                    content: ''; position: absolute; top: 0; left: 50%;
                    border-left: 2px solid #94a3b8;
                    width: 0; height: 24px;
                    margin-left: -1px;
                }

                /* Professional Card Design */
                .org-card {
                    display: inline-flex;
                    flex-direction: column;
                    align-items: center;
                    background: white;
                    border: 1px solid #e2e8f0;
                    border-radius: 12px;
                    padding: 1.25rem 1rem;
                    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
                    min-width: 170px;
                    max-width: 220px;
                    position: relative;
                    transition: all 0.3s ease;
                }
                .org-card:hover {
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
                    transform: translateY(-3px);
                    border-color: #10b981;
                }
                .org-card .avatar {
                    width: 64px;
                    height: 64px;
                    border-radius: 50%;
                    object-fit: cover;
                    margin-bottom: 0.75rem;
                    border: 2px solid #e2e8f0;
                    background-color: #f8fafc;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #64748b;
                    font-size: 1.5rem;
                    font-weight: 900;
                }
                .org-card .name {
                    font-size: 0.95rem;
                    font-weight: 800;
                    color: #1e293b;
                    margin-bottom: 0.25rem;
                    line-height: 1.2;
                }
                .org-card .position {
                    font-size: 0.7rem;
                    font-weight: 700;
                    color: #059669;
                    background-color: #d1fae5;
                    padding: 0.25rem 0.75rem;
                    border-radius: 9999px;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                }
                /* Level 1 Specific Style */
                .level-1 > .org-card {
                    min-width: 240px;
                    border-top: 4px solid #059669;
                    padding: 1.5rem;
                }
                .level-1 > .org-card .avatar {
                    width: 80px; height: 80px;
                    font-size: 2rem;
                    border-color: #d1fae5;
                    color: #059669;
                    background-color: #ecfdf5;
                }
                .level-1 > .org-card .name { font-size: 1.1rem; }
            </style>

            <div class="org-tree">
                @if($staffs->count() > 0)
                    <ul>
                        <li class="level-1">
                            <!-- Top Level (Ketua RW / Kepala) -->
                            <div data-aos="fade-up" class="org-card z-10">
                                <div class="avatar">
                                    @if($staffs[0]->image)
                                        <img src="{{ asset('storage/'.$staffs[0]->image) }}" alt="{{ $staffs[0]->name }}" class="w-full h-full rounded-full object-cover">
                                    @else
                                        {{ substr($staffs[0]->name, 0, 1) }}
                                    @endif
                                </div>
                                <h3 class="name">{{ $staffs[0]->name }}</h3>
                                <p class="position">{{ $staffs[0]->position }}</p>
                            </div>

                            @if($staffs->count() > 1)
                                <ul>
                                    @php
                                        // Level 2 (Sekretaris & Bendahara)
                                        $level2 = $staffs->slice(1, 2);
                                        // Level 3 (RTs / Others)
                                        $level3 = $staffs->slice(3);
                                    @endphp
                                    
                                    @foreach($level2 as $staff)
                                        <li>
                                            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="org-card z-10">
                                                <div class="avatar">
                                                    @if($staff->image)
                                                        <img src="{{ asset('storage/'.$staff->image) }}" alt="{{ $staff->name }}" class="w-full h-full rounded-full object-cover">
                                                    @else
                                                        {{ substr($staff->name, 0, 1) }}
                                                    @endif
                                                </div>
                                                <h3 class="name">{{ $staff->name }}</h3>
                                                <p class="position">{{ $staff->position }}</p>
                                            </div>
                                            
                                            <!-- Subordinates (Level 3) under the first person in Level 2 to create a deeper tree -->
                                            <!-- If we want them balanced, we can attach half to left branch, half to right branch -->
                                            @if($loop->first && $level3->count() > 0)
                                                <ul>
                                                    @foreach($level3 as $subStaff)
                                                        <li>
                                                            <div data-aos="fade-up" data-aos-delay="{{ ($loop->index + 2) * 100 }}" class="org-card z-10">
                                                                <div class="avatar" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                                                    @if($subStaff->image)
                                                                        <img src="{{ asset('storage/'.$subStaff->image) }}" alt="{{ $subStaff->name }}" class="w-full h-full rounded-full object-cover">
                                                                    @else
                                                                        {{ substr($subStaff->name, 0, 1) }}
                                                                    @endif
                                                                </div>
                                                                <h3 class="name" style="font-size: 0.85rem;">{{ $subStaff->name }}</h3>
                                                                <p class="position" style="font-size: 0.65rem;">{{ $subStaff->position }}</p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    </ul>
                @else
                    <div class="text-center text-gray-500 py-12">
                        Data pengurus belum ditambahkan.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
