<?php

namespace app\components\test\controllers\dev;

use yii\web\Controller;

/**
 * Default controller for the `test` module
 */
class DefaultController extends Controller
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
