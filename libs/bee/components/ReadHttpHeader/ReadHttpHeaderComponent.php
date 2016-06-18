<?php
namespace app\libs\bee\components\ReadHttpHeader;

use Yii;
use yii\base\Component;

/**
 * Class ReadHttpHeaderComponent
 *
 * Example for show user IP
 * ```php
 *  $ip = Yii::$app->ReadHttpHeader->RealIP();
 *  echo $ip;
 * ```
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   app\libs\bee\components\ReadHttpHeader
 * @since     0.1
 */
class ReadHttpHeaderComponent extends Component
{

    public function RealIP ()
    {
        $ip = FALSE;

        $seq = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ];

        foreach ($seq as $key) {
            if (array_key_exists($key, $_SERVER) === TRUE) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP) !== FALSE) {
                        return $ip;
                    }
                }
            }
        }
    }

}