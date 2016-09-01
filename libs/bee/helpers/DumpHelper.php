<?php
namespace bee\helpers;

use yii\base\Component;
use yii\helpers\BaseVarDumper;

/**
 * Dump.php
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms.local
 * @since 0.1
 * Date: 13.07.2016
 */
class DumpHelper extends Component
{
    static function vd($var, $exit = false, $depth = 10)
    {
        echo BaseVarDumper::dump($var, $depth, true);

        if ($exit) {
            exit;
        }
    }
}