@props(['staffs'])

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
