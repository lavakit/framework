<?php

namespace Lavakit\Base\Console\Installer\Scripts\Packages;

use Illuminate\Console\Command;
use Lavakit\Base\Contracts\Console\SetupScript;

/**
 * Class PassportInstall
 *
 * @package Lavakit\Base\Console\Installer\Scripts\Packages
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class PassportInstall implements SetupScript
{
    /**
     * Run the install script
     *
     * @param Command $command
     * @return mixed|void
     */
    public function run(Command $command)
    {
        $command->call('passport:install', ['--force' => true]);
    }
}
