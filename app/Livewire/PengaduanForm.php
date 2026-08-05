<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResidentReport;
use App\Models\ServiceInfo;
use Livewire\Attributes\Validate;
use Illuminate\Http\Request;
use App\Livewire\Traits\WithPinAndCaptcha;
use Livewire\WithFileUploads;

class PengaduanForm extends Component
{
    use WithPinAndCaptcha, WithFileUploads;
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('nullable|string|max:20')]
    public string $phone = '';

    #[Validate('nullable|string|max:255')]
    public string $address = '';

    #[Validate('required|string')]
    public string $category = 'Umum';

    #[Validate('required|string|min:20')]
    public string $message = '';

    #[Validate(['photos.*' => 'image|max:2048'])]
    public array $photos = [];

    public bool $submitted = false;
    public bool $isLocked = false;

    public function mount(Request $request)
    {
        $this->generateCaptcha();

        if ($request->has('kategori')) {
            $this->category = $request->query('kategori');
            $this->isLocked = true;
        }
    }

    public function removePhoto($index)
    {
        if (isset($this->photos[$index])) {
            unset($this->photos[$index]);
            $this->photos = array_values($this->photos); // reindex
        }
    }

    public function submit()
    {
        $this->validatePinAndCaptcha();
        $this->validate();

        if (count($this->photos) > 4) {
            $this->addError('photos', 'Maksimal 4 gambar yang diperbolehkan.');
            return;
        }

        $imagePaths = [];
        foreach ($this->photos as $photo) {
            $imagePaths[] = $photo->store('pengaduan_images', 'public');
        }

        ResidentReport::create([
            'name'     => $this->name,
            'phone'    => $this->phone,
            'address'  => $this->address,
            'category' => $this->category,
            'message'  => $this->message,
            'images'   => count($imagePaths) > 0 ? $imagePaths : null,
        ]);

        $this->reset(['name', 'phone', 'address', 'message', 'photos', 'pin', 'captchaAnswer']);
        $this->submitted = true;
    }

    public function render()
    {
        $services = ServiceInfo::orderBy('sort_order')->get();
        return view('livewire.pengaduan-form', compact('services'))
            ->layout('layouts.app', ['title' => 'Form Pengaduan & Layanan']);
    }
}
