<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $local = $request->segment(1);
        if (!array_key_exists($local, config('app.locales'))) {
            $segments = $request->segments();
            $segments[0] = config('app.fallback_locale');
            return redirect(implode('/', $segments));
        }

        App::setLocale($local);
        return $next($request);
    }
}
