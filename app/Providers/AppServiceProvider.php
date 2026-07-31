<?php

namespace App\Providers;

use Illuminate\Support\Number;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS if behind proxy (Cloudflare/Ngrok)
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Pastikan format angka bekerja dengan atau tanpa ekstensi intl
        if (extension_loaded('intl')) {
            Number::useLocale('id');
        } else {
            // Fallback: override format() agar tidak butuh intl
            Number::macro('format', function (int|float $number, ?int $precision = null, ?int $maxPrecision = null, ?string $locale = null): string {
                return number_format(
                    $number,
                    $precision ?? 0,
                    ',',
                    '.'
                );
            });
        }
    }
}
