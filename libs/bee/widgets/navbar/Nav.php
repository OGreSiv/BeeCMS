<?php
/**
 * Class Nav
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\widgets\navbar
 * @since 0.1
 */

namespace bee\widgets\navbar;

use Bee;
use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * Nav renders a nav HTML component.
 *
 * For example:
 *
 * ```php
 * echo Nav::widget([
 *     'items' => [
 *         [
 *             'label' => 'Home',
 *             'url' => ['site/index'],
 *             'linkOptions' => [...],
 *         ],
 *         [
 *             'label' => 'Dropdown',
 *             'items' => [
 *                  ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
 *                  '<li class="divider"></li>',
 *                  '<li class="dropdown-header">Dropdown Header</li>',
 *                  ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
 *             ],
 *         ],
 *         [
 *             'label' => 'Login',
 *             'url' => ['site/login'],
 *             'visible' => Bee::$app->user->isGuest
 *         ],
 *     ],
 *     'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
 * ]);
 * ```
 *
 * Note: Multilevel dropdowns beyond Level 1 are not supported in Bootstrap 3.
 *
 */

class Nav extends Widget
{
    /**
     * CONSTANTS
     */
    const ICON_BEFORE_LABEL = 0;
    const ICON_AFTER_LABEL = 1;

    /**
     * @var array list of items in the nav widget. Each array element represents a single
     * menu item which can be either a string or an array with the following structure:
     *
     * - label: string, required, the nav item label.
     * - url: optional, the item's URL. Defaults to "#".
     * - visible: boolean, optional, whether this menu item is visible. Defaults to true.
     * - linkOptions: array, optional, the HTML attributes of the item's link.
     * - options: array, optional, the HTML attributes of the item container (LI).
     * - active: boolean, optional, whether the item should be on active state or not.
     * - dropDownOptions: array, optional, the HTML options that will passed to the [[Dropdown]] widget.
     * - items: array|string, optional, the configuration array for creating a [[Dropdown]] widget,
     *   or a string representing the dropdown menu. Note that Bootstrap does not support sub-dropdown menus.
     * - encode: boolean, optional, whether the label will be HTML-encoded. If set, supersedes the $encodeLabels option for only this item.
     *
     * If a menu item is a string, it will be rendered directly without HTML encoding.
     */
    public $items = [];
    /**
     * @var boolean whether the nav items labels should be HTML-encoded.
     */
    public $encodeLabels = true;
    /**
     * @var boolean whether to automatically activate items according to whether their route setting
     * matches the currently requested route.
     * @see isItemActive
     */
    public $activateItems = true;
    /**
     * @var boolean whether to activate parent menu items when one of the corresponding child menu items is active.
     */
    public $activateParents = true;
    /**
     * @var string the route used to determine if a menu item is active or not.
     * If not set, it will use the route of the current request.
     * @see params
     * @see isItemActive
     */
    public $route;
    /**
     * @var array the parameters used to determine if a menu item is active or not.
     * If not set, it will use `$_GET`.
     * @see route
     * @see isItemActive
     */
    public $params;
    /**
     * @var string this property allows you to customize the HTML which is used to generate the drop down caret symbol,
     * which is displayed next to the button text to indicate the drop down functionality.
     * Defaults to `null` which means `<b class="caret"></b>` will be used. To disable the caret, set this property to be an empty string.
     */
    public $dropDownCaret;

    /**
     * @var string prefix for the icon in [[items]]. This string will be prepended
     * before the icon name to get the icon CSS class. This defaults to `glyphicon glyphicon-`
     * for usage with glyphicons available with Bootstrap.
     */
    public $iconPrefix = 'icon-';
    public $iconFramework = 'beeicon';

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        if ($this->route === null && Bee::$app->controller !== null) {
            //$this->route = Bee::$app->controller->getRoute();
            $this->route = Bee::$app->getRequest()->getUrl();
        }

        if ($this->params === null) {
            $this->params = Bee::$app->request->getQueryParams();
        }
        if ($this->dropDownCaret === null) {
            $this->dropDownCaret = Html::tag('span', '', ['class' => 'beeicon icon-arrow1-bottom']);
        }
        Html::addCssClass($this->options, ['widget' => 'side-nav magic-nav']);
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        return $this->renderItems();
    }

    /**
     * Renders widget items.
     */
    public function renderItems()
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            $id = 'submenu'.$i;
            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }
            $items[] = $this->renderItem($id, $item);
        }

        return Html::tag('ul', implode("\n", $items), $this->options);
    }

    /**
     * Renders a widget's item.
     * @param string|array $item the item to render.
     * @return string the rendering result.
     * @throws InvalidConfigException
     */
    public function renderItem($id, $item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
        $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
        $label = Html::tag('span', $label, ['class' => 'nav-text']);
        $icon = empty($item['icon'])
            ? '' : Html::tag('i', '', ['class' => $this->iconFramework . ' ' . $this->iconPrefix . $item['icon']]);
        if(empty($this->options['iconPosition']) && $this->options['iconPosition'] === self::ICON_AFTER_LABEL) {
            $label .= $icon;
        } else {
            $label = $icon . $label;
        }
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
            $url = ArrayHelper::getValue($item, 'url');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

        if (isset($item['active'])) {
            $active = ArrayHelper::remove($item, 'active', false);
        } else {
            $active = $this->isItemActive($item);
        }

        if (empty($items)) {
            $items = '';

            if($url === null) {
                $li = Html::tag('li', $label, $options);
            } else {
                $li = Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);
            }
        } else {
            $linkOptions['data-toggle'] = 'collapse';
            $linkOptions['aria-expanded'] = 'false';
            Html::addCssClass($options, ['widget' => 'has-submenu']);
//            Html::addCssClass($linkOptions, ['widget' => 'dropdown-toggle']);
            if ($this->dropDownCaret !== '') {
                $label .= ' ' . $this->dropDownCaret;
            }
            if (is_array($items)) {
                if ($this->activateItems) {
                    $items = $this->isChildActive($items, $active);
                }
                $items = $this->renderDropdown($id, $items, $item);
            }

            $li = Html::tag('li', Html::a($label, '#'.$id, $linkOptions) . $items, $options);
        }

        if ($this->activateItems && $active) {
            Html::addCssClass($options, 'active');
        }

        return $li;

    }

    /**
     * Renders the given items as a dropdown.
     * This method is called to create sub-menus.
     * @param array $items the given items. Please refer to [[Dropdown::items]] for the array structure.
     * @param array $parentItem the parent item information. Please refer to [[items]] for the structure of this array.
     * @return string the rendering result.
     * @since 2.0.1
     */
    protected function renderDropdown($id, $items, $parentItem)
    {
        return Dropdown::widget([
            'options' => ArrayHelper::getValue($parentItem, 'dropDownOptions', []),
            'items' => $items,
            'encodeLabels' => $this->encodeLabels,
            'clientOptions' => false,
            'view' => $this->getView(),
            'id' => $id
        ]);
    }

    /**
     * Check to see if a child item is active optionally activating the parent.
     * @param array $items @see items
     * @param boolean $active should the parent be active too
     * @return array @see items
     */
    protected function isChildActive($items, &$active)
    {
//        echo '<pre>';
//        print_r($items);
//        echo '</pre>';
        foreach ($items as $i => $child) {
            if (ArrayHelper::remove($items[$i], 'active', false) || $this->isItemActive($child)) {
                Html::addCssClass($items[$i]['options'], 'active');

//                $huy = $this->getParentStack($items[$i]['url'], $items);
//                echo '<pre>';
//                print_r($huy);
//                echo '</pre>';
                if ($this->activateParents) {
                    $active = true;
                }
            }
        }
        return $items;
    }

    /**
     * Checks whether a menu item is active.
     * This is done by checking if [[route]] and [[params]] match that specified in the `url` option of the menu item.
     * When the `url` option of a menu item is specified in terms of an array, its first element is treated
     * as the route for the item and the rest of the elements are the associated parameters.
     * Only when its route and parameters match [[route]] and [[params]], respectively, will a menu item
     * be considered active.
     * @param array $item the menu item to be checked
     * @return boolean whether the menu item is active
     */
    protected function isItemActive($item)
    {
//        echo '<pre>';
//        print_r(isset($item['url']) ? $item['label'] : '---NOLABEL---');
//        echo '<br>';

        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
        } elseif(isset($item['url'])) {
            $route = $item['url'];
        }
//        echo '<br>';
//        var_dump($route);
//        echo '<br>';
//        print_r('-----------------------');

        if ($route == $this->route) {
//            print_r("YEEEEEEEEEE");
//            echo '</pre>';
            return true;
        }

//        if (count($item['url']) > 1) {
//            $params = $item['url'];
//            unset($params[0]);
//            foreach ($params as $name => $value) {
//                if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
//                    return false;
//                }
//            }
//        }
        echo '</pre>';

        return false;
    }

    /**
     * Gets the parent stack of a string array element if it is found within the
     * parent array
     *
     * This will not search objects within an array, though I suspect you could
     * tweak it easily enough to do that
     *
     * @param string $child The string array element to search for
     * @param array $stack The stack to search within for the child
     * @return array An array containing the parent stack for the child if found,
     *               false otherwise
     */
    function getParentStack($child, $stack) {
        foreach ($stack as $k => $v) {
            if (is_array($v)) {
                // If the current element of the array is an array, recurse it and capture the return
                $return = $this->getParentStack($child, $v);

                // If the return is an array, stack it and return it
                if (is_array($return)) {
//                    return array($k => $return);
                    echo '<pre>';
                    print_r(array($k => $return));
                    echo '</pre>';
                }
            } else {
                // Since we are not on an array, compare directly
                if ($v == $child) {
                    // And if we match, stack it and return it
//                    return array($k => $child);
                    echo '<pre>';
                    print_r(array($k => $return));
                    echo '</pre>';
                }
            }
        }

        // Return false since there was nothing found
        return false;
    }
}
