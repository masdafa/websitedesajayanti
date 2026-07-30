<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GuestBook;

class GuestBookForm extends Component
{
    public $name;
    public $phone;
    public $origin;
    public $purpose;
    public $visit_date;
    public $successMessage = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'origin' => 'nullable|string|max:255',
        'purpose' => 'required|string',
        'visit_date' => 'nullable|date',
    ];

    public function submit()
    {
        $this->validate();

        GuestBook::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'origin' => $this->origin,
            'purpose' => $this->purpose,
            'visit_date' => $this->visit_date ?: null,
            'status' => 'pending',
        ]);

        $this->reset(['name', 'phone', 'origin', 'purpose', 'visit_date']);
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.guest-book-form')->layout('layouts.app');
    }
}
