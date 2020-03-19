<?php

namespace Lavakit\Base\Contracts\Console;

use Illuminate\Console\Command;

/**
 * Interface SetupScript
 * @package Lavakit\Base\Contracts\Console
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
interface SetupScript
{
    /**
     * Run the install script
     *
     * @param Command $command
     * @return mixed
     */
    public function run(Command $command);
}
