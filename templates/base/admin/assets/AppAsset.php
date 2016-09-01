<?php
namespace tmpl\base\admin\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package tmpl\base\admin\assets
 * @since 0.1
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@tmpl/base/admin/assets';
    public $css = [
        'css/styles.css',
        '/css/tmpl-base-admin.php' // php css with require config file for templates
    ];
    public $js = [];
    public $depends = [
        //'yii\web\YiiAsset',
    ];
}
