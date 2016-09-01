<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use tmpl\base\dev\assets\StylesAsset;

$bundle = StylesAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Bee::$app->language ?>">
<head>
    <meta charset="<?= Bee::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
                      'brandLabel' => Html::img(
                              $bundle->baseUrl.'/images/device-mobile.png', ['style' => 'width: 30px; float: left; margin-right: 5px;']
                          ) . 'BeeCMS',
                      'brandUrl' => Bee::$app->homeUrl,
                      'options' => [
                          'class' => 'navbar-inverse navbar-fixed-top',
                      ],
                  ]);
    echo Nav::widget([
                         'options' => ['class' => 'navbar-nav navbar-right'],
                         'items' => [
                             ['label' => 'Home', 'url' => ['/dev/main/default/index']],
                             ['label' => 'About', 'url' => ['/dev/main/default/about']],
                             ['label' => 'Contact', 'url' => ['/dev/main/default/contact']],
                             [
                                 'label' => 'Styles', 'url' => ['/dev/main/default/contact'], 'options' => ['menu_type' => 'top_menu'],
                                 'items' => [
                                     '<li class="dropdown-header">Set your style</li>',
                                     '<li class="divider"></li>',
                                     ['label' => 'desktop', 'url' => '?layoutType=desktop', 'options' => ['menu_type' => 'top_menu']],
                                     ['label' => 'tablet', 'url' => '?layoutType=tablet', 'options' => ['menu_type' => 'top_menu']],
                                     ['label' => 'mobile', 'url' => '?layoutType=mobile', 'options' => ['menu_type' => 'top_menu']],
                                     ['label' => 'responsive', 'url' => '?layoutType=responsive', 'options' => ['menu_type' => 'top_menu']],
                                     ['label' => 'По умолчанию', 'url' => '?layoutType=unset', 'options' => ['menu_type' => 'top_menu']],
                                 ],
                             ],
                             Bee::$app->user->isGuest ? (
                             ['label' => 'Login', 'url' => ['/dev/main/default/login']]
                             ) : (
                                 '<li>'
                                 . Html::beginForm(['/dev/main/default/logout'], 'post', ['class' => 'navbar-form'])
                                 . Html::submitButton(
                                     'Logout (' . Bee::$app->user->identity->username . ')',
                                     ['class' => 'btn btn-link']
                                 )
                                 . Html::endForm()
                                 . '</li>'
                             )
                         ],
                     ]);
    NavBar::end();
    ?>

    <div class="container">
        <h1><?php
            echo '<pre>';
            print_r("DEV/MOBILE");
            echo '</pre>';
            ?></h1>
        <?= Breadcrumbs::widget([
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Bee::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
