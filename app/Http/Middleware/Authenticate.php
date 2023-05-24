<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // if user is logged in send them to the dashboard
        if ($request->expectsJson()) {
            return null;
        }
        else {
            return route('admin.login');
        }
    }
}
