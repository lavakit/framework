<?php

namespace Lavakit\Base\Traits;

use Illuminate\Foundation\AliasLoader;

/**
 * Trait CanRegisterFacadeAliases
 * @package Lavakit\Base\Traits
 *
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
trait CanRegisterFacadeAliases
{
    /**
     * Load additional alias
     *
     * @param array $alias
     * @return void
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function registerFacadeAlias(array $alias = [])
    {
        if (empty($alias)) {
            return;
        }

        $loader = AliasLoader::getInstance();
        foreach ($alias as $class => $facade) {
            $loader->alias($class, $facade);
        }
    }
}
