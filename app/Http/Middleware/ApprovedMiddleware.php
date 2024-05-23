<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApprovedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->is_validated == true){
                return $next($request);
            }
            else
            {
                return redirect()->route('tests.index')->with("failed", "You Don't have access for this page!");
            }
        }
        else
        {
            return redirect()->route('/login')->with("failed", "You are not Login yet !");
        }
    }
}
