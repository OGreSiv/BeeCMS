<?php

namespace bee\icon\icomoon;
use yii\web\AssetBundle;

/**
 * Class IcomoonAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\icon\icomoon
 * @since 0.1
 */
class IcomoonAsset extends AssetBundle
{
    public $sourcePath = '@bee/icon/icomoon';
    public $css = [
        'css/icomoon.css'
    ];
}