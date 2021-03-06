<?php
namespace assets;

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
class JsPluginAsset extends AssetBundle
{
    public $sourcePath = '@assets/jquery/plugins';
    public $js = [
        'modernizr.min.js',
        'jquery.slimscroll.min.js',
        'jquery.animsition.min.js',
    ];
}