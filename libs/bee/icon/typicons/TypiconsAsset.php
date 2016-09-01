<?php

namespace bee\icon\typicons;
use yii\web\AssetBundle;

/**
 * Class TypiconsAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\icon\typicons
 * @since 0.1
 */
class TypiconsAsset extends AssetBundle
{
    public $sourcePath = '@bee/icon/typicons';
    public $css = [
        'css/typicons.css',
    ];
}