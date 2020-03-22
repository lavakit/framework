<?php

namespace Lavakit\Base\Console\Installer\Scripts;

use Illuminate\Console\Command;
use Lavakit\Base\Contracts\Console\SetupScript;

/**
 * Class Migration
 *
 * @package Lavakit\Base\Console\Installer\Scripts
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class Migration implements SetupScript
{
    /**
     * Run the install script
     *
     * @param Command $command
     * @return mixed|void
     */
    public function run(Command $command)
    {
        $command->line('');
        $command->info('Starting the migrations ...');
        $command->line('');

        $command->call('migrate:refresh');
    }
}
