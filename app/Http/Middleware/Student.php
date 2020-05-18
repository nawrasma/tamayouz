<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Student
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


        if (Auth::user()->getRoleUser() === "student") {
            return $next($request);
        }

        if (Auth::user()->getRoleUser() === "manager") {
            return redirect('/homeManager');
        }

        if (Auth::user()->getRoleUser() === "Admin") {
            return redirect('/home');
        }


        dd($request->user()->getRoleUser() .' , '."student"); 
    }
}
