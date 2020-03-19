<?php

namespace Lavakit\Base\Console\Installer\Traits;

/**
 * Trait LoganMessage
 * @package Lavakit\Base\Console\Installer\Traits
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
trait BlockMessage
{
    /**
     * Show message in command
     *
     * @param string $title
     * @param int $space
     * @param string $description
     */
    public function blockMessage(string $title, string $description, int $space = 12)
    {
        $this->line('');
        $this->generate($title, $description, $space);
        $this->line('');
    }
    
    /**
     * @param string $title
     * @param string $description
     * @param $space
     * @package int $space
     */
    protected function generate(string $title, string $description, $space)
    {
        $lengthTitle = strlen(strip_tags($title)) + 2;
        $length = strlen(strip_tags($description)) + $space + $space + 2;
        $spaceTitle = ($length - $lengthTitle) / 2;
        $lineSpace = $length - 2;
    
        $this->comment(str_repeat('*', $length));
        $this->comment('*' . $this->space($spaceTitle) . $title . $this->space($spaceTitle) . '*');
        $this->comment('*' . $this->space($lineSpace) . '*');
        $this->comment('*' . $this->space($space) . $description . $this->space($space) . '*');
        $this->comment('*' . $this->space($lineSpace) . '*');
        $this->comment(str_repeat('*', $length));
    }
    
    /**
     * @param $number
     * @return string
     */
    protected function space($number)
    {
        return str_repeat(' ', $number);
    }
}
