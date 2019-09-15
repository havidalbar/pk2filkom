<?php

namespace App\Http\Middleware;

use Closure;

class MahasiswaLoggedIn
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
            return $next($request);
        } else {
            return redirect()->back()->with('alert', 'Anda belum login');
        }
    }
}
