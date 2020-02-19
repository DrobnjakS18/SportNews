<?php

namespace App\Http\Middleware;

use Closure;

class CheckPost
{
    /**
     * Handle an incoming request.
     * Check if sent post id is equal to session post_id for that comment
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->get('post_id') !== (int) $request->post) {
            abort(404);
        }

        return $next($request);
    }
}
