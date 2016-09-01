<?php
namespace tmpl\base\dev\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   tmpl\base\dev\assets
 * @since     0.1
 */
class StylesAsset extends AssetBundle
{
    public $sourcePath = '@tmpl/base/dev/assets';
    public $css = [
        'css/styles/template_darkblue.css',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];

    public $cssOptions = [
        'class' => 'core-css',
    ];
    public $publishOptions = [
        'only' => [
            'js/*',
            'css/*',
            'css/styles/*',
            'images/*'
        ]
    ];

    public $depends = [
        'tmpl\base\dev\assets\TemplateAsset',
        'assets\CustomTmplDevAsset',
    ];
}