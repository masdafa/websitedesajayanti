<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ActivityRegistration;

class ActivityRegistrationForm extends Component
{
    public $name;
    public $phone;
    public $activity_name;
    public $notes;
    public $successMessage = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'activity_name' => 'required|string|max:255',
        'notes' => 'nullable|string',
    ];

    public function mount()
    {
        $this->activity_name = request()->query('kegiatan', '');
    }

    public function submit()
    {
        $this->validate();

        ActivityRegistration::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'activity_name' => $this->activity_name,
            'notes' => $this->notes,
            'status' => 'pending',
        ]);

        $this->reset(['name', 'phone', 'activity_name', 'notes']);
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.activity-registration-form')->layout('layouts.app', ['title' => 'Pendaftaran Kegiatan']);
    }
}
