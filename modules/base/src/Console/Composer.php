<?php

namespace Lavakit\Base\Console;

use Illuminate\Support\Composer as CoreComposer;
use Symfony\Component\Process\Process;

/**
 * Class Composer
 *
 * @package Lavakit\Base\Console
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class Composer extends CoreComposer
{
    /** @var null */
    protected $outputHandler = null;
    
    /** @var mixed */
    private $output;
    
    /**
     * Enable real time output of all commands
     *
     * @param $command
     */
    public function enableOutput($command)
    {
        $this->output = function ($level, $buffer) use ($command) {
            if (Process::ERR === $level) {
                $command->info(trim('[ERR] > ' . $buffer));
            } else {
                $command->info(trim('> ' . $buffer));
            }
        };
    }
    
    /**
     * Disable real time output of all commands.
     *
     * @return void
     */
    public function disableOutput()
    {
        $this->output = null;
    }
    
    /**
     * Update all composer packages.
     *
     * @param null $package
     */
    public function update($package = null)
    {
        if (!is_null($package)) {
            $package = '"' . $package . '"';
        }
        
        $this->process($package, 'update');
    }
    
    /**
     * Install a new composer package
     *
     * @param $package
     */
    public function install($package)
    {
        if (!is_null($package)) {
            $package = '"' . $package . '"';
        }
    
        $this->process($package, 'require');
    }
    
    /**
     * Remove a package via composer
     *
     * @param $package
     */
    public function remove($package)
    {
        if (!is_null($package)) {
            $package = '"' . $package . '"';
        }
    
        $this->process($package, 'remove');
    }
    
    /**
     * @return void;
     */
    public function dumpAutoload()
    {
        $process = $this->getProcess();
        $process->setCommandLine(trim($this->findComposer() . ' dump-autoload -o'));
        $process->run($this->output);
    }
    
    /**
     * @param string $task
     * @param $package
     */
    protected function process($package, $task = 'require')
    {
        $process = $this->getProcess();
        $process->setCommandLine(trim($this->findComposer()) . " {$task} " . $package);
        $process->run($this->output);
    }
}
