<?php

namespace App\Http\Middleware;

use Closure;

class newLineMiddleware
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
        $content = $response->content();

        $content = str_replace('<br />', "&#13", $content);
        $response->setContent($content);
        return $response;
    }
}
