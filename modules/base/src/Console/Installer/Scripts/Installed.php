<?php

namespace Lavakit\Base\Console\Installer\Scripts;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Lavakit\Base\Console\Installer\Scripts\Writers\EnvFile;
use Lavakit\Base\Contracts\Console\SetupScript;

/**
 * Class Installed
 *
 * @package Lavakit\Base\Console\Installer\Scripts
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class Installed implements SetupScript
{
    /**
     * @var EnvFile
     */
    protected $env;
    
    public function __construct(EnvFile $env)
    {
        $this->env = $env;
    }
    
    /**
     * Run the install script
     *
     * @param Command $command
     * @return mixed|void
     * @throws FileNotFoundException
     */
    public function run(Command $command)
    {
        $vars['installed'] = 'true';
        $this->env->write($vars);
    
        $command->info('The application is now installed');
    }
}
