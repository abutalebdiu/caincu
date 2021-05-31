<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class GymMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->role_id == 8){
                return $next($request);
            }else{
                return redirect()->route('customer.login');
            }
        }else{
            return redirect()->route('customer.login');
        }
    }
}
