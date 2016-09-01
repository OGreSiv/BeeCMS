<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use bee\icon\Icon;
//use bee\widgets\sidenav\SideNav;

use bee\widgets\navbar\Nav;
use bee\widgets\navbar\NavBar;
use yii\widgets\Breadcrumbs;

use tmpl\base\dev\assets\AppAsset;

Icon::map($this);
$bundle = AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Bee::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta charset="<?= Bee::$app->charset ?>" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<!--    <link href="https://fonts.googleapis.com/css?family=Jura:300,500&subset=cyrillic-ext" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic-ext" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--[if lt IE 8]>
    <link rel="stylesheet" href="../../fonts/bee-icon/ie7/ie7.css">
    <script src="../../fonts/bee-icon/ie7/ie7.js"></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
<div id="loading">
    <div class="loader loader-light loader-large loader-violet"></div>
</div>

<header class="top-bar">
    <div class="main-brand">
        <div class="main-brand__container">
            <a href="<?= Bee::$app->homeUrl ?>">
                <div class="main-logo"><?= Html::img($bundle->baseUrl . '/images/logo.png', ['class' => ''])?></div>
                <div class="main-logo-mobile"><?= Html::img($bundle->baseUrl . '/images/logo-icon.png', ['class' => ''])?></div>
            </a>
        </div>
    </div>
    <div class="main-search">
        <input type="text" placeholder="Search ..." id="msearch">
        <label for="msearch">
            <?= Icon::show('search'); ?>
        </label>
        <button>
            <?= Icon::show('arrow3-right'); ?>
        </button>
    </div>
    <div class="main-panel">
        <div class="navbar-left-menu"><div class="submenu-navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#leftmenu-collapse">
                    <?= Icon::show('b-burger-menu'); ?>
                </button>
            </div>
        </div>

        <?php
        NavBar::begin([
            'options' => [
                'class' => 'navbar navbar-main-panel',
            ],
            'innerContainerOptions' => [
                'class' => 'container-fluid',
            ]
        ]);
        echo Nav::widget([
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ],
            'isInLine' => true,
            'items' => [
                ['label' => 'Home', 'url' => ['/dev/main/default/index']],
                ['label' => 'About', 'url' => ['/dev/main/default/about']],
                ['label' => 'Contact', 'url' => ['/dev/main/default/contact']],
                [
                    'label' => 'Styles', 'options' => ['menu_type' => 'top_menu'],
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
    </div>
</header>

<div class="wrapper">
    <div class="body-container">
        <aside id="leftmenu-collapse" class="left-sidebar collapse navbar-collapse">
            <div class="inner-box">
                <?php
                NavBar::begin([
                    'options' => [
                        'class' => 'navbar navbar-leftmenu',
                        'showToggleButton' => false,
                    ],
                    'innerContainerOptions' => [
                        'class' => 'container-fluid',
                    ]
                ]);
                echo Nav::widget([
                    'options' => [
                        'class' => 'navbar-nav',
//                        'iconPosition' => Nav::ICON_BEFORE_LABEL,
                    ],
                    'items' => [
                        ['label' => 'Шаблоны', 'icon' => 'b-construction-roller', 'url' => ['/dev/template/default/index']],

//                        ['label' => 'Home', 'icon' => 'b-home', 'url' => ['/dev/main/default/index']],
//                        ['label' => 'About', 'url' => ['/dev/main/default/about']],
//                        ['label' => 'Contact', 'url' => ['/dev/main/default/contact']],
//                        [
//                            'label' => 'Styles', 'options' => ['menu_type' => 'top_menu'],
//                            'items' => [
//                                '<li class="dropdown-header">Set your style</li>',
//                                '<li class="divider"></li>',
//                                ['label' => 'desktop', 'url' => '?layoutType=desktop', 'options' => ['menu_type' => 'top_menu']],
//                                ['label' => 'tablet', 'url' => '?layoutType=tablet', 'options' => ['menu_type' => 'top_menu']],
//                                ['label' => 'mobile', 'url' => '?layoutType=mobile', 'options' => ['menu_type' => 'top_menu']],
//                                ['label' => 'responsive', 'url' => '?layoutType=responsive', 'options' => ['menu_type' => 'top_menu']],
//                                ['label' => 'По умолчанию', 'url' => '?layoutType=unset', 'options' => ['menu_type' => 'top_menu']],
//                            ],
//                        ],
                    ],
                ]);
                NavBar::end();
                ?>

                <div id="scroll-up"><?= Icon::show('arrow2-top', ['class' => 'link']); ?></div>
            </div>
        </aside>
        <section class="content">
            <header class="header">
                <div class="header-nav">
                    <?php
                    $icon = $this->params['icon'] ? $this->params['icon'] : 'b-form';
                    echo $this->title ? Html::tag('h1', Icon::show($icon) . Html::tag('span', $this->title), ['class' => 'header-title']) : '';
                    ?>
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]); ?>
                </div>
            </header>



            <?= $content ?>

            <div class="copyright">
                <a href="http://bee-cms.net" target="_blank">
                    <div class="logo"><?= Html::img($bundle->baseUrl . '/images/logo.png', ['class' => ''])?></div>
                </a
                <div>© 2015 - <?php echo date('Y');?> BeeCMS. All rights reserved</div>
            </div>
        </section>


        <section class="footer">
            <div class="copyright left">
                <a href="http://bee-cms.net" target="_blank">
                    &copy; BeeCMS<br/>2015 - <?php echo date('Y'); ?>
                </a>
            </div>
            <div class="hotkeys right">
                "Ctrl+C" Копировать
            </div>
        </section>
    </div>
</div>

        <!--<div class="container-fluid">-->
<!--    <header>-->
<!--        <div class="top-bar row">-->
<!--            <div class="col-xs-12">-->
<!--                <div class="hidden-mob col-xs-2 col-sm-3 col-md-3 col-lg-2">-->
<!--                    <div class="main-brand">-->
<!--                        <div class="main-brand__container">-->
<!--                            <a href="--><?//= Bee::$app->homeUrl ?><!--">-->
<!--                                <div class="main-logo hidden-mob hidden-xs col-sm-12 col-md-12 col-lg-12">--><?//= Html::img($bundle->baseUrl . '/images/logo.png', ['class' => ''])?><!--</div>-->
<!--                                <div class="main-logo-mobile col-xs-12 hidden-sm hidden-md hidden-lg">--><?//= Html::img($bundle->baseUrl . '/images/logo-icon.png', ['class' => ''])?><!--</div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="style4 col-mob-10 col-mob-offset-2 col-xs-10 col-xs-offset-0 col-sm-9 col-md-9 col-lg-10">-->
<!--                    col-xs-12 col-mob-10 col-sm-11 col-md-11 col-lg-10-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </header>-->
<!---->
<!--    <section>-->
<!--        <div class="row">-->
<!--            <div class="style3 col-mob-12 col-xs-2 col-sm-1 col-md-1 col-lg-2">.col-xs-6 .col-sm-4</div>-->
<!--            <div class="style2 col-mob-12 col-xs-10 col-sm-11 col-md-11 col-lg-10">.col-xs-6 .col-sm-4</div>-->
<!--        </div>-->
<!--    </section>-->
<!---->
<!--    <footer>-->
<!--        <div class="row">-->
<!--            <div class="style4 col-xs-12">.col-xs-6 .col-sm-4</div>-->
<!--        </div>-->
<!--    </footer>-->
<!--</div>-->





    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
