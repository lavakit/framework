<?php

namespace Lavakit\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanPublishConfiguration;
use Lavakit\Theme\Providers\ThemeServiceProvider;

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

    protected static $module = 'base';

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

    /**
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function boot()
    {
        $this->loadHelpers(self::$module);
        $this->loadProviders();
    }

    public function register()
    {
        //Load configurations
        $this->publishConfig('base', 'base');
    }

    /**
     * Register providers
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function loadProviders()
    {
        $this->app->register(ThemeServiceProvider::class);
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
