<?php

namespace App\Http\Middleware;

use Closure;

//Added...
use Illuminate\Support\Facades\Auth;
use Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard()->check()) {
			Session::flash('error','you cannot access that page,you are an authenticated user!');
            return redirect('/');
        }

        return $next($request);
    }
}
