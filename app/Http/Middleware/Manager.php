<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Manager
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

        if (Auth::user()->getRoleUser() == "manager") {
            return $next($request);
        }

        if (Auth::user()->getRoleUser() == "student") {
            return redirect('/homeStudent');
        }

        if (Auth::user()->getRoleUser() == "Admin") {
            return redirect('/home');
        }


        dd($request->user()->getRoleUser() .' , '."manager" );
    }
}
