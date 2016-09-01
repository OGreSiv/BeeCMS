<?php
namespace assets;

use yii\web\AssetBundle;

/**
 * Class CustomTmplFrontendAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package assets
 * @since 0.1
 */
class CustomTmplFrontendAsset extends AssetBundle
{
    public $sourcePath = '@assets/template';
    public $css = [
        'css/tmpl-base-frontend.php' // php css with require config file for templates
    ];
}