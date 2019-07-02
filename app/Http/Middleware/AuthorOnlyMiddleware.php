<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorOnlyMiddleware
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
        if(Auth::user()->role_id == 3){
            return redirect(route('home'))->with('failed', 'Access Denied');
        }
        return $next($request);
    }
}
