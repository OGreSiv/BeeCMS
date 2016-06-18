<?php

namespace app\components\core\controllers;

use yii\web\Controller;

/**
 * Default controller for the `test` module
 */
class TemplateController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdmin()
    {
        return $this->render('admin');
    }

    public function actionDev()
    {
        return $this->render('dev');
    }
}
