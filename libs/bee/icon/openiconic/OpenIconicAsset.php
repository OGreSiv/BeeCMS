<?php

namespace bee\icon\openiconic;
use yii\web\AssetBundle;

/**
 * Class OpenIconicAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\icon\openiconic
 * @since 0.1
 */
class OpenIconicAsset extends AssetBundle
{
    public $sourcePath = '@bee/icon/openiconic';
    public $css = [
        'css/openiconic.css'
    ];
}