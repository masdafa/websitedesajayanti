<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jangan track request ke admin panel, API, atau asset
        if (!$request->is('admin/*') && !$request->is('api/*') && !$request->ajax()) {
            
            // Dapatkan IP asli, bahkan saat di balik Cloudflare Tunnel / Ngrok
            $ip = $request->header('CF-Connecting-IP') 
                    ?? $request->header('X-Forwarded-For') 
                    ?? $request->ip();

            // Jika X-Forwarded-For berisi multiple IP (dipisah koma), ambil yang pertama
            if (str_contains($ip, ',')) {
                $ip = explode(',', $ip)[0];
            }

            \App\Models\Visitor::firstOrCreate([
                'ip_address' => trim($ip),
                'date' => today(),
            ]);
        }

        return $next($request);
    }
}
