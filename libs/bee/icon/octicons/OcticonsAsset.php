<?php

namespace bee\icon\octicons;
use yii\web\AssetBundle;

/**
 * Class OcticonsAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\icon\octicons
 * @since 0.1
 */
class OcticonsAsset extends AssetBundle
{
    public $sourcePath = '@bee/icon/octicons';
    public $css = [
        'css/octicons.css'
    ];
}