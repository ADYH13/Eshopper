<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
    public function handle($request, Closure $next)
    {
        if ($request->status == 1) {
            return redirect('home'); //
        }else{
            return redirect('login');
        }
        //return $next($request);
    }
}
