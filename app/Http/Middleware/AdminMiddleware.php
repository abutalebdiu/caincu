<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        $urlPrefix = app()->getLocale() == 'ar'?'ar/':'en/';
        if(Auth::check())
        {
            if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3){
                return $next($request);
            }else{
                return redirect()->to(url('/'.$urlPrefix));
            }
        }else{
            return redirect()->route('login');
        }
    }
}
