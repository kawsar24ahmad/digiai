<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        dd('Redirecting to login page...');
        if (! $request->expectsJson()) {
            return route('login'); // Change this if needed
        }
    }
}
