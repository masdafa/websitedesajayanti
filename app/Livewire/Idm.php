<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\IdmData;

class Idm extends Component
{
    public function render()
    {
        return view('livewire.idm', [
            'idmDatas' => IdmData::orderBy('year', 'desc')->get()
        ]);
    }
}
