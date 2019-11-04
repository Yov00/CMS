<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfRedirectNewPost
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
        function check($con)
        {
            return $con;
        }
        if(check(true))
        {
            return redirect('posts.create');
        }
        else{
          return redirect('categories.index');
          }
    }
}
