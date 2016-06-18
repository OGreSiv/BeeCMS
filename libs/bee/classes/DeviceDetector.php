<?php
namespace app\libs\bee\classes;

use Yii;
use Detection\MobileDetect;

class DeviceDetector {

    public static $mobileDetect;

    public static function layoutTypes()
    {
        return [
            0 => 'desktop',
            1 => 'tablet',
            2 => 'mobile'
        ];
    }

    public static function getDevice () {
        $layoutTypes = self::layoutTypes();
        self::$mobileDetect = new MobileDetect();

        // Safety check.
        $isMobile = self::isMobile();
        $isTablet = self::isTablet();
        $session = Yii::$app->session;

        // Set the layout type.
        if (isset($_GET['layoutType']) ) {
            if ($_GET['layoutType'] == 'unset') {
                /* Очистить все стили */
                Yii::$app->session->remove('layoutType');
                $layoutType = ($isMobile ? ($isTablet ? $layoutTypes[1] : $layoutTypes[2]) : $layoutTypes[0]);
            } else {
                if (in_array($_GET['layoutType'], $layoutTypes) ) {
                    /* Загрузка стиля по GET запросу */
                    $layoutType = $_GET['layoutType'];
                } else {
                    if (!$session->has('layoutType')) {
                        /* Шаблон не существует. В сессии нет шаблона. Установка шаблона по устройству */
                        $layoutType = ($isMobile ? ($isTablet ? $layoutTypes[1] : $layoutTypes[2]) : $layoutTypes[0]);
                    } else {
                        /* Шаблон не существует. Загрузка шаблона из сессии */
                        $layoutType =  $session->get('layoutType');
                    }
                }
            }
        } else {
            if (!$session->has('layoutType')) {
                /* Установка шаблона по типу устройства */
                $layoutType = ($isMobile ? ($isTablet ? $layoutTypes[1] : $layoutTypes[2]) : $layoutTypes[0]);
            } else {
                /* Берем шаблон из сессии */
                $layoutType =  $session->get('layoutType');
            }
        }

        $session->set('layoutType', $layoutType);

        return $layoutType;
    }

    public static function isMobile()
    {
        return self::$mobileDetect->isMobile();
    }

    public static function getUserAgent()
    {
        return self::$mobileDetect->getUserAgent();
    }

    public static function getPhoneDevices()
    {
        return self::$mobileDetect->getPhoneDevices();
    }

    public static function getTabletDevices()
    {
        return self::$mobileDetect->getTabletDevices();
    }

    public static function isTablet($userAgent = null, $httpHeaders = null)
    {
        return self::$mobileDetect->isTablet($userAgent, $httpHeaders);
    }

    public static function is($key, $userAgent = null, $httpHeaders = null)
    {
        return self::$mobileDetect->is($key, $userAgent, $httpHeaders);
    }

    public static function getOperatingSystems()
    {
        return self::$mobileDetect->getOperatingSystems();
    }
}