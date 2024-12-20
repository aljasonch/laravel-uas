<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthorizedAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if(!$this->isAdmin($request)){
            abort(HttpResponse::HTTP_UNAUTHORIZED);
       } 
        return $next($request);
    }

    protected function isAdmin($request) {
        return $request->user()->is_admin === 1;
    }
}
