<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /*
         * We Check If The Authenticated User Has THe Requirement To Access Authorized Area
         */
        if (Auth::guard($guard)->check()) {
            if (auth()->user()->hasRole('superadministrator|administrator')) {
                return redirect('/dashboard');
            }

            return redirect('/park/me');
        }

        return $next($request);
    }
}
