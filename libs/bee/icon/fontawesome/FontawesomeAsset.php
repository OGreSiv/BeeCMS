<?php

namespace bee\icon\fontawesome;
use yii\web\AssetBundle;

/**
 * Class FontawesomeAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\icon\fontawesome
 * @since 0.1
 */
class FontawesomeAsset extends AssetBundle
{
    public $sourcePath = '@bee/icon/fontawesome';
    public $css = [
        'css/fontawesome.css'
    ];
}