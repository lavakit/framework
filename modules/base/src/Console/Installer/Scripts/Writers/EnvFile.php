<?php

namespace Lavakit\Base\Console\Installer\Scripts\Writers;

use Illuminate\Filesystem\Filesystem;

/**
 * Class EnvFile
 * @package Lavakit\Base\Console\Installer\Scripts\Writers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
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
        'db_driver'     => 'DB_CONNECTION=mysql',
        'db_host'       => 'DB_HOST=127.0.0.1',
        'db_port'       => 'DB_PORT=3306',
        'db_database'   => 'DB_DATABASE=homestead',
        'db_username'   => 'DB_USERNAME=homestead',
        'db_password'   => 'DB_PASSWORD=secret',
        'db_prefix'     => 'DB_PREFIX=lk_',
        'db_engine'     => 'DB_ENGINE=InnoDB',
        'app_url'       => 'APP_URL=http://localhost',
        'installed'     => 'APP_INSTALLED=false',
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
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
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
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function write($vars)
    {
        if (!empty($vars)) {
            $environmentFile = $this->finder->get($this->file);
            
            foreach ($vars as $key => $value) {
                if (isset($this->ableVariables[$key])) {
                    $envVarName = explode('=', $this->ableVariables[$key])[0];
                    $value = $envVarName . '=' . $value;
                    
                    $environmentFile = str_replace($this->ableVariables[$key], $value, $environmentFile);
                }
            }
            
            $this->finder->put($this->file, $environmentFile);
        }
    }
}
