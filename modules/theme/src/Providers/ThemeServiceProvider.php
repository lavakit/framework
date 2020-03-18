<?php

namespace Lavakit\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanPublishConfiguration;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;
use Lavakit\Theme\Contracts\Themes\Backend as ThemeBackendContract;
use Lavakit\Theme\Contracts\Themes\Frontend as ThemeFrontendContract;
use Lavakit\Theme\Facades\BackendThemeFacade;
use Lavakit\Theme\Facades\FrontendThemeFacade;
use Lavakit\Theme\Managers\Themes\Backend as ThemeBackend;
use Lavakit\Theme\Managers\Themes\Frontend as ThemeFrontend;
use Lavakit\Theme\Providers\AssetServiceProvider as AssetProvider;
use Lavakit\Theme\Providers\ComposerServiceProvider as ComposerProvider;
use Lavakit\Theme\Providers\ConsoleServiceProvider as ConsoleProvider;
use Config;

/**
 * Class ThemeServiceProvider
 * @package Lavakit\Theme\Providers
 */
class ThemeServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration,
        CanRegisterFacadeAliases;

    protected static $module = 'theme';

    protected $facadeAliases = [
        'ThemeFrontend' => FrontendThemeFacade::class,
        'ThemeBackend' => BackendThemeFacade::class,
    ];

    /**
     * Bootstrap the application services
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function register()
    {
        $this->loadHelpers(self::$module);
        $this->loadConfigurations();
        $this->registerTheme();
        $this->registerMiddleware();

        $this->app->register(AssetProvider::class);
        $this->app->register(ComposerProvider::class);
        $this->app->register(ConsoleProvider::class);

        //Register aliases
        $this->registerFacadeAlias($this->facadeAliases);

        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'theme');
    }

    /**
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function loadConfigurations()
    {
        $this->publishConfig(self::$module, 'theme');
        $this->publishConfig(self::$module, 'frontend');
        $this->publishConfig(self::$module, 'backend');
    }

    /**
     * Register theme Frontend
     *
     * @return void
     */
    protected function registerTheme()
    {
        $this->app->singleton(ThemeFrontendContract::class, function ($app) {
            return new ThemeFrontend(
                $app,
                $this->app['view']->getFinder(),
                $this->app['config'],
                $this->app['translator']
            );
        });

        $this->app->singleton(ThemeBackendContract::class, function ($app) {
            return new ThemeBackend(
                $app,
                $this->app['view']->getFinder(),
                $this->app['config'],
                $this->app['translator']
            );
        });
    }

    /**
     * Add Theme Types Middleware.
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function registerMiddleware()
    {
        if (config('theme.theme.types.enable')) {
            $themeTypes = config('theme.theme.types.middleware');

            foreach ($themeTypes as $middleware => $themeName) {
                $ucFirst = ucfirst($middleware);
                /** Register Middleware */
                $this->app['router']->aliasMiddleware($middleware, "Lavakit\\Theme\\Middleware\\Route{$ucFirst}Middleware");

                /** Push Config middleware theme */
                Config::push('base.base.middleware.' . $middleware, $middleware . ':' . $themeName);
            }
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
