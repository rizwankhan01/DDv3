<?php

namespace App\Http\Middleware;

use Closure;

class ServiceManMiddleware
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
      if(auth()->check()){
        if(auth()->user()->user_type!='Service Man'){
          return redirect(403);
        }
          return $next($request);
      }
    }
}
