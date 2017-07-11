<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
         if (Auth::user()) {
         	if (Auth::user()->jenis_user == 'admin') {
         		return $next($request);
         	}
         	else{
         		return redirect('404');	
         	}
         }

        return redirect('/');
    }
}