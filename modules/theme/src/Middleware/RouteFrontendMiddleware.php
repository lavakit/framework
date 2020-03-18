<?php

namespace Lavakit\Theme\Middleware;

use Closure;
use ThemeFrontend;

/**
 * Class RouteFrontendMiddleware
 * @package Lavakit\Theme\Middleware
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class RouteFrontendMiddleware
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
        ThemeFrontend::set($themeName);

        return $next($request);
    }
}
