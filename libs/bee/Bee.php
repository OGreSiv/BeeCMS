<?php
/**
 * Class Bee
 * Bee is a helper class serving common framework functionalities.
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms
 * @since 0.1
 */

require(__DIR__ . '/../vendor/yiisoft/yii2/BaseYii.php');


class Yii extends \yii\BaseYii{}
class Bee extends Yii{
    /**
     * Function t
     * Translates a message to the specified language.
     *
     * This is a shortcut method of [[\yii\i18n\I18N::translate()]].
     *
     * ```php
     * $username = 'Alexander';
     * echo \Bee::t('component_name', 'app', 'Hello, {username}!', ['username' => $username]);
     * ```
     *
     * @static
     * @param string $component name in "Component folder"
     * @param string $category the message category.
     * @param string $message the message to be translated.
     * @param array $params the parameters that will be used to replace the corresponding placeholders in the message.
     * @param string $language the language code (e.g. `en-US`, `en`). If this is null, the current
     * [[\yii\base\Application::language|application language]] will be used.
     * @return string the translated message.
     */
    public static function t($component = '', $category, $message, $params = [], $language = null) {
        if($component === 'bee') {
            $category = 'libs/bee/messages/' . $category;
        } elseif($component !== '') {
            $category = 'components/' . $component . '/language/' . $category;
        }
        return parent::t($category, $message, $params, $language);
    }

    /**
     * Returns an HTML hyperlink that can be displayed on your Web page showing "Powered by Yii Framework" information.
     * @return string an HTML hyperlink that can be displayed on your Web page showing "Powered by Yii Framework" information
     */
    public static function powered() {
        return \Bee::t('bee', 'bee', 'POWERED_BY {bee}', [
            'bee' => '<a href="http://www.bee-cms.net/" rel="external">' .
                         \Bee::t('bee', 'bee', 'BEE_CMS') .
                     '</a>'
        ]);
    }
}

spl_autoload_register(['Bee', 'autoload'], true, true);
Bee::$classMap = require('/../vendor/yiisoft/yii2/classes.php');
Bee::$container = new yii\di\Container();