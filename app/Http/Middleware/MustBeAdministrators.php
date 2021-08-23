<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdministrators
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) : mixed
    {
        if (auth()->user()?->admin === 1)
        {
            return $next($request);
        }
        return back()->with('adminErrorMessage', 'Only Administrator can access this');
    }
}
