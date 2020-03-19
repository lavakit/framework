<?php

namespace Lavakit\Base\Console\Installer\Scripts;

use Illuminate\Console\Command;
use Lavakit\Base\Console\Installer\Scripts\Writers\EnvFile;
use Lavakit\Base\Contracts\Console\SetupScript;

/**
 * Class Installed
 * @package Lavakit\Base\Console\Installer\Scripts
 * @copyright 2019 LUCY VN
 * @author Pencii Team <hoatq@lucy.ne.jp>
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
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run(Command $command)
    {
        $vars['installed'] = 'true';
        $this->env->write($vars);
    
        $command->info('The application is now installed');
    }
}
