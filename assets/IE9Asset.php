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
class IE9Asset extends AssetBundle
{
    public $sourcePath = '@assets/ie9/js';

    public $js = [
        'js/html5shiv.min.js',
        'js/respond.min.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END,
        'condition' => 'lte IE9'
    ];
}