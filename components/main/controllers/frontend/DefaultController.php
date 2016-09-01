<?php

namespace components\main\controllers\frontend;

use Bee;
use components\main\Module;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class DefaultController extends Controller
{
 public function behaviors()
 {
  return [
      'access' => [
          'class' => AccessControl::className(),
          'only' => ['logout'],
          'rules' => [
              [
                  'actions' => ['logout'],
                  'allow' => true,
                  'roles' => ['@'],
              ],
          ],
      ],
      'verbs' => [
          'class' => VerbFilter::className(),
          'actions' => [
              'logout' => ['post'],
          ],
      ],
  ];
 }

 public function actions()
 {
  return [
      'error' => [
          'class' => 'yii\web\ErrorAction',
      ],
      //'captcha' => [
      //    'class' => 'yii\captcha\CaptchaAction',
      //    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      //],
  ];
 }

 public function actionIndex()
 {
     echo Module::t('template', 'OLOLO');
  return $this->render('index');
 }

 public function actionLogin()
 {
  if (!Bee::$app->user->isGuest) {
   return $this->goHome();
  }

  $model = new LoginForm();
  if ($model->load(Bee::$app->request->post()) && $model->login()) {
   return $this->goBack();
  }
  return $this->render('login', [
      'model' => $model,
  ]);
 }

 public function actionLogout()
 {
     Bee::$app->user->logout();

  return $this->goHome();
 }

 public function actionContact()
 {
  $model = new ContactForm();
  if ($model->load(Bee::$app->request->post()) && $model->contact(Bee::$app->params['adminEmail'])) {
      Bee::$app->session->setFlash('contactFormSubmitted');

   return $this->refresh();
  }
  return $this->render('contact', [
      'model' => $model,
  ]);
 }

 public function actionAbout()
 {
  return $this->render('about');
 }
}
