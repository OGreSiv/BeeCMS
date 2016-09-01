<?php

namespace components\template\controllers\dev;

use Bee;
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
    public function actionIndex($id = null)
    {
        $file = rtrim(Bee::getAlias('@tmpl/base/templateDetails.xml'), '/\\');
        $xmlContent = Bee::$app->XmlParser->parse(file_get_contents($file), '');

//        echo Bee::t('template', 'translate', 'OLOLO');
//        $username = 'Alexander';
//        echo Bee::t('bee', 'bee', 'Hello, {username}!', [
//            'username' => $username,
//        ]);

//        echo '<pre>';
//        print_r(Bee::$app->i18n->translations);
//        echo '</pre>';
//        exit();

        return $this->render('index', [
            'xmlContent' => $xmlContent,
            'id' => $id
        ]);
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
