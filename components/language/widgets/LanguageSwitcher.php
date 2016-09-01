<?php

namespace components\language\widgets;

use Bee;
use bee\widgets\Widget;
use bee\widgets\dropdown\ButtonDropdown;
use yii\helpers\Html;


class LanguageSwitcher extends Widget
{
    /**
     * @var string the button label
     */
    public $label = '';

    /**
     * @var array the HTML attributes of the button.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var array the HTML attributes for the container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "div", the name of the container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     * @since 2.0.1
     */
    public $containerOptions = [];

    /**
     * @var array the configuration array for [[Dropdown]].
     */
    public $dropdownOptions = [];

    /**
     * Function parse_url
     * return url like:
     *  [
     *      ['path', 'menu/submenu/.../index'],
     *      ['query', 'option1=data1&option2=data2...&optionn=datan']
     *  ]
     * @static
     * @param $url
     * @return array or false
     */
    public static function parse_url($url)
    {
        $result = false;

        // Build arrays of values we need to decode before parsing
        $entities =    array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%24', '%2C', '%2F', '%3F', '%23', '%5B', '%5D');
        $replacements = array('!',   '*',   "'",   "(",   ")",   ";",   ":",   "@",   "&",   "=",   "$",   ",",   "/",   "?",   "#",   "[",   "]");

        // Parse the URL
        $parts = parse_url(trim($url, '\/'));

        if ($parts) {
            foreach ($parts as $key => $value) {
                $result[$key] = str_replace($entities, $replacements, $value);
            }
        }

        unset($entities);
        unset($replacements);
        unset($parts);
        unset($key);
        unset($value);

        return $result;
    }

    public function run () {
        if(!isset($this->options['class'])) {
            Html::addCssClass($this->options, ['class' => 'btn-default']);
        }

        $languageAll = Bee::$app->getLanguageAll();
        $currentLanguageKey = Bee::$app->getLanguageKey();
        $path = (string) Bee::$app->getRequest()->getUrl();
        $path = $this->parse_url($path);

        $url = null;
        $items = [];

        if (Bee::$app->urlManager->enablePrettyUrl) {
            if($path['path'] === $currentLanguageKey) {
                $path['path'] = '%%lang%%';
            } else {
                $path['path'] = preg_replace('/^(' . $currentLanguageKey . '\/)/', '%%lang%%', $path['path'], 1, $count);
                if ($count === 0) {
                    $path['path'] = '%%lang%%' . $path['path'];
                }
            }
        } else {
            $path['query'] = preg_replace('/^(r=' . $currentLanguageKey . '\/)/', 'r=%%lang%%', $path['query'], 1, $count);
            if($count === 0) {
                $path['query'] = str_replace('r=', 'r=%%lang%%', $path['query']);
            }
        }

        $currentUrl = '/' . $path['path'];
        $currentUrl .= $path['query'] ? '?' . $path['query'] : '';

        foreach ($languageAll as $key => $language) {
            $temp = [];

            /**
             * Add Language CODE only for other languages, not for Default.
             */
            if (
                $key !== Bee::$app->getSourceLanguageKey()
                //|| Bee::$app->getUrlManager()->displaySourceLanguage
            ) {
                $url = str_replace('%%lang%%', $key . '/', $currentUrl);
            } else {
                $url = str_replace('%%lang%%', '', $currentUrl);
            }

            $temp['label'] = $language['title'];
            $temp['url'] = $url;

            if($key === $currentLanguageKey) {
                $temp['options']['class'] = 'active';
            }

            array_push($items, $temp);
        }

        echo ButtonDropdown::widget([
            'label' => $this->label ? $this->label : $languageAll[$currentLanguageKey]['title'],
            'dropdown' => [
                'items' => $items,
                'options' => $this->dropdownOptions,
            ],
            'options' => $this->options,
            'encodeLabel' => false,
            'containerOptions' => $this->containerOptions,
        ]);

        unset($languageAll);
        unset($currentLanguageKey);
        unset($path);
        unset($count);
        unset($url);
        unset($currentUrl);
        unset($key);
        unset($language);
        unset($items);
        unset($temp);
    }
}