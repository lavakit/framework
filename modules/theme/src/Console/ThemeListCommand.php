<?php

namespace Lavakit\Theme\Console;

use Illuminate\Console\Command;

/**
 * Class ThemeListCommand
 * @package Lavakit\Theme\Console
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class ThemeListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:list {type?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all available themes';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $themes = $this->laravel[$this->loadContract()]->all();
        $headers = ['Name', 'Author', 'Version', 'Parent'];
        $output = [];

        foreach ($themes as $theme) {
            $output[] = [
                'Name'    => $theme->get('name'),
                'Author'  => $theme->get('author'),
                'version' => $theme->get('version'),
                'parent'  => $theme->get('parent'),
            ];
        }
        $this->table($headers, $output);
    }

    /**
     * @return string
     * @copyright tqhoa Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com
     */
    protected function loadContract()
    {
        $type = $this->argument('type');

        if (!is_null($type) && interface_exists($this->getContract($type))) {
            return $this->getContract($type);
        }

        return $this->getContract();
    }

    /**
     * @param string $type
     * @return string
     * @copyright tqhoa Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com
     */
    protected function getContract($type = 'frontend')
    {
        $type = ucfirst($type);

        return "Lavakit\\Theme\\Contracts\\Themes\\{$type}";
    }
}
