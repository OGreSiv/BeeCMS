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
class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@assets/bootstrap';
    public $css = [
        'css/bootstrap.css',
    ];
    public $js = [
        'js/bootstrap.js',
    ];
}