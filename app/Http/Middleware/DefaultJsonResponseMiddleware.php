<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DefaultJsonResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->setContent(json_encode([
            'content' => $response->getOriginalContent(),
            'status' => $response->isOk() ? 'success' : 'error',
            'code' => $response->status(),
        ]));


        if (! empty($response->getOriginalContent()['exception'])) {
            $response->setContent(json_encode([
                'content' => $response->getOriginalContent()['message'],
                'status' => $response->isOk() ? 'success' : 'error',
                'code' => $response->status(),
            ]));
        }

        return $response;
    }
}
