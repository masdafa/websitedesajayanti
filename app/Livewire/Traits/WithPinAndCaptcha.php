<?php

namespace App\Livewire\Traits;

trait WithPinAndCaptcha
{
    public $pin = '';
    public $captchaAnswer = '';
    public $captchaNum1;
    public $captchaNum2;

    public function generateCaptcha()
    {
        $this->captchaNum1 = rand(1, 10);
        $this->captchaNum2 = rand(1, 10);
        $this->captchaAnswer = ''; // Reset on generation
    }

    public function validatePinAndCaptcha()
    {
        $this->validate([
            'pin' => ['required', 'in:jayantiresidence1'],
            'captchaAnswer' => ['required', 'numeric', 'in:' . ($this->captchaNum1 + $this->captchaNum2)],
        ], [
            'pin.required' => 'PIN Rahasia harus diisi.',
            'pin.in' => 'PIN Rahasia tidak valid. Pastikan Anda warga perumahan.',
            'captchaAnswer.required' => 'Captcha harus diisi.',
            'captchaAnswer.in' => 'Jawaban Captcha salah, silakan coba lagi.',
        ]);
    }
}
