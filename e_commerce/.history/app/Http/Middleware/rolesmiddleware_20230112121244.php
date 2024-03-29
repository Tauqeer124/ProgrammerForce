<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class rolesmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        {
            if (Auth::user() &&  Auth::user()->role == 1) {
                 return $next($request);
            }
    
            return redirect('home')->with('error','You have not admin access');
        }
    }
    }
}
