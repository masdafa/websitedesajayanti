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
            \App\Models\Visitor::firstOrCreate([
                'ip_address' => $request->ip(),
                'date' => today(),
            ]);
        }

        return $next($request);
    }
}
