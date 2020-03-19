<?php

namespace Lavakit\Base\Console\Installer\Traits;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\ProgressBar;

/**
 * Trait TableConsole
 * @package Lavakit\Base\Console\Installer\Traits
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
trait TableConsole
{
    /**
     * @param array $headers
     * @param array $outputs
     * @param string $tableStyle
     */
    public function makeTable(array $headers, array $outputs, string $tableStyle = 'default')
    {
        $rows = count($outputs);
        $progressBar = new ProgressBar($this->output, $rows);
        $progressBar->setBarWidth(100);
        $progressBar->setBarCharacter('<fg=magenta>=</>');
        $progressBar->setProgressCharacter("<fg=magenta>></>");

        $this->line('');
        $table = new Table($this->output);
        $table->setHeaders($headers)->setColumnWidth(1, 57)->setStyle($tableStyle);
        for ($i = 0; $i < $rows; $i++) {
            $table->addRow([
                sprintf('<info>%s</info>', $i + 1),
                sprintf('<comment>%s</comment>', class_basename($outputs[$i])),
                sprintf('<info>%s</info>', config('base.base.version'))
            ]);

            usleep(300000);

            $progressBar->advance();
        }

        $progressBar->finish();
        $this->line('');
        $this->line('');
        $table->render();
        $this->line('');
    }
}
