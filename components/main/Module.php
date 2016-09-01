<?php
/**
 * Class Module
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package components\main
 * @since 0.1
 */

namespace components\main;


use Bee;

/**
 * default module definition class
 */

class Module extends \bee\module\Module // implements BootstrapInterface
{
    public $controllerNamespace = 'components\main\controllers';

    public function init() {
        parent::init();
    }

    public static function t($category, $message, $params = [], $language = null) {
        return Bee::t('main', $category, $message, $params, $language);
    }
}
