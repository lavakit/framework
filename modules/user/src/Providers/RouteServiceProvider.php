<?php

namespace Lavakit\User\Providers;

use Lavakit\Base\Providers\RoutingServiceProvider as BaseRoutingServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Lavakit\User\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RouteServiceProvider extends BaseRoutingServiceProvider
{
    /**
     * The root namespace to assume when generating URLs to actions.
     * @var string
     */
    protected $namespace = 'Lavakit\User\Http\Controllers';

    /**
     * @return bool|string
     */
    protected function getFrontendRoute()
    {
        return __DIR__ . '/../../routes/frontend.php';
    }

    /**
     * @return string
     */
    protected function getBackendRoute()
    {
        return __DIR__ . '/../../routes/backend.php';
    }

    /**
     * @return string
     */
    protected function getApiRoute()
    {
        return __DIR__ . '/../../routes/apiRoutes.php';
    }
}
