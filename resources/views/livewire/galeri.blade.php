<div>
    <x-galeri.styles />

    <div class="bg-slate-50 min-h-screen pb-24">
        <x-galeri.hero />
        <x-galeri.grid :galleries="$galleries" />
        <x-galeri.lightbox />
    </div>

    <x-galeri.scripts />
</div>
