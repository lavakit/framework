<?php

namespace Lavakit\Base\Console\Installer\Scripts;

use Illuminate\Console\Command;
use Lavakit\Base\Contracts\Console\SetupScript;

/**
 * Class Migrations
 * @package Lavakit\Base\Console\Installer\Scripts
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class Migration implements SetupScript
{
    /**
     * Run the install script
     *
     * @param Command $command
     * @return mixed|void
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    public function run(Command $command)
    {
        $command->line('');
        $command->info('Starting the migrations ...');
        $command->line('');

        $command->call('migrate:refresh');
    }
}
