<?php
namespace app\templates\base\frontend\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   app\templates\base\frontend\assets
 * @since     0.1
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/templates/base/frontend';
    //public $basePath = '@app/templates/base/frontend';
    //public $baseUrl = '@app/templates/base/frontend';
    public $css = [
        'css/styles.css',
        '/css/tmpl-base-frontend.php' // php css with require config file for templates
    ];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    //public $publishOptions = [
    //    'only' => [
    //        'images/',
    //        'js/',
    //        'css/',
    //    ]
    //];
}
