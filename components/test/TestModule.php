<?php

namespace app\components\test;

use Yii;

/**
 * Class TestModule
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   app\components\test
 * @since     0.1
 */
class TestModule extends \app\libs\bee\classes\Module
{
    //public $controllerNamespace = 'app\components\test\controllers';


    public function init()
    {
        parent::init();
        //    //$this->setViewPath(Yii::getAlias(__DIR__ . 'viwes/weqweqwe'));
        //    //$this->setLayoutPath(Yii::getAlias('@app/templates/base/' . $zone . '/desktop/layouts'));
    }
}
