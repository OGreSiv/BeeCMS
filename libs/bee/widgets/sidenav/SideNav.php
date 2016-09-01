<?php
/**
 * SideNav.php
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms.local
 * @since 0.1
 * Date: 25.07.2016
 */

namespace bee\widgets\sidenav;

use yii\helpers\Html;
use bee\widgets\sidenav\SideNavAsset;

/**
 * A custom extended side navigation menu extending Bee Menu
 *
 * For example:
 *
 * ```php
 * echo SideNav::widget([
 *     'items' => [
 *         [
 *             'url' => ['/site/index'],
 *             'label' => 'Home',
 *             'icon' => 'home'
 *         ],
 *         [
 *             'url' => ['/site/about'],
 *             'label' => 'About',
 *             'icon' => 'info-sign',
 *             'items' => [
 *                  ['url' => '#', 'label' => 'Item 1'],
 *                  ['url' => '#', 'label' => 'Item 2'],
 *             ],
 *         ],
 *     ],
 * ]);
 * ```
 */
class SideNav extends \kartik\sidenav\SideNav
{
    public function init()
    {
//        parent::init();
        SideNavAsset::register($this->getView());
        $this->activateParents = true;
        $this->submenuTemplate = "\n<ul class='nav nav-stacked'>\n{items}\n</ul>\n";
        $this->linkTemplate = '<a href="{url}">{icon}{label}</a>';
        $this->labelTemplate = '{icon}{label}';
        $this->markTopItems();
        Html::addCssClass($this->options, 'nav nav-stacked');
    }

    public function run()
    {
        $heading = '';
        if (isset($this->heading) && $this->heading != '') {
            Html::addCssClass($this->headingOptions, 'panel-heading');
            $heading = Html::tag('div', '<h3 class="panel-title">' . $this->heading . '</h3>', $this->headingOptions);
        }
        $body = Html::tag('div', $this->renderMenu(), ['class' => 'table']);
        Html::addCssClass($this->containerOptions, "panel-{$this->type}");
        echo Html::tag('div', $heading . $body, $this->containerOptions);
    }
}