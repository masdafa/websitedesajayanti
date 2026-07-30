@props(['categories'])

<div class="flex flex-col sm:flex-row gap-3 mb-8">
    <input wire:model.live.debounce.400ms="search" type="text" placeholder="Cari dokumen..."
           class="flex-1 px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none text-sm transition bg-white">
    <select wire:model.live="category"
            class="px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none text-sm bg-white min-w-36">
        <option value="all">Semua Kategori</option>
        @foreach($categories as $cat)
            <option value="{{ $cat }}">{{ $cat }}</option>
        @endforeach
    </select>
</div>
