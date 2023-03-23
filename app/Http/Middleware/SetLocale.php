<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (array_key_exists($request->segment(1), config('app.locales'))) {
            app()->setLocale($request->segment(1));
        }

        return $next($request);
    }
}