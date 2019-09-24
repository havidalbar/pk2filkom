<?php

namespace App\Http\Middleware;

use Closure;

class AdminInternal
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
        if (session('divisi') != 'LEMBAGA') {
            return $next($request);
        } else {
			return redirect()->route('panel.index')->with('alert', 'Anda tidak memiliki akses');
        }
    }
}
