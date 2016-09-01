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
class TemplateAsset extends AssetBundle
{
    public $sourcePath = '@tmpl/base/dev/assets';
    public $css = [
        'css/loader.css',
        'css/animate.min.css',
        'css/hover-min.css',
        'css/animsition.min.css',
        'css/template.css'
    ];
    public $js = [
        'js/app.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];

    public $cssOptions = [];
    public $depends = [
        'yii\web\YiiAsset',
        'assets\JsPluginAsset',
        'assets\BootstrapAsset',
        'assets\IE9Asset',
    ];
}