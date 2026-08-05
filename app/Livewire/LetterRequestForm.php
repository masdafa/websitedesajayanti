<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LetterRequest;
use App\Livewire\Traits\WithPinAndCaptcha;

class LetterRequestForm extends Component
{
    use WithPinAndCaptcha;
    public $name;
    public $nik;
    public $phone;
    public $address;
    public $blok;
    public $nomor_rumah;
    public $rt;
    public $rw;
    public $purpose;
    public $successMessage = false;

    public function mount()
    {
        $this->generateCaptcha();
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'nik' => 'nullable|string|max:20',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'blok' => 'nullable|string|max:10',
        'nomor_rumah' => 'nullable|string|max:10',
        'rt' => 'nullable|string|max:5',
        'rw' => 'nullable|string|max:5',
        'purpose' => 'required|string',
    ];

    public function submit()
    {
        $this->validatePinAndCaptcha();
        $this->validate();

        $fullAddress = trim($this->address);
        $parts = [];
        if ($this->blok) {
            $parts[] = 'Blok ' . $this->blok;
        }
        if ($this->nomor_rumah) {
            $parts[] = 'No. ' . $this->nomor_rumah;
        }
        if ($this->rt || $this->rw) {
            $rt = $this->rt ?: '-';
            $rw = $this->rw ?: '-';
            $parts[] = 'RT ' . $rt . '/RW ' . $rw;
        }

        if (!empty($parts)) {
            $fullAddress .= ($fullAddress ? ', ' : '') . implode(', ', $parts);
        }

        LetterRequest::create([
            'name' => $this->name,
            'nik' => $this->nik,
            'phone' => $this->phone,
            'address' => $fullAddress,
            'purpose' => $this->purpose,
            'status' => 'pending',
        ]);

        $this->reset(['name', 'nik', 'phone', 'address', 'blok', 'nomor_rumah', 'rt', 'rw', 'purpose', 'pin', 'captchaAnswer']);
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.letter-request-form')->layout('layouts.app', ['title' => 'Pengajuan Surat Pengantar']);
    }
}
