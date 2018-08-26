<?php

namespace App\Http\Middleware;

use Closure;


//Added....
use Illuminate\Support\Facades\Auth;
use Session;

class RedirectIfAuthenticatedVendor
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
        if (Auth::guard('vendor')->check()) {
			Session::flash('error','you cannot access that page,you are an authenticated vendor!');
			return redirect('/');
        }
        return $next($request);
    }
}
