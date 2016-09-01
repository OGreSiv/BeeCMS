<?php
namespace assets;

use yii\web\AssetBundle;

/**
 * Class CustomTmplAdminAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package assets
 * @since 0.1
 */
class CustomTmplAdminAsset extends AssetBundle
{
    public $sourcePath = '@assets/template';
    public $css = [
        'css/tmpl-base-admin.php' // php css with require config file for templates
    ];
}