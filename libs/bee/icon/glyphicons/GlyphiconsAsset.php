<?php

namespace bee\icon\glyphicons;
use yii\web\AssetBundle;

/**
 * Class GlyphiconsAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\icon\glyphicons
 * @since 0.1
 */
class GlyphiconsAsset extends AssetBundle
{
    public $sourcePath = '@bee/icon/glyphicons';
    public $css = [
        'css/glyphicons.css'
    ];
}