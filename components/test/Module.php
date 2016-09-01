<?php

namespace components\test;

/**
 * Class Module
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   components\test
 * @since     0.1
 */
class Module extends \bee\module\Module
{
    public $controllerNamespace = 'components\test\controllers';


    public function init()
    {
        parent::init();
        //$this->setViewPath(Bee::getAlias(__DIR__ . '/'));
        //$this->setLayoutPath(Bee::getAlias('@tmpl/base/' . $zone . '/desktop/layouts'));
    }
}
