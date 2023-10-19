<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HkEmailVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->email_verified_at === null){
            return \response()->view('filament-panels::pages.auth.email-verification.email-verification-prompt');
        }
        return $next($request);
    }
}
