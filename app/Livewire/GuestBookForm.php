<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GuestBook;
use App\Livewire\Traits\WithPinAndCaptcha;

class GuestBookForm extends Component
{
    use WithPinAndCaptcha;
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

    public function mount()
    {
        $this->generateCaptcha();
    }

    public function submit()
    {
        $this->validatePinAndCaptcha();
        $this->validate();

        GuestBook::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'origin' => $this->origin,
            'purpose' => $this->purpose,
            'visit_date' => $this->visit_date ?: null,
            'status' => 'pending',
        ]);

        $this->reset(['name', 'phone', 'origin', 'purpose', 'visit_date', 'pin', 'captchaAnswer']);
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.guest-book-form')->layout('layouts.app', ['title' => 'Buku Tamu']);
    }
}
