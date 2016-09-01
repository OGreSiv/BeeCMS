<?php
namespace bee\components\ReadHttpHeader;

use yii\base\Component;

/**
 * Class ReadHttpHeaderComponent
 *
 * Example for show user IP
 * ```php
 *  $ip = Bee::$app->ReadHttpHeader->RealIP();
 *  echo $ip;
 * ```
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   bee\components\ReadHttpHeader
 * @since     0.1
 */
class ReadHttpHeaderComponent extends Component
{

    public function RealIP ()
    {
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

                return false;
            }
        }
    }

}