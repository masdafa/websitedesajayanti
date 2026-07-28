<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Agenda as AgendaModel;

class Agenda extends Component
{
    public function render()
    {
        $agendas = AgendaModel::where('is_published', true)
            ->orderBy('event_date', 'asc')
            ->get()
            ->groupBy(fn($a) => $a->event_date->format('Y-m'));

        return view('livewire.agenda', compact('agendas'))
            ->layout('layouts.app', ['title' => 'Agenda Kegiatan - Perumahan Jayanti Residence']);
    }
}
