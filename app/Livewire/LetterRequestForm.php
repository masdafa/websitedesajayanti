<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LetterRequest;

class LetterRequestForm extends Component
{
    public $name;
    public $nik;
    public $phone;
    public $address;
    public $purpose;
    public $successMessage = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'nik' => 'nullable|string|max:20',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'purpose' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        LetterRequest::create([
            'name' => $this->name,
            'nik' => $this->nik,
            'phone' => $this->phone,
            'address' => $this->address,
            'purpose' => $this->purpose,
            'status' => 'pending',
        ]);

        $this->reset(['name', 'nik', 'phone', 'address', 'purpose']);
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.letter-request-form')->layout('layouts.app', ['title' => 'Pengajuan Surat Pengantar']);
    }
}
