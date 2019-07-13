<?php

namespace App\Http\Middleware;

use Closure;

class MahasiswaToLogin
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
        if (session('nim')) {
            return redirect()->route('index');
        } else {
            return $next($request);
        }
    }
}
