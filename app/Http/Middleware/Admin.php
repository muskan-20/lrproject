<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->user_type == 'admin')
        {
            return $next($request);
        }
        elseif(Auth::check() && Auth::user()->user_type == 'user')
        {
            return redirect('/user');
        }
        
    }
}
