<?php

namespace Lavakit\Base\Console\Installer\Scripts\Writers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

/**
 * Class EnvFile
 *
 * @package Lavakit\Base\Console\Installer\Scripts\Writers
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class EnvFile
{
    /** @var Filesystem */
    protected $finder;
    
    /**
     * Whitelist of variables in .env.example that can be written by the installer when it creates the .env file
     *
     * @var array
     */
    protected $ableVariables = [
        'db_driver'     => 'DB_CONNECTION',
        'db_host'       => 'DB_HOST',
        'db_port'       => 'DB_PORT',
        'db_database'   => 'DB_DATABASE',
        'db_username'   => 'DB_USERNAME',
        'db_password'   => 'DB_PASSWORD',
        'db_prefix'     => 'DB_PREFIX',
        'db_engine'     => 'DB_ENGINE',
        'app_url'       => 'APP_URL',
        'installed'     => 'APP_INSTALLED',
    ];
    
    /**
     * A file to copy
     *
     * @var string
     */
    protected $sourceFile = '.env.example';
    
    /** @var string  */
    protected $file = '.env';
    
    /**
     * EnvFile constructor.
     * @param Filesystem $finder
     */
    public function __construct(Filesystem $finder)
    {
        $this->finder = $finder;
    }
    
    /**
     * Create a new .env file using the contents of .env.example
     *
     * @throws FileNotFoundException
     */
    public function create()
    {
        $environmentFile = $this->finder->get($this->sourceFile);
        
        $this->finder->put($this->file, $environmentFile);
    }

    /**
     * Update the .env file
     *
     * @param $vars
     * @param array $content
     * @throws FileNotFoundException
     * @copyright 2020 Lavakit Group
     */
    public function write($vars, &$content = [])
    {
        if (!empty($vars)) {
            $content = $this->getContent();
            foreach ($vars as $key => $value) {
                if (isset($this->ableVariables[$key])) {
                    $content = $this->updateOrCreate($this->ableVariables[$key], $value, $content);
                }
            }

            $this->finder->put($this->file, $content);
        }
    }

    protected function updateOrCreate(string $key, string $value = null, array $contents = [])
    {
        $break = false;

        if (empty($contents)) {
            return false;
        }

        foreach ($contents as $line => $content) {
            if (!Str::contains($content, $key)) {
                $contents[$line] = Str::finish($content, "\n");

                continue;
            }

            $contents[$line] = Str::finish($key . '=' . $value, "\n");

            $break = true;
        }

        if (!$break) {
            $contents[] = Str::finish($key . '=' . $value, "\n");
        }

        return $contents;
    }

    /**
     * Get content of the file
     *
     * @param bool $kindOfArray
     * @return array|string
     * @throws FileNotFoundException
     * @copyright 2020 Lavakit Group
     */
    protected function getContent($kindOfArray = true)
    {
        $content = $this->finder->get($this->file);

        if ($kindOfArray) {
            return explode("\n", $content);
        }

        return $content;
    }
}
