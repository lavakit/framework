<?php

namespace Lavakit\Base\Console\Installer\Scripts;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Lavakit\Base\Contracts\Console\SetupScript;

/**
 * Class ProtectInstaller
 *
 * @package Lavakit\Base\Console\Installer\Scripts
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class ProtectInstaller implements SetupScript
{
    /** @var Filesystem */
    protected $finder;
    
    /**
     * ProtectInstaller constructor.
     * @param Filesystem $finder
     */
    public function __construct(Filesystem $finder)
    {
        $this->finder = $finder;
    }
    
    /**
     * Run the install script
     *
     * @param Command $command
     * @return mixed|void
     * @throws \Exception
     */
    public function run(Command $command)
    {
        if ($this->finder->isFile('.env') && !$command->option('force')) {
            throw new \Exception(
                'Lavakit has already been installed. You can already log into your administration. 
                                            Run \'php artisan lavakit:install -f\' to force replace the .env file.'
            );
        }
    }
}
