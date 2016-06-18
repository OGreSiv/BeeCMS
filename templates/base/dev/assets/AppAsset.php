<?php
namespace app\templates\base\dev\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   app\templates\base\dev\assets
 * @since     0.1
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/templates/base/dev';
    public $css = [
        'css/styles.css',
        '/css/tmpl-base-dev.php' // php css with require config file for templates
    ];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
