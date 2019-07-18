<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;

class APIMahasiswa
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
        try {
            $nim = JWT::decode($request->header('Authorization'), env('SECRET_TOKEN_KEY'), ['HS256']);
            $request->nim = $nim;

            return $next($request);
        } catch (\Exception $e) {
            return response()->json("Unauthorized", 401);
        }
    }
}
