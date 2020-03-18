<?php

namespace Lavakit\Base\Supports;

use Illuminate\Support\Str;

/**
 * Class Title
 * @package Lavakit\Base\Supports
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class Title
{
    /**
     * @var string
     */
    protected $title;

    /**
     * Set a Title for page
     *
     * @param string $title
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function set($title = null)
    {
        $this->title = $title;
    }

    /**
     * Get a Title for page
     *
     * @param bool $full
     * @return string Title
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function get(bool $full = true)
    {
        if (empty($this->title)) {
            return $this->getName();
        }

        if (!$full) {
            return $this->title;
        }

        return Str::finish($this->title, ' - ') . $this->getName();
    }

    /**
     * @param null $default
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getName($default = null)
    {
        return config('base.base.app_name', $default);
    }
}
