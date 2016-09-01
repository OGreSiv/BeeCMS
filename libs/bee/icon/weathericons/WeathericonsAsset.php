<?php

namespace bee\icon\weathericons;
use yii\web\AssetBundle;

/**
 * Class WeathericonsAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\icon\weathericons
 * @since 0.1
 */
class WeathericonsAsset extends AssetBundle
{
    public $sourcePath = '@bee/icon/weathericons';
    public $css = [
        'css/weathericons.css'
    ];
}