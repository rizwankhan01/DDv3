<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if(auth()->user()->user_type=='Investor'){
          return redirect('/investor');
        }else if(auth()->user()->user_type=='Warehouse'){
          return redirect('/stockrequest');
        }else if(auth()->user()->user_type=='Service Man'){
          return redirect('/serviceman');
        }else if(auth()->user()->user_type!='Admin'){
          return redirect(403);
        }
          return $next($request);
      }
    }
}
