<?php

namespace Lavakit\Base\Console\Installer\Scripts;

use Illuminate\Console\Command;
use Lavakit\Base\Contracts\Console\SetupScript;

/**
 * Class Seeders
 *
 * @package Lavakit\Base\Console\Installer\Scripts
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class Seeders implements SetupScript
{
    /** @var array */
    protected $className = [
        'UserTableSeeder'
    ];

    /**
     * Run the install script
     *
     * @param Command $command
     * @return mixed|void
     * @copyright 2020 Lavakit Group
     */
    public function run(Command $command)
    {
        $command->line('');
        $command->info('Starting the module seeder ...');
        $command->line('');

        foreach ($this->className as $className) {
            $command->call('db:seed', ['--class' => $className]);
        }
    }
}
