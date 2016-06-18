<?php

namespace app\components\test\controllers\frontend;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `test` module
 */
class DefaultController extends Controller
{
    /*
     * Задать свое название файла шаблона и вьюхи
     */
    //public $layout = 'index';


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        /*
         * Указать соверщенно другой путь к основному файлу рендера
        */
        $this->module->setLayoutPath(Yii::getAlias(__DIR__. '/../../views/layouts/'));

        /*
         * Сменить путь к вьюхе модуля
         */
        $this->setViewPath(Yii::getAlias(__DIR__. '/../../views/dev/default/'));

        /*
         * Взять параметры модуля
         */
        $module = \Yii::$app->getModule('template');
        echo '<pre>';
        print_r($module->params);
        echo '</pre>';

        return $this->render('index');
    }

    public function actionAdmin()
    {
        return $this->render('frontend/default/admin');
    }

    public function actionDev()
    {
        return $this->render('dev');
    }
}
