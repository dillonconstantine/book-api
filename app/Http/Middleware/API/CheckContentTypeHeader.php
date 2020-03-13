<?php

namespace App\Http\Middleware\API;

use Closure;

class CheckContentTypeHeader
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
        $header = $request->header('Content-Type');

        if ($header !== 'application/vnd.api+json') {
            $errors = [
                'errors' => [
                    'status' => 415,
                    'title'  => 'Invalid Content-Type Header',
                    'detail' => 'Content-Type header must be set to application/vnd.api+json'
                ]
            ];

            return response($errors, 415)
                  ->header('Content-Type', 'application/vnd.api+json');
        }

        return $next($request);
    }
}
