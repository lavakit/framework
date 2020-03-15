<?php

namespace Lavakit\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanPublishConfiguration;

/**
 * Class BaseServiceProvider
 * @package Lavakit\Base\Provider
 *
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class BaseServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    protected $middleware = [
        'base' => [

        ]
    ];

    public function boot()
    {
        $this->publishConfig('base', 'base');
    }

    public function register()
    {
        $this->loadHelpers();
    }

    /**
     * Load helpers
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function loadHelpers()
    {
        $helpers = $this->app['files']->glob(__DIR__ . '/../helpers/*.php');

        if ($helpers) {
            foreach ($helpers as $helper) {
                require_once $helper;
            }
        }
    }

    /**
     * Get the service provided by the provider
     * @return array
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function provides()
    {
        return [];
    }
}
