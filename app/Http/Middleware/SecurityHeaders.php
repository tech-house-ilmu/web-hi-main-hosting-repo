<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // csp
        $isDev = app()->environment('local') || config('app.debug') || file_exists(public_path('hot'));
        $viteOrigins = $isDev ? ' http://127.0.0.1:5173 http://localhost:5173' : '';
        $viteConnect = $isDev ? ' http://127.0.0.1:5173 http://localhost:5173 ws://127.0.0.1:5173 ws://localhost:5173' : '';

        $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com https://code.jquery.com{$viteOrigins}; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com https://fonts.googleapis.com{$viteOrigins}; font-src 'self' https://cdnjs.cloudflare.com https://fonts.gstatic.com data:; img-src 'self' data: https: blob:; connect-src 'self' https: ws: wss:{$viteConnect}; frame-ancestors 'self'; form-action 'self'; base-uri 'self'; object-src 'none';");

        // xcty
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // xfo
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // referrer policy
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // hsts
        if ($request->isSecure() || app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        header_remove('X-Powered-By');
        $response->headers->remove('X-Powered-By');

        return $response;
    }
}
