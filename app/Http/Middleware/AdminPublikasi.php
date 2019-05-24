<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminPublikasi
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
        $access = ['BPI', 'PIT', 'SQC', 'HUMAS'];
        if (in_array(Session::get('divisi'), $access)) {
            return $next($request);
        } else {
			return redirect()->route('panel.index')->with('alert', 'Anda tidak memiliki akses');
        }
    }
}
