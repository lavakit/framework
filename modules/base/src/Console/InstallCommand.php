<?php

namespace Lavakit\Base\Console;

use Illuminate\Console\Command;
use Lavakit\Base\Console\Installer\Installer;
use Lavakit\Base\Console\Installer\Scripts\ConfigureDatabase;
use Lavakit\Base\Console\Installer\Scripts\CreateEnvFile;
use Lavakit\Base\Console\Installer\Scripts\Seeders;
use Lavakit\Base\Console\Installer\Scripts\GenerateKey;
use Lavakit\Base\Console\Installer\Scripts\Installed;
use Lavakit\Base\Console\Installer\Scripts\Migration;
use Lavakit\Base\Console\Installer\Scripts\Packages\PassportInstall;
use Lavakit\Base\Console\Installer\Scripts\ProtectInstaller;
use Lavakit\Base\Console\Installer\Traits\BlockMessage;
use Lavakit\Base\Console\Installer\Traits\TableConsole;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class InstallCommand
 *
 * @package Lavakit\Base\Console
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class InstallCommand extends Command
{
    use BlockMessage, TableConsole;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'lavakit:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Lavakit CMS';

    /**
     * @var $installer
     */
    protected $installer;

    /**
     * InstallCommand constructor.
     * @param Installer $installer
     */
    public function __construct(Installer $installer)
    {
        parent::__construct();

        $this->getLaravel()['env'] = 'local';
        $this->installer = $installer;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->blockMessage('WellCome!', 'Starting the installation processing...', 23);

        $this->installer->stack([
            ProtectInstaller::class,
            CreateEnvFile::class,
            ConfigureDatabase::class,
            GenerateKey::class,
            Migration::class,
            PassportInstall::class,
            Seeders::class,
            Installed::class
        ]);

        $this->listInstall($this->installer->getScripts());

        $success = $this->installer->install($this);

        if ($success) {
            $this->blockMessage('Platform ready!', 'You can now login with your username and password at backend.');
        }
    }

    /**
     * @param array $outputs
     */
    protected function listInstall(array $outputs)
    {
        $headers = ['#', 'Name', 'Version'];

        $this->comment('List to be installed');
        $this->makeTable($headers, $outputs);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Force the installation, even if already installed']
        ];
    }
}
