<?php

/**
 * Class BeeApplication
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee
 * @since 0.1
 */

namespace bee\web;

use yii\web\Application;
use bee\language\LanguageController;

/**
 * Class BeeApplication
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\web
 * @since 0.1
 */
class BeeApplication extends Application
{
    /**
     * @var string the application name.
     */
    public $name = 'Bee CMS';

    /**
     * @var string the version of this application.
     */
    public $version = '1.0';

    /*
     * Langyages array
     *
     * @var model object
     */
    public $languageAll;

    /**
     * @var string
     */
    public $sourceLanguageKey;

    /**
     * @var string
     */
    public $languageKey;


    public function __construct ($config = []) {
        parent::__construct($config);

        if (empty($this->languageAll)) {
            new LanguageController;
        }
    }

    /**
     * Function setLanguageAll
     * @param $language
     */
    public function setLanguageAll($language) {
        $this->languageAll = $language;
    }

    /**
     * Function getLanguageAll
     * @return LanguageController
     */
    public function getLanguageAll() {
        return $this->languageAll;
    }

    /**
     * Function setLanguageKey
     * Set the current language code
     * @param $key "ru" or "en"...
     */
    public function setLanguageKey($key) {
        $this->languageKey = $key;
    }

    /**
     * Function getLanguageKey
     * Get the current user language code
     * @return string "ru" or "en"...
     */
    public function getLanguageKey() {
        return $this->languageKey;
    }

    /**
     * Function setSourceLanguageKey
     * Set the default language code
     * @param $key "ru" or "en"...
     */
    public function setSourceLanguageKey($key) {
        $this->sourceLanguageKey = $key;
    }

    /**
     * Function getSourceLanguageKey
     * Get the default language code
     * @return string "ru" or "en"...
     */
    public function getSourceLanguageKey() {
        return $this->sourceLanguageKey;
    }
}
