<?php

namespace App\Http\Middleware;

use Closure;

class LoggedIn
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
        if (session('nim') || session('username')) {
            return $next($request);
        } else {
            return redirect()->back()->with('alert', 'Anda belum login');
        }
    }
}
