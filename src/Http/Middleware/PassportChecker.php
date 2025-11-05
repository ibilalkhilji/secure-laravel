<?php

namespace Ibilalkhilji\SecureLaravel\Http\Middleware;

use Closure;
use Ibilalkhilji\SecureLaravel\Services\PassportValidator;

class PassportChecker
{
    public function handle($request, Closure $next)
    {
        if (app()->runningInConsole()) {
            return $next($request);
        }

        if (!PassportValidator::isValid() && !$request->routeIs('secure.passport.validate')) {
            return response()->view('secure::passport-invalid', [], 403);
        }

        return $next($request);
    }
}
