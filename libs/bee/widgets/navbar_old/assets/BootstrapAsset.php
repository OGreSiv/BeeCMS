<?php
/**
 * Class BootstrapAsset
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\widgets\navbar\assets
 * @since 0.1
 */

namespace bee\widgets\navbar\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Twitter bootstrap css files.
 */

class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@libs/widgets/navbar/assets';
    public $css = [
//        'css/bootstrap.css',
        'css/navbar.css',
    ];
    public $js = [
//        'js/bootstrap.js',
        'js/navbar.js',
    ];
}
