<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIfIsAdmin
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
        if(!auth()->user()->isAdmin())
        {
            session()->flash('error','You are not authorized for this route.');
            return back();
        }
        
        return $next($request);
    }
}
