<?php

namespace Lavakit\User\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanPublishConfiguration;

/**
 * Class UserServiceProvider
 * @package Lavakit\User\Providers
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class UserServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;

    protected static $module = 'user';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'user');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'user');

        if (app()->runningInConsole()) {
            /*Load migrations*/
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([
                __DIR__ . '/../../resources/assets' => resource_path('assets')
            ], 'assets');
            $this->publishes([
                __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/user',
            ], 'views');
            $this->publishes([
                __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/user'),
            ], 'lang');
            $this->publishes([
                __DIR__ . '/../../database' => base_path('database'),
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishConfig('user', 'user');

        //Load helpers
        $this->loadHelpers(self::$module);

        $this->app->register(RouteServiceProvider::class);
    }
}
