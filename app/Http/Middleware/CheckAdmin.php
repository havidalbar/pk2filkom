<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckAdmin
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
        if (Session::get('divisi')) {
            return $next($request);
        } else {
            if ($request->getRequestUri() == '/panel/dashboard') {
                return redirect()->route('panel.login')->with('alert', 'Anda belum login');
            } else {
                return redirect()->route('panel.login', ['redirectTo' => $request->getRequestUri()])->with('alert', 'Anda belum login');
            }
        }
    }
}
