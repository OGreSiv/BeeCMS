<?php

namespace bee\icon\beeicon;
use yii\web\AssetBundle;

/**
 * Class BeeIconAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\icon
 * @since 0.1
 */
class BeeIconAsset extends AssetBundle
{
    public $sourcePath = '@bee/icon/beeicon/assets';
    public $css = [
        'css/beeicon.css',
//        'assets/css/style.css',
    ];

    public $depends = [
        'bee\icon\beeicon\BeeIconIE8Asset'
    ];
}