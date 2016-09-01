<?php

namespace components\template;

use Bee;
use yii\filters\AccessControl;

/**
 * Class Module
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   components\template
 * @since     0.1
 */
class Module extends \bee\module\Module
{
    public $controllerNamespace = 'components\template\controllers';

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null) {
        return Bee::t('template', $category, $message, $params, $language);// Bee::$app->controller->module->id
    }


    public function test(){
        echo '<pre>';
        print_r("TEST!!!!!!!!!");
        echo '</pre>';
    }
}
