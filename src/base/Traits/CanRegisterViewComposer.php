<?php

namespace Lavakit\Base\Traits;

/**
 * Trait CanRegisterViewComposer
 * @package Lavakit\Base\Traits
 *
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
trait CanRegisterViewComposer
{
    /**
     * Register the view composer
     *
     * @param $view
     * @param string $contract
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function registerViewComposer($view, string $contract)
    {
        if (!is_array($view)) {
            $view = [$view];
        }

        if (!class_exists($contract)) {
            return;
        }

        view()->composer($view, $contract);
    }
}
