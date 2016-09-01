<?php
namespace tmpl\base\frontend\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   tmpl\base\frontend\assets
 * @since     0.1
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@tmpl/base/frontend/assets';
    //public $basePath = '@tmpl/base/frontend';
    //public $baseUrl = '@tmpl/base/frontend';
    public $css = [
        'css/styles.css',
        '/css/tmpl-base-frontend.php' // php css with require config file for templates
    ];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
    ];
    //public $publishOptions = [
    //    'only' => [
    //        'images/',
    //        'js/',
    //        'css/',
    //    ]
    //];
}
