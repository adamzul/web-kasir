<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyKasir 
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role != "kasir") {
            return response()->view('error.UnauthorizedAction');
        }

        return $next($request);
    }
}
