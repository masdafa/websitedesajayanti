@props(['dkmStaffs'])

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($dkmStaffs as $staff)
        <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100 hover:shadow-xl transition-shadow">
            <div class="w-32 h-32 mx-auto rounded-full overflow-hidden bg-gray-200 mb-4 border-4 border-emerald-50">
                @if($staff->image)
                    <img src="{{ asset('storage/'.$staff->image) }}" alt="{{ $staff->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-green-50 to-green-100 text-green-600">
                        <div class="w-20 h-20 rounded-full bg-green-200 flex items-center justify-center text-3xl font-black">
                            {{ substr($staff->name, 0, 1) }}
                        </div>
                    </div>
                @endif
            </div>
            <h3 class="text-lg font-bold text-gray-900">{{ $staff->name }}</h3>
            <p class="text-emerald-600 font-medium mt-1">{{ $staff->position }}</p>
        </div>
    @empty
        <div class="col-span-full text-center py-16">
            <p class="text-gray-400 text-lg">Data pengurus DKM belum ditambahkan.</p>
        </div>
    @endforelse
</div>
