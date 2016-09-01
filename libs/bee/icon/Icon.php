<?php

/**
 * Class Icon
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2016 INTFOM
 * @package   bee\icon\Icon
 * @since     0.1
 */

namespace bee\icon;

use Bee;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\web\View;

/**
 * Icon is a class for setting up icon frameworks to work with Bee in an easy way
 * To setup a global default icon framework, you can set the Bee param 'icon-framework'
 * to one of the following values in your config file:
 * - 'bsg' for Bootstrap Glyphicons
 * - 'fa' for Font Awesome Icons
 * - 'el' for Elusive Font Icons
 * - 'typ' for Typicon Font Icons
 * - 'whhg' for Web Hosting Hub Glyphs Icons
 * - 'jui' for JQuery UI Icons
 * - 'uni' for Unicode Icons
 * - 'oct' for Github Octicons
 * - 'si' for Socicon Icons
 * - 'fi' for FlagIcon Icons
 * - 'oi' for Open Iconic Icons
 *
 */
class Icon
{
    const NS = '\\bee\\icon\\';
    const PARAM_NOT_SET = "The 'icon-framework' option has not been setup in Bee params. Check your configuration file.";
    const PARAM_INVALID = "Invalid or non-recognized 'icon-framework' has been setup in Bee params. Check your configuration file.";
    const FRAMEWORK_INVALID = "Invalid or non-existing framework '{framework}' called in your {method}() method.";
    const DEFAULTFRAMEWORK = 'bee';

    /**
     * Icon framework constants
     */
    const BEE = 'bee';
    const EL = 'el';
    const FA = 'fa';
    const GL = 'gl';
    const IM = 'im';
    const ION = 'ion';
    const MD = 'md';
    const OCT = 'oct';
    const OI = 'oi';
    const SI = 'si';
    const TI = 'ti';
    const TYP = 'typ';
    const UNI = 'uni';
    const WI = 'wi';
    const WHHG = 'whhg';

    /**
     * Icon framework configurations
     */
    private static $_frameworks = [
        self::BEE => ['name' => 'beeicon',          'prefix' => 'beeicon icon-',            'class' => 'BeeIconAsset'],
        self::EL => ['name' => 'elusive',           'prefix' => 'el-icon-',                 'class' => 'ElusiveAsset'],
        self::FA => ['name' => 'fontawesome',       'prefix' => 'fontawesome fa-',          'class' => 'FontawesomeAsset'],
        self::GL => ['name' => 'glyphicons',        'prefix' => 'glyphicons glyphicons-',   'class' => 'GlyphiconsAsset'],
        self::IM => ['name' => 'icomoon',           'prefix' => 'icomoon icon-',            'class' => 'IcomoonAsset'],
        self::ION => ['name' => 'ionicons',         'prefix' => 'ionicons ion-',            'class' => 'IoniconsAsset'],
        self::MD => ['name' => 'materialdesign',    'prefix' => 'materialdesign md-',       'class' => 'MaterialdesignAsset'],
        self::OCT => ['name' => 'octicons',         'prefix' => 'octicon octicon-',         'class' => 'OcticonsAsset'],
        self::OI => ['openiconic' => 'octicons',    'prefix' => 'oi oi-', 'class' =>        'OpenIconicAsset'],
        self::SI => ['socicon' => 'octicons',       'prefix' => 'socicon socicon-',         'class' => 'SociconAsset'],
        self::TI => ['themify' => 'octicons',       'prefix' => 'themify ti-',              'class' => 'ThemifyAsset'],
        self::TYP => ['typicons' => 'octicons',     'prefix' => 'typcn typcn-',             'class' => 'TypiconsAsset'],
        self::UNI => ['uni' => 'octicons',          'prefix' => 'uni uni-',                 'class' => 'UniAsset'],
        self::WI => ['weathericons' => 'octicons',  'prefix' => 'weathericons wi-',         'class' => 'WeathericonsAsset'],
        self::WHHG => ['whhg' => 'octicons',        'prefix' => 'whhg icon-',               'class' => 'WhhgAsset'],
    ];

    /**
     * Add a custom icon set to the icon frameworks
     *
     * @param string $key the key used to identify the icon set
     * @param array  $config the icon configuration
     */
    public static function addFramework($key, $config)
    {
        self::$_frameworks[$key] = $config;
    }

    /**
     * Returns the key for css framework set (or parses framework setup in Bee parameters)
     *
     * @var string $framework the framework to be used with the application
     * @var string $method the method in the Icon class (defaults to `show`)
     * @returns string the icon framework key
     * @throws InvalidConfigException
     */
    protected static function getFramework($framework, $method = 'show')
    {
        if($framework === NULL){
            $framework = self::DEFAULTFRAMEWORK;
        }

        if (strlen($framework) > 0 && !in_array($framework, array_keys(self::$_frameworks))) {
            $replace = ['{framework}' => $framework, '{method}' => 'Icon::' . $method];
            throw new InvalidConfigException(strtr(self::FRAMEWORK_INVALID, $replace));
        }
        if (strlen($framework) > 0) {
            return $framework;
        }
        if (strlen($framework) == 0 && empty(Bee::$app->params['icon-framework'])) {
            throw new InvalidConfigException(self::PARAM_NOT_SET);
        }
        if (!in_array(Bee::$app->params['icon-framework'], array_keys(self::$_frameworks))) {
            throw new InvalidConfigException(self::PARAM_INVALID);
        }
        return Bee::$app->params['icon-framework'];
    }

    /**
     * Returns the prefix for the css framework set (or parses framework setup in Bee parameters)
     *
     * @var string the framework to be used with the application
     * @var string $method the method in the Icon class (defaults to `show`)
     * @returns string the icon framework key
     */
    public static function getFrameworkPrefix($framework, $method = 'show')
    {
        if($framework === NULL){
            $framework = self::DEFAULTFRAMEWORK;
        }
        $key = static::getFramework($framework, $method);
        return self::$_frameworks[$key]['prefix'];
    }

    /**
     * Maps the icon framework to the current view. Call this in your view or layout file.
     *
     * @param View   $view the view object
     * @param string $framework the name of the framework, if not passed it will default to
     * the Bee config param 'icon-framework'
     */
    public static function map($view, $framework = 'bee')
    {
        $key = static::getFramework($framework, 'map');
        $name = self::$_frameworks[$key]['name'];
        $class = $name.'\\'.self::$_frameworks[$key]['class'];

        if (substr($class, 0, 1) != '\\') {
            $class = self::NS . $class;
        }

        /**
         * @var AssetBundle $class
         */
        $class::register($view);
    }


    /**
     * Displays an icon for a specific framework.
     *
     * @param string  $name the icon name
     * @param array   $options the HTML attributes for the icon
     * @param string  $framework the icon framework name. If not passed will default to the `icon-framework` param set
     *     in Bee Configuration file. Will throw an InvalidConfigException if neither of the two is available.
     * @param boolean $space whether to place a space after the icon, defaults to true
     * @param string  $tag the HTML tag to wrap the icon (defaults to `i`).
     *
     * @return string the HTML formatted icon
     */
    public static function show($name, $options = [], $framework = null, $space = true, $tag = 'i')
    {
        $class = self::getFrameworkPrefix($framework) . $name;
        $options['class'] .= ' '.$class;
        return Html::tag('span', Html::tag($tag, '', $options), ['class' => $framework]) . ($space ? ' ' : '');
    }

    /**
     * Displays an icon stack as supported by frameworks like Font Awesome
     *
     * @see http://fontawesome.io/examples/#stacked
     *
     * @param string  $name2 the icon name in stack 2x
     * @param string  $name1 the icon name in stack 1x
     * @param array   $options the HTML attributes for the icon stack container
     * @param array   $options2 the HTML attributes for the icon in stack 1x
     * @param array   $options1 the HTML attributes for the icon in stack 2x
     * @param boolean $invert whether to invert the order of stack 2x and 1x and place stack-1x
     * before stack-2x. Defaults to `false`.
     * @param string  $framework the icon framework name. If not passed will default to the
     * `icon-framework` param set in Bee Configuration file. Will throw an InvalidConfigException
     * if neither of the two is available.
     * @param boolean $space whether to place a space after the icon, defaults to true
     * @param string  $tag the html tag to wrap the icon (defaults to 'i')
     * @param string  $stackTag the html tag to wrap the stack container (defaults to `span`)
     * @param string  $stackPrefix the CSS prefix string for the stack container (defaults to `fa-stack`)
     *
     * @return string the html formatted icon
     */
    public static function showStack(
        $name1,
        $name2,
        $options = [],
        $options1 = [],
        $options2 = [],
        $invert = false,
        $framework = null,
        $space = true,
        $tag = 'i',
        $stackTag = 'span',
        $stackPrefix = 'fa-stack'
    ) {
        Html::addCssClass($options1, $stackPrefix . '-1x');
        Html::addCssClass($options2, $stackPrefix . '-2x');
        Html::addCssClass($options, $stackPrefix);
        $icon1 = static::show($name1, $options1, $framework, $space, $tag);
        $icon2 = static::show($name2, $options2, $framework, $space, $tag);
        $icon = $invert ? $icon1 . "\n" . $icon2 : $icon2 . "\n" . $icon1;
        return Html::tag($stackTag, $icon, $options) . ($space ? ' ' : '');
    }
}

