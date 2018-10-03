<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AccessUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @paramm  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		
		if( Auth::user()->role != 'user')
        {
			return redirect()->route('stockman');
        }
		
		return $next($request);
    }
}
