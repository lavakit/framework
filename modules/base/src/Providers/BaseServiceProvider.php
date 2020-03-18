<?php

namespace Lavakit\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Facades\TitleFacade;
use Lavakit\Base\Traits\CanPublishConfiguration;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;
use Lavakit\Dashboard\Providers\DashboardServiceProvider;
use Lavakit\Page\Providers\PageServiceProvider;
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
    use CanPublishConfiguration,
        CanRegisterFacadeAliases;

    protected static $module = 'base';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * @var array Facade Aliases
     */
    protected $facadeAliases = [
        'Title' => TitleFacade::class,
    ];

    /**
     * The filters base class name
     * @var array
     */
    protected $middleware = [
        'Base' => [
            'localizationRedirect' => 'LocalizationMiddleware',
            'SessionTimeout' => 'SessionTimeoutMiddleware',
        ]
    ];

    /**
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function boot()
    {
        //Load configurations
        $this->publishConfig('base', 'base');

        $this->loadHelpers(self::$module);

        /*Register middleware*/
        $this->registerMiddleware();

        $this->loadProviders();
    }

    public function register()
    {
        //Register aliases
        $this->registerFacadeAlias($this->facadeAliases);
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
        $this->app->register(DashboardServiceProvider::class);
        $this->app->register(PageServiceProvider::class);
    }

    /**
     * Register the filters
     *
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function registerMiddleware()
    {
        foreach ($this->middleware as $module => $middlewares) {
            foreach ($middlewares as $name => $middleware) {
                $class = "Lavakit\\{$module}\\Http\\Middleware\\{$middleware}";
                $this->app['router']->aliasMiddleware($name, $class);
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
