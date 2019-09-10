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
            if(in_array(auth()->user()->email, config('app.admin'))){
                dd('You are admin');
            }else{
                dd('You are not');
            }
        }else{
            dd('Please login');
        }

        return $next($request);
    }
}
