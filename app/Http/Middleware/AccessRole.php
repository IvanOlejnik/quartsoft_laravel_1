<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Auth\AuthManager
use Illuminate\Support\Facades\Auth;

class AccessRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		
		if( Auth::user()->role != 'admin')
        {
			return redirect()->route('master.index');
        }
		
		return $next($request);
    }
}
