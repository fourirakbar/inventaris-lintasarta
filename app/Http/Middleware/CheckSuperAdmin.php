<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckSuperAdmin
{
    public function handle($request, Closure $next)
    {
         if (Auth::user()) {
         	if (Auth::user()->jenis_user == 'superadmin') {
         		return $next($request);
         	}
         	else{
         		return redirect('404');;
         	}
         }

        return redirect('/');
    }
}