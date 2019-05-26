<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminFull
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
        if (Session::get('is_full_access')) {
            return $next($request);
        } else {
			return redirect()->route('panel.index')->with('alert', 'Anda tidak memiliki akses');
        }
    }
}
