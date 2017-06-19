<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckUser
{
    public function handle($request, Closure $next)
    {
         if (Auth::user()) {
                return $next($request);
         }

        return redirect('/');
    }
}