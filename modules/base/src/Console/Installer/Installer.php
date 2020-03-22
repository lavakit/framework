<?php

namespace Lavakit\Base\Console\Installer;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Foundation\Application;
use Lavakit\Base\Console\Composer;

/**
 * Class Installer
 *
 * @package Lavakit\Base\Console\Installer
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class Installer
{
    /** @var array */
    protected $scripts = [];
    
    /** @var $app Application */
    protected $app;
    
    /** @var Filesystem */
    protected $finder;
    
    /** @var Composer */
    protected $composer;
    
    /**
     * Installer constructor.
     * @param Application $app
     * @param Filesystem $finder
     * @param Composer $composer
     */
    public function __construct(Application $app, Filesystem $finder, Composer $composer)
    {
        $this->app = $app;
        $this->finder = $finder;
        $this->composer = $composer;
    }
    
    /**
     * @param array $scripts
     * @return $this
     */
    public function stack(array $scripts)
    {
        $this->scripts = $scripts;
        
        return $this;
    }
    
    /**
     * Run install scripts
     *
     * @param Command $command
     * @return bool
     */
    public function install(Command $command)
    {
        foreach ($this->scripts as $script) {
            try {
                $this->app->make($script)->run($command);
            } catch (\Exception $ex) {
                $command->error($ex->getMessage());
                
                return false;
            }
        }
        
        return true;
    }
    
    /**
     * @return array
     */
    public function getScripts()
    {
        return $this->scripts;
    }
}
