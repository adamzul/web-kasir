<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyPelayan 
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role != "pelayan") {
            return response()->view('error.UnauthorizedAction');
        }

        return $next($request);
    }
}
