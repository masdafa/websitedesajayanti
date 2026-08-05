<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ActivityRegistration;
use App\Livewire\Traits\WithPinAndCaptcha;

class ActivityRegistrationForm extends Component
{
    use WithPinAndCaptcha;
    public $name;
    public $phone;
    public $address;
    public $activity_name;
    public $notes;
    public $successMessage = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'activity_name' => 'required|string|max:255',
        'notes' => 'nullable|string',
    ];

    public function mount()
    {
        $this->generateCaptcha();
        $this->activity_name = request()->query('kegiatan', '');
    }

    public function submit()
    {
        $this->validatePinAndCaptcha();
        $this->validate();

        ActivityRegistration::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'activity_name' => $this->activity_name,
            'notes' => $this->notes,
            'status' => 'pending',
        ]);

        $this->reset(['name', 'phone', 'address', 'activity_name', 'notes', 'pin', 'captchaAnswer']);
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.activity-registration-form')->layout('layouts.app', ['title' => 'Pendaftaran Kegiatan']);
    }
}
