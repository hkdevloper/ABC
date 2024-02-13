<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        /// check if login route is defined or nor
        if (Route::has('login')) {
            return $request->expectsJson() ? null : route('login');
        }
        return $request->expectsJson() ? null : route('auth.login');
    }
}
