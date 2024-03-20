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
        if(auth()->check()){
            // Check if user is Approved or not
            if(!auth()->user()->email_verified_at){
                return $next($request);
            }

            if(!auth()->user()->approved){
                auth()->logout();
            }
        }
        return $next($request);
    }
}
