<?php

/**
 * NavBar.php
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms.local
 * @since 0.1
 * Date: 25.07.2016
 */
namespace bee\widgets\navbar;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use bee\widgets\navbar\assets\BootstrapAsset;

/**
 * NavBar renders a navbar HTML component.
 *
 * Any content enclosed between the [[begin()]] and [[end()]] calls of NavBar
 * is treated as the content of the navbar. You may use widgets such as [[Nav]]
 * or [[\yii\widgets\Menu]] to build up such content. For example,
 *
 * ```php
 * use bee\widgets\navbar\NavBar;
 * use bee\widgets\navbar\Nav;
 *
 * NavBar::begin();
 * echo Nav::widget([
 *     'items' => [
 *         ['label' => 'Home', 'url' => ['/site/index']],
 *         ['label' => 'About', 'url' => ['/site/about']],
 *     ],
 *     'options' => ['class' => 'navbar-nav'],
 * ]);
 * NavBar::end();
 * ```
 *
 */
class NavBar extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "nav", the name of the container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /**
     * @var array the HTML attributes of the inner container.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $innerContainerOptions = [];


    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $this->clientOptions = false;

        if (empty($this->options['class'])) {
            Html::addCssClass($this->options, ['side-navigation-wrap']);
        } else {
            Html::addCssClass($this->options, ['widget' => 'side-navigation-wrap']);
        }
        echo Html::beginTag('aside', $this->options);                                                                   //  |

        if (!isset($this->innerContainerOptions['class'])) {
            Html::addCssClass($this->innerContainerOptions, ['sidenav-inner']);
        } else {
            Html::addCssClass($this->innerContainerOptions, ['widget' => 'sidenav-inner']);
        }
        echo Html::beginTag('div', $this->innerContainerOptions);                                                       //  |-
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::endTag('div');                                                                                       //  |-
        echo Html::endTag('aside');                                                                                     //  |
    }

    /**
     * Function renderToggleButton
     * @param null $iconClass
     */
    public function renderToggleButton($iconClass = null) {
            $icon = Html::tag(
                'span',
                Html::tag('i', '', ['class' => $iconClass ? $iconClass : 'icomoon icon-indent-decrease']),
                ['class' => 'im']
            );

            echo Html::a($icon, '#', [
                'class' => 'font-lg sidenav-size-toggle',
                'data-toggle' => 'side-nav-sm',
                'data-target' => ".wrapper",
            ]);
    }
}
