<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;
class VerifyCategoriesCount
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
        if(Category::all()->count() <1){
            
            session()->flash('error','You need to have at least one category to be able to create a post');
            return redirect('categories/new');
        }
        return $next($request);
    }
}
