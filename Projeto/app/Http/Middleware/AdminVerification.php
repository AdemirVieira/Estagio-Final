<?php

namespace App\Http\Middleware;

use Closure;

class AdminVerification
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
        if(auth()->check() && $request->user()->admin == 0 || auth()->check() == false){
            return redirect()->guest('/');
        }
        return $next($request);
    }
}
