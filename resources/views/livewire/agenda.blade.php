<div wire:poll.5s>
    <x-ui.page-hero 
        title="Agenda Kegiatan" 
        subtitle="Jadwal kegiatan dan acara di lingkungan Perumahan Jayanti Residence."
        badge="Jadwal"
        theme="green"
    >
        <x-slot:icon>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </x-slot:icon>
    </x-ui.page-hero>

    <!-- Agenda Content -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-agenda.routine :routineActivities="$routineActivities" />
            <x-agenda.scheduled :agendas="$agendas" />
        </div>
    </div>
</div>
