<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class MultiUserAuth
{
    public function handle(Request $request, Closure $next, $userType)
    {
        if (auth()->check() && auth()->user()->user_type === 'admin') {
            return $next($request);
        }
        return redirect('login')->with('error',"Only admin can access!");
    }
}
