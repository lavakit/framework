<?php

namespace Lavakit\Theme\Middleware;

use Closure;
use ThemeBackend;

/**
 * Class RouteBackendMiddleware
 * @package Lavakit\Theme\Middleware
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RouteBackendMiddleware
{
    /**
     * Handle an incoming request
     *
     * @param $request
     * @param Closure $next
     * @param $themeName
     * @return mixed
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function handle($request, Closure $next, $themeName)
    {
        ThemeBackend::set($themeName);

        return $next($request);
    }
}
