<?php

namespace Lavakit\Base\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Lavakit\Base\Console\InstallCommand;
use Lavakit\Base\Facades\TitleFacade;
use Lavakit\Base\Traits\CanPublishConfiguration;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;
use Lavakit\Dashboard\Providers\DashboardServiceProvider;
use Lavakit\Page\Providers\PageServiceProvider;
use Lavakit\Theme\Providers\ThemeServiceProvider;
use Lavakit\User\Providers\UserServiceProvider;

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
     * Bootstrap the application services
     *
     * @copyright 2020 Lavakit Group
     */
    public function boot()
    {
        //Load configurations
        $this->publishConfig('base', 'base');

        $this->loadHelpers(self::$module);

        /*Register middleware*/
        $this->registerMiddleware();

        $this->loadProviders();

        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'base');
    }

    /**
     * Register the application services
     *
     * @copyright 2020 Lavakit Group
     */
    public function register()
    {
        $this->app->singleton('lavakit.isBackend', function () {
            return $this->isBackend();
        });

        $this->app->singleton('lavakit.isPageAuth', function () {
            return $this->isPageAuth();
        });

        $this->app->singleton('lavakit.isInstalled', function () {
            return $this->isInstalled();
        });

        $this->registerCommands();

        //Register aliases
        $this->registerFacadeAlias($this->facadeAliases);
    }

    /**
     * Register providers
     *
     * @copyright 2020 Lavakit Group
     */
    protected function loadProviders()
    {
        $this->app->register(ThemeServiceProvider::class);
        $this->app->register(DashboardServiceProvider::class);
        $this->app->register(PageServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
    }

    /**
     * Register commands
     *
     * @copyright 2020 Lavakit Group
     */
    private function registerCommands()
    {
        $this->commands([
            InstallCommand::class
        ]);
    }

    /**
     * Register the filters
     *
     * @copyright 2020 Lavakit Group
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
     * Check if the current URL matches the configured backend uri
     *
     * @return bool
     * @copyright 2020 Lavakit Group
     */
    private function isBackend()
    {
        $url = app(Request::class)->path();

        if (Str::contains($url, config('base.base.admin-prefix'))) {
            return true;
        }

        return false;
    }

    /**
     * Check if the current URL matches the configured Authentication uri
     *
     * @return bool
     * @copyright 2020 Lavakit Group
     */
    private function isPageAuth()
    {
        $url = app(Request::class)->path();

        if (Str::contains($url, config('user.user.auth-prefix'))) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    private function isInstalled()
    {
        return true === config('base.base.is_installed');
    }


    /**
     * Get the service provided by the provider
     * @return array
     *
     * @copyright 2020 Lavakit Group
     */
    public function provides()
    {
        return [];
    }
}
