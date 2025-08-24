<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        dd(Auth::check());
        // return $next($request);
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }
        return redirect('/');
    }
}
