<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckUser
{
    public function handle($request, Closure $next)
    {
         if (Auth::user()) {
         	if (Auth::user()->jenis_user != 'admin') {
         		return $next($request);
         	}
         	else{
         		return $next($request);
         	}
         }

        return redirect('/');
    }
}