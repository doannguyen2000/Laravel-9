<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckRoleMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if(isset(Auth::user()->role) && Auth::user()->role == "admin"){

            return $next($request);

        }
        
        return redirect()->back()->withErrors('khong du quyen');
    }
}
