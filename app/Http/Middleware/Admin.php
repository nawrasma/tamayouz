<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::check() && $request->user()->getRoleUser() == "manager") {
            return redirect('/homeManager');
        }

        if (Auth::check() && $request->user()->getRoleUser() == "student") {
            return redirect('/homeStudent');
        }

        if (Auth::check() && $request->user()->getRoleUser() == "Admin") {
            return $next($request);
        }
        dd($request->user()->getRoleUser() .' , '."admin" );
        
        
    }
}
