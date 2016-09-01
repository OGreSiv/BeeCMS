<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use bee\icon\Icon;
use components\language\widgets\LanguageSwitcher;
use tmpl\base\dev\assets\StylesAsset;

use bee\widgets\navbar\Nav;
use bee\widgets\navbar\NavBar;

Icon::map($this);
Icon::map($this, Icon::IM);
$bundle = StylesAsset::register($this);

//echo '<pre>';
//print_r(Yii::$aliases);
//echo '</pre>';
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta charset="<?= Yii::$app->charset ?>" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="loading">
    <div class="loader loader-light loader-large loader-violet"></div>
</div>
<!-- wrapper -->
<div class="wrapper animsition has-footer">

    <!-- Start Header -->
    <header class="header-top navbar">
        <div class="top-bar">
            <div class="container">
                <div class="main-search">
                    <div class="input-wrap">
                        <input class="form-control" type="text" placeholder="Search Here...">
                        <a href="#"><?= Icon::show('search', [], Icon::IM); ?></a>
                    </div>
                    <span class="close-search search-toggle"><?= Icon::show('cancel-circle', [], Icon::IM); ?></span>
                </div>
            </div>
        </div>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle side-nav-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.html">
                <?= Html::img($bundle->baseUrl . '/images/logo-icon.png', ['class' => ''])?>
                <span><?= Html::img($bundle->baseUrl . '/images/logo-title.png', ['class' => ''])?></span>
            </a>

            <ul class="nav navbar-nav-xs">
                <li>
                    <a href="#" class="font-lg collapse" data-toggle="collapse" data-target="#headerNavbarCollapse">
                        <?= Icon::show('user', [], Icon::IM); ?>
                    </a>
                </li>
                <li>
                    <a href="#" class="search-toggle">
                        <?= Icon::show('search', [], Icon::IM); ?>
                    </a>
                </li>
                <li>
                    <?= LanguageSwitcher::widget([
                        'label' => Icon::show('b-flag', [], Icon::BEE),
                        'options' => [
                            'class' => 'btn-primary'
                        ],
                        'containerOptions' => [
                            'class' => 'langusge-switcher',
                        ],
                        'dropdownOptions' => [
                            'class' => 'dropdown-animated pop-effect'
                        ]
                    ]); ?>
                </li>
                <li>
                    <a href="#" class="toggle-right-sidebar">
                        <?= Icon::show('menu2', [], Icon::IM); ?>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="headerNavbarCollapse">
            <ul class="nav navbar-nav">
                <li class="hidden-xs">
                    <a href="#" class="font-lg sidenav-size-toggle">
                        <?= Icon::show('indent-decrease', [], Icon::IM); ?>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="font-lg dropdown-toggle" data-toggle="dropdown">
                        <?= Icon::show('envelop', [], Icon::IM); ?>
                        <div class="new-alert active"></div>
                        <span class="hidden-sm hidden-md hidden-lg font-12 m-l-5">Messages</span>
                    </a>
                    <ul class="dropdown-menu dropdown-animated pop-effect dropdown-lg list-group-dropdown">
                        <li class="no-link font-12">You have 4 new unread messages</li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="profile-pic profile-icon"><i class="icon-file-zip"></i></div>
                                    <div class="detail">
                                        <span class="text-normal">Ricky Palmer</span>
                                        <span class="time">3 hrs ago</span>
                                        <p class="font-11 no-m-b text-overflow">Sent you a file</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="profile-pic profile-icon"><i class="icon-bubbles2"></i></div>
                                    <div class="detail">
                                        <span class="text-normal">Charles Dockery</span>
                                        <span class="time">Jun 03, 2015</span>
                                        <p class="font-11 no-m-b text-overflow">Sent you a message</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="profile-pic profile-icon"><i class="icon-coin-dollar"></i></div>
                                    <div class="detail">
                                        <span class="text-normal">Kimberly Crouch</span>
                                        <span class="time">May 17, 2015</span>
                                        <p class="font-11 no-m-b text-overflow">Purchased your item</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#" class="text-center">See all</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle font-lg" data-toggle="dropdown">
                        <?= Icon::show('user', [], Icon::IM); ?>
                        <span class="badge bg-danger">3</span>
                        <span class="hidden-sm hidden-md hidden-lg font-12 m-l-5">New Account</span>
                    </a>
                    <ul class="dropdown-menu dropdown-animated pop-effect dropdown-lg list-group-dropdown">
                        <li class="no-link font-12">You have 5 new notifications</li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="detail">
                                        <span class="text-normal">Carrie Orr</span>
                                        <span class="time">2 mins ago</span>
                                        <p class="font-11 no-m-b text-overflow">Start following you</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="detail">
                                        <span class="text-normal">James Wygant</span>
                                        <span class="time">1 hr ago</span>
                                        <p class="font-11 no-m-b text-overflow">Accepted your friend request</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="detail">
                                        <span class="text-normal">Mary Cormier</span>
                                        <span class="time">yesterday</span>
                                        <p class="font-11 no-m-b text-overflow">Sent you a friend request</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="detail">
                                        <span class="text-normal">Erica Conley</span>
                                        <span class="time">2 days ago</span>
                                        <p class="font-11 no-m-b text-overflow">Start following you</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#" class="text-center">See all</a></li>
                    </ul>
                </li>
                <li class="dropdown dropdown-full hidden-sm">
                    <a href="#" data-toggle="dropdown">Mega</a>
                    <div class="dropdown-menu clickable-dropdown dropdown-animated fade-effect">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="text-upper">Navagation</div>
                                <div class="row m-t-10 font-12">
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled line-2x link-unstyled-wrap">
                                            <li><a href="#">Dashboard <span class="m-d-1">&raquo;</span></a></li>
                                            <li><a href="#">Component <span class="m-d-1">&raquo;</span></a></li>
                                            <li><a href="#">Form <span class="m-d-1">&raquo;</span></a></li>
                                            <li><a href="#">Email <span class="m-d-1">&raquo;</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled line-2x link-unstyled-wrap">
                                            <li><a href="#">Profile <span class="m-d-1">&raquo;</span></a></li>
                                            <li><a href="#">Tasks <span class="m-d-1">&raquo;</span></a></li>
                                            <li><a href="#">Gallery <span class="m-d-1">&raquo;</span></a></li>
                                            <li><a href="#">Calendar <span class="m-d-1">&raquo;</span></a></li>
                                            <li><a href="#">Tasks <span class="m-d-1">&raquo;</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 b-all b-lr line-dashed m-t-15-xs">
                                Get Start with a 7 days free trial

                                <div class="row m-t-15">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>

                                <hr class="line-dashed">

                                <p class="font-12 text-muted">We do not sell or share your personal information with anyone else without your explicit consent.</p>

                                <div class="text-right m-t-20"><button class="btn btn-main" type="button">Start My Trial</button></div>
                            </div>
                            <div class="col-sm-4 m-t-15-xs">
                                <ul class="list-unstyled list-icons line-2x text-muted font-12">
                                    <li><span class="list-icon"><i class="icon-checkmark m-d-1 text-green"></i></span>Cancel anytime</li>
                                    <li><span class="list-icon"><i class="icon-checkmark m-d-1 text-green"></i></span>No credit card required</li>
                                    <li><span class="list-icon"><i class="icon-checkmark m-d-1 text-green"></i></span>Free support</li>
                                </ul>

                                <hr class="line-dashed">
                                <p class="text-muted font-12 font-italic">Already have an account? <a href="#">Login</a></p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown hidden-sm">
                    <a href="../../frontend/index" class="animsition-link">Front End</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="main-search hidden-xs">
                    <div class="input-wrap">
                        <input class="form-control" type="text" placeholder="Search Here...">
                        <a href="#">
                            <?= Icon::show('search', [], Icon::IM); ?>
                        </a>
                    </div>
                </li>
                <li class="main-langusge-switcher hidden-xs">
                    <?= LanguageSwitcher::widget([
                        'dropdownOptions' => [
                            'class' => 'dropdown-animated pop-effect'
                        ]
                    ]); ?>
                </li>
                <li class="user-profile dropdown">
                    <a href="#" class="clearfix dropdown-toggle" data-toggle="dropdown">
                        <div class="user-name">John Doe <span class="caret m-l-5"></span></div>
                    </a>
                    <ul class="dropdown-menu dropdown-animated pop-effect" role="menu">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#">My Tasks</a></li>
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
                <li class="hidden-xs">
                    <a href="#" class="font-lg toggle-right-sidebar">
                        <?= Icon::show('menu2', [], Icon::IM); ?>
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </header>
    <!-- End Header -->

    <!-- Start Side Navigation -->
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'sidebar-fixed hidden',
            'style' => 'margin-left: 300px;'
        ],
    ]);
    echo Nav::widget([
        'options' => [
//            'class' => 'side-nav magic-nav'
        ],
        'items' => [
            ['label' => 'Home', 'icon' => 'b-construction-roller', 'url' => ['/dev/main/default/index']],
            ['label' => 'About', 'icon' => 'b-construction-roller', 'url' => ['/dev/main/default/about']],
            [
                'label' => 'Level 2', 'icon' => 'b-construction-roller', 'options' => ['menu_type' => 'top_menu'],
                'items' => [
                    ['label' => 'desktop', 'url' => '/dev/template/default/index?id=dfgsdf', 'options' => ['menu_type' => 'top_menu']],
                    ['label' => 'tablet', 'url' => '/dev/template/default/index', 'options' => ['menu_type' => 'top_menu']],
                    [
                        'label' => 'Level 3', 'options' => ['menu_type' => 'top_menu'],
                        'items' => [
                            ['label' => 'desktop1', 'url' => '/dev/default/index', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'tablet12', 'url' => '/dev/main/default/index', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'mobile123', 'url' => '/dev/main/default/index', 'options' => ['menu_type' => 'top_menu']],
                        ],
                    ],
                    ['label' => 'mobile', 'url' => '#layoutType=mobile', 'options' => ['menu_type' => 'top_menu']],
                    ['label' => 'responsive', 'url' => '#layoutType=responsive', 'options' => ['menu_type' => 'top_menu']],
                    ['label' => 'По умолчанию', 'url' => '#layoutType=unset', 'options' => ['menu_type' => 'top_menu']],
                ],
            ],
            ['label' => 'Contact', 'icon' => 'b-construction-roller', 'url' => ['/dev/main/default/contact']],
            [
                'label' => 'Styles', 'icon' => 'b-construction-roller', 'options' => ['menu_type' => 'top_menu'],
                'items' => [
                    [
                        'label' => 'Styles', 'options' => ['menu_type' => 'top_menu'],
                        'items' => [
                            ['label' => 'desktop', 'url' => '?layoutType=desktop', 'options' => ['menu_type' => 'top_menu']],
                            '<li>Set your style</li>',
                            '<li class="divider"></li>',
                            ['label' => 'tablet', 'url' => '?layoutType=tablet', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'mobile', 'url' => '?layoutType=mobile', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'responsive', 'url' => '?layoutType=responsive', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'По умолчанию', 'url' => '?layoutType=unset', 'options' => ['menu_type' => 'top_menu']],
                        ],
                    ],
                    ['label' => 'desktop', 'url' => '?layoutType=desktop', 'options' => ['menu_type' => 'top_menu']],
                    '<li>Set your style</li>',
                    '<li class="divider"></li>',
                    [
                        'label' => 'Styles', 'options' => ['menu_type' => 'top_menu'],
                        'items' => [
                            ['label' => 'desktop', 'url' => '?layoutType=desktop', 'options' => ['menu_type' => 'top_menu']],
                            '<li>Set your style</li>',
                            '<li class="divider"></li>',
                            ['label' => 'tablet', 'url' => '?layoutType=tablet', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'mobile', 'url' => '?layoutType=mobile', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'responsive', 'url' => '?layoutType=responsive', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'По умолчанию', 'url' => '?layoutType=unset', 'options' => ['menu_type' => 'top_menu']],
                        ],
                    ],
                    ['label' => 'tablet', 'url' => '?layoutType=tablet', 'options' => ['menu_type' => 'top_menu']],
                    ['label' => 'mobile', 'url' => '?layoutType=mobile', 'options' => ['menu_type' => 'top_menu']],
                    [
                        'label' => 'Styles', 'options' => ['menu_type' => 'top_menu'],
                        'items' => [
                            ['label' => 'desktop', 'url' => '?layoutType=desktop', 'options' => ['menu_type' => 'top_menu']],
                            '<li>Set your style</li>',
                            '<li class="divider"></li>',
                            ['label' => 'tablet', 'url' => '?layoutType=tablet', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'mobile', 'url' => '?layoutType=mobile', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'responsive', 'url' => '?layoutType=responsive', 'options' => ['menu_type' => 'top_menu']],
                            ['label' => 'По умолчанию', 'url' => '?layoutType=unset', 'options' => ['menu_type' => 'top_menu']],
                        ],
                    ],
                    ['label' => 'responsive', 'url' => '?layoutType=responsive', 'options' => ['menu_type' => 'top_menu']],
                    ['label' => 'По умолчанию', 'url' => '?layoutType=unset', 'options' => ['menu_type' => 'top_menu']],
                ],
            ],
            [
                'label' => 'Styles', 'icon' => 'b-construction-roller', 'options' => ['menu_type' => 'top_menu'],
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
            ['label' => '', 'options' => ['class' => 'side-nav-clear']],
            ['label' => '© BeeCMS 2015 - ' . date('Y'), 'options' => ['class' => 'side-nav-copyright']]
        ],
    ]);
    NavBar::end();
    ?>

    <aside class="side-navigation-wrap sidebar-fixed hidden">
        <div class="sidenav-inner">
            <ul class="side-nav magic-nav">
                <li class="first-link"><a href="index.html" class="animsition-link"><i class="icon-stats-dots"></i> <span class="nav-text">Dashboard</span></a></li>
                <li class="has-submenu">
                    <a href="#submenu1" data-toggle="collapse" aria-expanded="false">
                        <i class="icon-stack"></i> <span class="nav-text">Components</span>
                        <span class="badge bg-danger">9</span>
                    </a>
                    <div class="sub-menu collapse secondary list-style-circle" id="submenu1">
                        <ul>
                            <li><a href="ui_element.html" class="animsition-link">Basic Elements</a></li>
                            <li><a href="button.html" class="animsition-link">Buttons</a></li>
                            <li class="has-submenu">
                                <a href="#submenu2" data-toggle="collapse" aria-expanded="false">Tables</a>
                                <div class="sub-menu collapse tertiary list-style-dashed" id="submenu2">
                                    <ul>
                                        <li><a href="static_table.html" class="animsition-link">Static Table</a></li>
                                        <li><a href="datatable.html" class="animsition-link">Datatable</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="panel.html" class="animsition-link">Panels</a></li>
                            <li><a href="modal.html" class="animsition-link">Modals</a></li>
                            <li><a href="navs.html" class="animsition-link">Navs</a></li>
                            <li><a href="calendar.html" class="animsition-link">Calendar</a></li>
                            <li><a href="widget.html" class="animsition-link">Widget</a></li>
                            <li class="has-submenu">
                                <a href="#submenu3" data-toggle="collapse" aria-expanded="true">Menu Levels</a>
                                <div class="sub-menu collapse tertiary list-style-dashed" id="submenu3">
                                    <ul>
                                        <li><a href="#">Menu 1</a></li>
                                        <li><a href="#">Menu 2</a></li>
                                        <li><a href="#">Menu 3</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a href="form_element.html" class="animsition-link"><i class="icon-file-text2"></i> <span class="nav-text">Form</span></a></li>
                <li><a href="inbox.html" class="animsition-link"><i class="icon-envelop"></i> <span class="nav-text">Email</span></a></li>
                <li><a href="task.html" class="animsition-link"><i class="icon-clipboard"></i> <span class="nav-text">Tasks</span></a></li>
                <li><a href="gallery.html" class="animsition-link"><i class="icon-images"></i> <span class="nav-text">Gallery</span></a></li>
                <li class="has-submenu active">
                    <a href="#submenu4" data-toggle="collapse" aria-expanded="true">
                        <i class="icon-files-empty"></i> <span class="nav-text">Extra Pages</span>
                        <span class="badge bg-success">11</span>
                    </a>
                    <div class="sub-menu collapse in secondary list-style-circle" id="submenu4">
                        <ul>
                            <li class="active"><a href="blank.html" class="animsition-link">Blank Page</a></li>
                            <li><a href="app_layout.html" class="animsition-link">App Layout</a></li>
                            <li><a href="login.html" class="animsition-link">Login</a></li>
                            <li><a href="register.html" class="animsition-link">Register</a></li>
                            <li><a href="404.html" class="animsition-link">Error 404</a></li>
                            <li><a href="500.html" class="animsition-link">Error 500</a></li>
                            <li><a href="search_result.html" class="animsition-link">Search Result</a></li>
                            <li><a href="profile.html" class="animsition-link">User Profile</a></li>
                            <li><a href="chat.html" class="animsition-link">Chat</a></li>
                            <li><a href="timeline.html" class="animsition-link">Timeline</a></li>
                            <li><a href="invoice.html" class="animsition-link">Invoice</a></li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-header">
                    Milestones
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-cog"></i></a>
                        <ul class="dropdown-menu dropdown-animated pop-effect pull-right">
                            <li><a href="#">Add new milestone</a></li>
                            <li><a href="#">Remove milestone</a></li>
                        </ul>
                    </div>
                </li>
                <li class="milestone">
                    <a href="#">
                        UX Design
                        <small class="pull-right">12/20</small>
                        <div class="progress progress-striped active">
                            <div class="progress-bar" style="width: 60%;"></div>
                        </div>
                    </a>
                </li>
                <li class="milestone">
                    <a href="#">
                        Frontend Development
                        <small class="pull-right">9/9</small>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" style="width: 100%;"></div>
                        </div>
                    </a>
                </li>
                <li class="milestone">
                    <a href="#">
                        Backend Development
                        <small class="pull-right">2/10</small>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-warning" style="width: 20%;"></div>
                        </div>
                    </a>
                </li>

                <li class="side-nav-header">
                    Navigation
                    <small>
                        <a href="#themeSettingModal" data-toggle="modal" class="animated theme-setting">
                            <?= Icon::show('cog', [], Icon::IM); ?>
                        </a>
                    </small>
                </li>
                <li class="side-nav-clear"></li>
                <li class="side-nav-copyright">
                    &copy; BeeCMS 2015 - <?php echo date('Y'); ?>
                </li>
            </ul>
        </div><!-- /.sidebar-inner -->
    </aside>

    <!-- End Side Navigation -->

    <!-- Start Right Sidebar -->
    <aside class="right-sidebar-wrap sidebar-fixed">
        <ul class="sidebar-tab list-unstyled clearfix font-header font-11 bg-main">
            <li class="active"><a href="#sideChatTab" data-toggle="tab" class="text-muted">Chat</a></li>
            <li><a href="#sideTaskTab" data-toggle="tab" class="text-muted">Tasks</a></li>
            <li><a href="#sideAlertTab" data-toggle="tab" class="text-muted">Alerts</a></li>
        </ul>
        <div class="sidenav-inner">
            <div class="tab-content">
                <div class="tab-pane fade active in" id="sideChatTab">
                    <ul class="chat-friend-list list-unstyled">
                        <li>
                            <div class="profile-pic">
                            </div>
                            <div class="chat-heading">
                                <span class="chat-time">21 mins ago</span>
                                <div class="chat-name font-semi-bold font-12">Larry McCabe</div>
                            </div>
                            <div class="chat-preview">
                                <span class="badge badge-danger">2</span>
                                <p class="font-12">Behind the device dictates a loyal harden.</p>
                            </div>
                        </li>
                        <li class="online">
                            <div class="profile-pic">
                            </div>
                            <div class="chat-heading">
                                <span class="chat-time">1 hr ago</span>
                                <div class="chat-name font-semi-bold font-12">Harris Wilson</div>
                            </div>
                            <div class="chat-preview">
                                <span class="badge badge-danger">5</span>
                                <p class="font-12">A rectangle accelerates the filter. A dry courtesy advances an apart conjecture.</p>
                            </div>
                        </li>
                        <li class="online">
                            <div class="profile-pic">
                            </div>
                            <div class="chat-heading">
                                <span class="chat-time">1 hr ago</span>
                                <div class="chat-name font-semi-bold font-12">Elvin Cueva</div>
                            </div>
                            <div class="chat-preview">
                                <p class="font-12">The bullet couples a pursuing worry before the litter. A flesh rewrites a striking scanner before the peasant.</p>
                            </div>
                        </li>
                        <li class="away">
                            <div class="profile-pic">
                            </div>
                            <div class="chat-heading">
                                <span class="chat-time">3 hr ago</span>
                                <div class="chat-name font-semi-bold font-12">Katie Calhoun</div>
                            </div>
                            <div class="chat-preview">
                                <p class="font-12">A wrap asserts a flashing asterisk.</p>
                            </div>
                        </li>
                        <li class="online">
                            <div class="profile-pic">
                            </div>
                            <div class="chat-heading">
                                <span class="chat-time">11 hr ago</span>
                                <div class="chat-name font-semi-bold font-12">Joseph Edwards</div>
                            </div>
                            <div class="chat-preview">
                                <p class="font-12">The creature waffles near the violent conservative.</p>
                            </div>
                        </li>
                        <li class="online">
                            <div class="profile-pic">
                            </div>
                            <div class="chat-heading">
                                <span class="chat-time">Yesterday</span>
                                <div class="chat-name font-semi-bold font-12">Lelah Wilburn</div>
                            </div>
                            <div class="chat-preview">
                                <p class="font-12">A stare shines past another bull! A subjective candidate declines without the envelope.</p>
                            </div>
                        </li>
                        <li>
                            <div class="profile-pic">
                            </div>
                            <div class="chat-heading">
                                <span class="chat-time">3 days ago</span>
                                <div class="chat-name font-semi-bold font-12">Felicia Clancy</div>
                            </div>
                            <div class="chat-preview">
                                <p class="font-12">The stereotype rewards an evil.</p>
                            </div>
                        </li>
                        <li class="online">
                            <div class="profile-pic">
                            </div>
                            <div class="chat-heading">
                                <span class="chat-time">Feb 15</span>
                                <div class="chat-name font-semi-bold font-12">Jonathan Zapata</div>
                            </div>
                            <div class="chat-preview">
                                <p class="font-12">A wrap asserts a flashing asterisk.</p>
                            </div>
                        </li>
                        <li class="online">
                            <div class="profile-pic">
                            </div>
                            <div class="chat-heading">
                                <span class="chat-time">Feb 13</span>
                                <div class="chat-name font-semi-bold font-12">Emily Rodriguez</div>
                            </div>
                            <div class="chat-preview">
                                <p class="font-12">A wrap asserts a flashing asterisk.</p>
                            </div>
                        </li>
                    </ul>
                </div><!-- /.tab-pane -->

                <div class="tab-pane fade" id="sideTaskTab">
                    <div class="list-group font-12">
                        <a href="task.html" class="list-group-item">
                            UX/UI Design
                            <div class="progress progress-striped progress-sm active m-t-5 no-m">
                                <div class="progress-bar progress-bar-success" style="width: 60%;"></div>
                            </div>
                        </a>
                        <a href="task.html" class="list-group-item">
                            Wordpress Integration
                            <div class="progress progress-striped progress-sm active m-t-5 no-m">
                                <div class="progress-bar progress-bar-danger" style="width: 10%;"></div>
                            </div>
                        </a>
                        <a href="task.html" class="list-group-item">
                            Bootstrap Application
                            <span class="pull-right">17/20</span>
                        </a>
                        <a href="task.html" class="list-group-item">
                            Mobile Development
                            <span class="badge badge-info">31</span>
                        </a>
                    </div>
                </div><!-- /.tab-pane -->
                <div class="tab-pane fade" id="sideAlertTab">
                    <div class="content-wrap">
                        <div class="alert alert-warning alert-dismissible font-12 m-b-10" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Meeting at 10:00 AM
                        </div>

                        <div class="alert alert-warning alert-dismissible font-12 has-icon m-b-10" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="icon-info alert-icon"></i> New campaign will end in 1 hour
                        </div>

                        <div class="alert alert-warning alert-dismissible font-12 m-b-10" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>2:30 PM</strong>, Start a new Project.
                        </div>
                    </div>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div>
    </aside>
    <!-- End Right Sidebar -->

    <!-- Start Second Level Right Sidebar -->
    <div class="right-sidebar-second-level">
        <div class="sidebar-header bg-main font-12 font-header">
            <span class="text-white">Larry Mccabe</span>
            <button type="button" class="close h4 no-m">&times;</button>
        </div>
        <div class="chat-inner">
            <div class="chat-items font-12">
                <div class="chat-item">
                    <div class="chat-content">
                        <div class="chat-bubble">Hello, How are you?</div>
                        <div class="font-10 text-muted chat-sent">09:42 AM <i class="icon-checkmark text-success m-d-1"></i></div>
                    </div>
                </div>
                <div class="chat-item right chat-main">
                    <div class="chat-content">
                        <div class="chat-bubble">I'm good thanks, How are you doing?</div>
                        <div class="font-10 text-muted chat-sent">09:45 AM <i class="icon-checkmark text-success m-d-1"></i></div>
                    </div>
                </div>
                <div class="chat-item">
                    <div class="chat-content">
                        <div class="chat-bubble">The robot halves its vice house without the witch</div>
                        <div class="font-10 text-muted chat-sent">09:46 AM <i class="icon-checkmark text-success m-d-1"></i></div>
                    </div>
                </div>
                <div class="chat-item right chat-main">
                    <div class="chat-content">
                        <div class="chat-bubble">The hash detects the dirt underneath the squared author.</div>
                        <div class="font-10 text-muted chat-sent">09:46 AM <i class="icon-checkmark text-success m-d-1"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-footer">
            <div class="row">
                <div class="col-xs-9 no-p-r">
                    <input type="text" class="form-control input-sm">
                </div>
                <div class="col-xs-3">
                    <span class="text-muted text-action m-t-5 m-r-5 inline-block"><i class="icon-attachment"></i></span>
                    <span class="text-muted text-action m-t-5 inline-block"><i class="icon-user-plus"></i></span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Second Level Right Sidebar -->

    <!-- Start Main Container -->
    <div class="main-container">
        <?= $content ?>
        <div class="page-header font-header">Timeline</div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Timeline</li>
        </ol>

        <div class="content-wrap">
            <div class="timeline-wrap">
                <div class="timeline-start">
                    <div class="timeline-inner bg-main">
                        <div class="h4 no-m-t text-center">Jul 7, 2015</div>
                        <div class="text-muted font-12">15 Events</div>
                    </div>
                </div>

                <div class="timeline-row clearfix">
                    <div class="timeline-event">
                        <div class="event-box">
                            <div class="event-header">
                                <div class="h4 no-m font-header text-main">7:30 AM - 9:30 AM</div>
                                <div class="text-upper font-12">Meeting with <span class="font-semi-bold">Ricky Palmer</span></div>
                            </div>

                            <hr class="line-dashed m-t-10 m-b-5">

                            <p class="font-12 m-t-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis</p>
                        </div>
                        <div class="timeline-icon">
                            <div class="event-icon"><span><i class="icon-briefcase"></i></span></div>
                        </div>
                    </div>
                </div>

                <div class="timeline-row event-right event-active clearfix">
                    <div class="timeline-event">
                        <div class="event-box">
                            <div class="event-header has-profile-pic clearfix">
                                <div class="h4 no-m font-header text-main">10:05 AM</div>
                                <div class="font-12">Call <span class="font-semi-bold">James Wygant</span></div>
                            </div>
                        </div>

                        <div class="timeline-icon">
                            <div class="event-icon"><span><i class="icon-phone"></i></span></div>
                        </div>
                    </div>
                </div>

                <div class="timeline-row clearfix">
                    <div class="timeline-event">
                        <div class="event-box">
                            <div class="event-header has-profile-pic">
                                <div class="profile-pic">
                                </div>
                                <div class="p-t-5"><span class="font-semi-bold">Kimberly Crouch</span> shared photos</div>
                                <div class="font-12 text-muted">3 mins ago</div>
                            </div>

                            <hr class="line-dashed m-t-10 m-b-5">

                            <div class="row m-t-20">
                            </div>
                        </div>
                        <div class="timeline-icon">
                            <div class="event-icon"><span><i class="icon-images"></i></span></div>
                        </div>
                    </div>
                </div><!-- /.timeline-row -->

                <div class="timeline-row event-right clearfix">
                    <div class="timeline-event">
                        <div class="event-box">
                            <div class="event-header">
                                <div class="h4 no-m font-header text-main">1:00 PM</div>
                                <div class="text-upper font-12">Start Working on <span class="font-semi-bold">Bootstrap Project</span></div>
                            </div>

                            <hr class="line-dashed m-t-10 m-b-5">

                            <p class="font-12 m-t-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor suscipit lobortis</p>
                        </div>
                        <div class="timeline-icon">
                            <div class="event-icon"><span><i class="icon-file-text2"></i></span></div>
                        </div>
                    </div>
                </div><!-- /.timeline-row -->

                <div class="timeline-row clearfix">
                    <div class="timeline-event">
                        <div class="event-box bg-main">
                            <div class="event-header">
                                <div class="h4 no-m font-header">7:15 PM</div>
                                <div class="font-12">Dinner with family</div>
                            </div>
                        </div>
                        <div class="timeline-icon">
                            <div class="event-icon"><span><i class="icon-spoon-knife"></i></span></div>
                        </div>
                    </div>
                </div><!-- /.timeline-row -->

                <div class="timeline-start m-t-40">
                    <div class="timeline-inner bg-dark">
                        <div class="h4 no-m-t text-center text-white">Jul 8, 2015</div>
                        <div class="text-muted font-12">9 Events</div>
                    </div>
                </div>
            </div><!-- /.timeline-wrap -->
        </div><!-- /.content-wrap -->
    </div>
    <!-- End Main Container -->

    <!-- Start Footer -->
    <footer class="footer">
        &copy; 2015. <b>Quantum Admin</b> by <b>Endless Theme</b>
    </footer>
    <!-- End Footer -->

    <!-- Start Modal -->

    <div class="modal modal-scale fade" id="themeSettingModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title font-header text-dark">Theme Setting</h4>
                </div>
                <div class="modal-body">
                    <div class="font-12 text-upper">Primary Color</div>
                    <ul class="color-list list-unstyled m-t-10 clearfix primary-color">
                        <li><span class="bg-primary" data-color="#5090F7" data-name="dark-blue"></span></li>
                        <li><span class="bg-info" data-color="#64d4e4" data-name="blue"></span></li>
                        <li><span class="bg-orange" data-color="#f18f68" data-name="orange"></span></li>
                        <li><span class="bg-purple" data-color="#9775cc" data-name="purple"></span></li>
                        <li><span class="bg-danger" data-color="#fd7a7b" data-name="red"></span></li>
                        <li><span class="bg-warning" data-color="#ffb038" data-name="yellow"></span></li>
                        <li><span class="bg-success" data-color="#56cf87" data-name="green"></span></li>
                    </ul>

                    <hr class="line-dashed">

                    <div class="checkbox">
                        <div class="custom-checkbox font-12">
                            <input type="checkbox" name="sidebarFixed" id="sidebarFixed" checked/>
                            <label for="sidebarFixed">Fixed Side Navigation</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- End Modal -->
</div>
<!-- /.wrapper -->
    <?php $this->endBody() ?>


    <script>
        var ASSETS_PATH = '<?php echo $bundle->baseUrl; ?>';
    </script>
</body>
</html>
<?php $this->endPage() ?>
