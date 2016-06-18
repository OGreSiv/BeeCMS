<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\templates\base\frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin(
        [
            'brandLabel' => 'BeeCMS',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]
    );
    echo Nav::widget([
                         'options' => ['class' => 'navbar-nav navbar-right'],
                         'items' => [
                             ['label' => 'Home', 'url' => ['/main/default/index']],
                             ['label' => 'About', 'url' => ['/main/default/about']],
                             ['label' => 'Contact', 'url' => ['/main/default/contact']],
                             [
                                 'label' => 'Styles', 'url' => ['/main/default/contact'], 'options' => ['menu_type' => 'top_menu'],
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
                             Yii::$app->user->isGuest ? (
                             ['label' => 'Login', 'url' => ['/main/default/login']]
                             ) : (
                                 '<li>'
                                 . Html::beginForm(['/main/default/logout'], 'post', ['class' => 'navbar-form'])
                                 . Html::submitButton(
                                     'Logout (' . Yii::$app->user->identity->username . ')',
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
        <?= Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>

        <h1><?php
            echo '<pre>';
            print_r("FRONTEND/RESPONSIVE");
            echo '</pre>';
            ?></h1>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
