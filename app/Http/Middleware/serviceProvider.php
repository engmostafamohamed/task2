<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class serviceProvider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next = null, $guard = 'serviceProvider')
    {

        if (Auth::guard($guard)->check()) {
            return $next($request);
        } else {
            return redirect('serviceProvider/check');
        }
    }
}
