<?php

namespace Lavakit\Base\Traits;

/**
 * Trait CanPublishConfiguration
 *
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
trait CanPublishConfiguration
{
    /**
     * @param string $module
     * @param string $filename
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function publishConfig(string $module, string $filename)
    {
        if (app()->environment() === 'testing') {
            return;
        }

        $this->mergeConfigFrom($this->getModuleConfigFilePath($module, $filename), strtolower("$module.$filename"));

        if (app()->runningInConsole()) {
            $pathConfig = strtolower("Lavakit/$module/$filename") . '.php';
            $this->publishes([
                $this->getModuleConfigFilePath($module, $filename) => config_path($pathConfig)
            ], 'config');
        }
    }

    /**
     * Get path of the give file name in the given module
     *
     * @param string $module
     * @param string $file
     * @return string
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    private function getModuleConfigFilePath(string $module, string $file)
    {
         return $this->getModulePath($module) . "/config/$file.php";
    }

    /**
     * @param string $module
     * @return string
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    private function getModulePath(string $module)
    {
        return __DIR__ . "../../../$module";
    }
}
