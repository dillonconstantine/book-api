<?php

namespace App\Http\Middleware\API;

use Closure;

class AttachContentTypeHeader
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
        $response = $next($request);

        $response->headers->set('Content-Type', 'application/vnd.api+json');

        return $response;
    }
}
