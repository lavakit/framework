<?php

namespace Lavakit\Base\Contracts\Composers;

/**
 * Interface TranslationView
 * @package Lavakit\Base\Contracts\Composers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
interface Translation
{
    /**
     * Get the translations
     *
     * @return array
     */
    public function getTranslations(): array;
    
    /**
     * Load the translation
     *
     * @param $key
     * @param array $translations
     * @return $this
     */
    public function load($key, array $translations);
    
    /**
     * load the multi translations
     *
     * @param array $translations
     * @return $this
     */
    public function loads(array $translations);
}
