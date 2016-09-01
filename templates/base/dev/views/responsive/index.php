<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use tmpl\base\dev\assets\StylesAsset;

/* @var $this \yii\web\View */
/* @var $content string */

$bundle = StylesAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Bee::$app->language ?>">
<head>
    <meta charset="<?= Bee::$app->charset ?>"/>
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
            'brandUrl' => Bee::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]
    );
    $menuItems = [
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
    ];
    if (Bee::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/dev/main/default/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Bee::$app->user->identity->username . ')',
            'url' => ['/dev/main/default/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget(
        [
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]
    );
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
            print_r("DEV/RESPONSIVE");
            echo '</pre>';
            ?></h1>
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
