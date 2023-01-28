<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        if ($request->header("Authorization") == "") {
            return makeJson(400, "No access token", null);
        }

        if ($request->header('Authorization') == env('APP_KEY')) {
            return $next($request);
        } else {
            return makeJson(401, "Unauthorized access token", null);
        }
    }
}
