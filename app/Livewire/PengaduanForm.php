<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResidentReport;
use App\Models\ServiceInfo;
use Livewire\Attributes\Validate;
use Illuminate\Http\Request;

class PengaduanForm extends Component
{
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

    public bool $submitted = false;
    public bool $isLocked = false;

    public function mount(Request $request)
    {
        if ($request->has('kategori')) {
            $this->category = $request->query('kategori');
            $this->isLocked = true;
        }
    }

    public function submit()
    {
        $this->validate();

        ResidentReport::create([
            'name'     => $this->name,
            'phone'    => $this->phone,
            'address'  => $this->address,
            'category' => $this->category,
            'message'  => $this->message,
        ]);

        $this->reset(['name', 'phone', 'address', 'message']);
        $this->submitted = true;
    }

    public function render()
    {
        $services = ServiceInfo::orderBy('sort_order')->get();
        return view('livewire.pengaduan-form', compact('services'))
            ->layout('layouts.app', ['title' => 'Form Pengaduan & Layanan']);
    }
}
