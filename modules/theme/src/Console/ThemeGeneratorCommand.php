<?php

namespace Lavakit\Theme\Console;

use Illuminate\Config\Repository;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Support\Str;

/**
 * Class ThemeGeneratorCommand
 * @package Lavakit\Theme\Console
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class ThemeGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command
     *
     * @var string
     */
    protected $signature = 'theme:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Theme Folder Structure';

    /**
     * Filesystem.
     *
     * @var File
     */
    protected $files;

    /**
     * Config
     *
     * @var $config
     */
    protected $config;

    /**
     * Theme Folder Path.
     *
     * @var string
     */
    protected $themePath;

    /**
     * Create Theme Info.
     *
     * @var array
     */
    protected $theme;

    /**
     * Created Theme Structure.
     *
     * @var array
     */
    protected $themeFolders;

    /**
     * Theme Stubs.
     *
     * @var string
     */
    protected $themeStubPath;
    /**
     * ThemeGeneratorCommand constructor.
     *
     * @param Repository $config
     * @param File       $files
     */
    public function __construct(Repository $config, File $files)
    {
        $this->config = $config;
        $this->files = $files;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return bool
     * @throws FileNotFoundException
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function handle()
    {
        $this->themePath = $this->config->get('theme.theme.frontend_path');
        $this->theme['name'] = strtolower($this->argument('name'));

        $createdThemePath = $this->themePath.'/'.$this->theme['name'];

        if ($this->files->isDirectory($createdThemePath)) {
            $this->error('Sorry '.ucfirst($this->theme['name']).' Theme Folder Already Exist !!!');

            return  false;
        }

        $this->consoleAsk();

        $this->themeFolders = $this->config->get('theme.theme.folders');
        $this->themeStubPath = $this->config->get('theme.theme.stubs.path');

        $themeStubFiles = $this->config->get('theme.theme.stubs.files');
        $themeStubFiles['theme'] = $this->config->get('theme.theme.config.name');
        $themeStubFiles['changelog'] = $this->config->get('theme.theme.config.changelog');

        $this->makeDir($createdThemePath);

        foreach ($this->themeFolders as $key => $folder) {
            $this->makeDir($createdThemePath.'/'.$folder);
        }

        $this->createStubs($themeStubFiles, $createdThemePath);

        $this->info(ucfirst($this->theme['name']).' Theme Folder Successfully Generated !!!');

        return true;
    }

    /**
     * Console command ask questions.
     *
     * @return void
     */
    public function consoleAsk()
    {
        $author = $this->config->get('theme.theme.author');
        $this->theme['title'] = $this->ask('What is theme title?', "The title");
        $this->theme['description'] = $this->ask('What is theme description?', false);
        $this->theme['description'] = !$this->theme['description'] ? '' : Str::title($this->theme['description']);

        $this->theme['author'] = $this->ask('What is theme author name?', $author);
        $this->theme['author'] = !$this->theme['author'] ? $author : Str::title($this->theme['author']);

        $this->theme['version'] = $this->ask('What is theme version?', '1.0');
        $this->theme['version'] = !$this->theme['version'] ? '1.0' : $this->theme['version'];
        $this->theme['parent'] = '';
        $this->theme['css'] = '';
        $this->theme['js'] = '';

        if ($this->confirm('Any parent theme?')) {
            $this->theme['parent'] = $this->ask('What is parent theme name?');
            $this->theme['parent'] = strtolower($this->theme['parent']);
        }
    }

    /**
     * Make directory.
     *
     * @param string $directory
     * @return void
     */
    protected function makeDir($directory)
    {
        if (!$this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0777, true);
        }
    }

    /**
     * Make file
     *
     * @param $file
     * @param $storePath
     * @throws FileNotFoundException
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function makeFile($file, $storePath)
    {
        if ($this->files->exists($file)) {
            $content = $this->replaceStubs($this->files->get($file));

            $this->files->put($storePath, $content);
        }
    }

    /**
     * Create theme stubs
     *
     * @param $themeStubFiles
     * @param $createdThemePath
     * @throws FileNotFoundException
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function createStubs($themeStubFiles, $createdThemePath)
    {
        $folderAssets = $this->config->get('theme.theme.folders.assets');
        foreach ($themeStubFiles as $filename => $storePath) {
            if ($filename == 'changelog') {
                $filename = 'changelog'.pathinfo($storePath, PATHINFO_EXTENSION);
            } elseif ($filename == 'theme') {
                $filename = pathinfo($storePath, PATHINFO_EXTENSION);
            } elseif ($filename == 'css' || $filename == 'js') {
                $this->theme[$filename] = ltrim($storePath, rtrim($folderAssets, DS) . DS);
            }

            $themeStubFile = $this->themeStubPath . DS . $filename.'.stub';
            $this->makeFile($themeStubFile, $createdThemePath . DS . $storePath);
        }
    }

    /**
     * Replace Stub string
     *
     * @param string $contents
     * @return string
     */
    protected function replaceStubs($contents)
    {
        $mainString = [
            '[NAME]',
            '[TITLE]',
            '[DESCRIPTION]',
            '[AUTHOR]',
            '[PARENT]',
            '[VERSION]',
            '[CSSNAME]',
            '[JSNAME]',
        ];
        $replaceString = [
            $this->theme['name'],
            $this->theme['title'],
            $this->theme['description'],
            $this->theme['author'],
            $this->theme['parent'],
            $this->theme['version'],
            $this->theme['css'],
            $this->theme['js'],
        ];

        $replaceContents = str_replace($mainString, $replaceString, $contents);

        return $replaceContents;
    }
}
