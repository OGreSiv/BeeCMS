<?php

namespace bee\icon\beeicon;
use yii\web\AssetBundle;

/**
 * Class BeeIconIE8Asset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\icon
 * @since 0.1
 */
class BeeIconIE8Asset extends AssetBundle
{
    public $sourcePath = '@bee/icon/beeicon/assets';
    public $css = [
        'css/ie7.css',
    ];
    public $cssOptions = [
        'position' => \yii\web\View::POS_END,
        'condition' => 'lte IE8'
    ];

    public $js = [
        'ie7.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END,
        'condition' => 'lte IE8'
    ];
}