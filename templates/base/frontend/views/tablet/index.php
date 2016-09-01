<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use tmpl\base\frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

$bundle = AppAsset::register($this);
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
            'brandLabel' => Html::img(
                    $bundle->baseUrl . '/images/device-tablet.png',
                    ['style' => 'width: 30px; float: left; margin-right: 5px;']
                ) . 'BeeCMS',
            'brandUrl' => Bee::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]
    );
    $menuItems = [
        ['label' => 'Home', 'url' => ['/main/default/index']],
        ['label' => 'About', 'url' => ['/main/default/about']],
        ['label' => 'Contact', 'url' => ['/main/default/contact']],
        [
            'label' => 'Styles',
            'items' => [
                '<li class="dropdown-header">Set your style</li>',
                '<li class="divider"></li>',
                ['label' => 'desktop', 'url' => '?layoutType=desktop'],
                ['label' => 'tablet', 'url' => '?layoutType=tablet'],
                ['label' => 'mobile', 'url' => '?layoutType=mobile'],
                ['label' => 'responsive', 'url' => '?layoutType=responsive', 'options' => ['menu_type' => 'top_menu']],
                ['label' => 'По умолчанию', 'url' => '?layoutType=unset'],
            ],
        ],
    ];
    if (Bee::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'Signup', 'url' => ['/main/default/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/main/default/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Bee::$app->user->identity->username . ')',
            'url' => ['/main/default/logout'],
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
            print_r("FRONTEND/TABLET");
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
