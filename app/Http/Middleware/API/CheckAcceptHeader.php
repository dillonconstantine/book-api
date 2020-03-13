<?php

namespace App\Http\Middleware\API;

use Closure;

class CheckAcceptHeader
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
        $header = $request->header('Accept');

        if ($header !== 'application/vnd.api+json') {
            $errors = [
                'errors' => [
                    'status' => 406,
                    'title'  => 'Invalid Accept Header',
                    'detail' => 'Accept header must be set to application/vnd.api+json'
                ]
            ];

            return response($errors, 406)
                  ->header('Content-Type', 'application/vnd.api+json');
        }

        return $next($request);
    }
}
