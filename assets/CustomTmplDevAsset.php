<?php
namespace assets;

use yii\web\AssetBundle;

/**
 * Class CustomTmplDevAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package assets
 * @since 0.1
 */
class CustomTmplDevAsset extends AssetBundle
{
    public $sourcePath = '@assets/template';
    public $css = [
        'css/tmpl-base-dev.php' // php css with require config file for templates
    ];
}