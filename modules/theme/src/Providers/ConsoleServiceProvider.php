<?php

namespace Lavakit\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Theme\Console\ThemeGeneratorCommand;
use Lavakit\Theme\Console\ThemeListCommand;

/**
 * Class ConsoleProvider
 * @package Lavakit\Theme\Providers
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class ConsoleServiceProvider extends ServiceProvider
{
    const THEME_CREATE_COMMAND  = 'theme.create';
    const THEME_LIST_COMMAND    = 'theme.list';

    public function register()
    {
        $this->consoleCommand();
    }

    /**
     * Add Commands.
     *
     * @return void
     */
    public function consoleCommand()
    {
        $this->registerThemeGeneratorCommand();
        $this->registerThemeListCommand();

        // Assign commands.
        $this->commands([
            self::THEME_CREATE_COMMAND,
            self::THEME_LIST_COMMAND
        ]);
    }

    /**
     * Register generator command.
     *
     * @return void
     */
    public function registerThemeGeneratorCommand()
    {
        $this->app->singleton(self::THEME_CREATE_COMMAND, function ($app) {
            return new ThemeGeneratorCommand($app['config'], $app['files']);
        });
    }

    /**
     * Register theme list command.
     *
     * @return void
     */
    public function registerThemeListCommand()
    {
        $this->app->singleton(self::THEME_LIST_COMMAND, ThemeListCommand::class);
    }
}