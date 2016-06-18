<?php
namespace app\templates\base\admin\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   app\templates\base\admin\assets
 * @since     0.1
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/templates/base/admin';
    public $css = [
        'css/styles.css',
        '/css/tmpl-base-admin.php' // php css with require config file for templates
    ];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
