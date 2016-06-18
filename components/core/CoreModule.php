<?php

namespace app\components\core;

use \Yii;
use yii\base\BootstrapInterface;

/**
 * Class CoreModule
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   app\components\core
 * @since     0.1
 */
class CoreModule extends \app\libs\bee\classes\Module implements BootstrapInterface
{
    public function init()
    {
        $this->modules = [
            'template' => [
                'class' => 'app\components\core\template\TemplateModule',
            ],
        ];
        parent::init();
    }

    public function bootstrap($app){

        $app->setModule('template', [
            'class' => 'app\components\core\template\TemplateModule',
        ]);
        $app->getModule('template');
    }
}
