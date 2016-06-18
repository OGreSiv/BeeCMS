<?php
/**
 * BeeModule.php
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   bee-cms.local
 * @since     0.1
 * Date: 15.06.2016
 */
namespace app\libs\bee\classes;

use Yii;

class Module extends \yii\base\Module
{
    /**
     * @var string
     */
    public $layout = 'index';

    /**
     * @var string
     */
    public $defaultLauout = 'base';


    public function init()
    {
        parent::init();
        $this->loadConfig();
        $this->loadLayout();
    }

    /**
     * Function loadLayout
     * Load layout by defoult
     */
    public function loadLayout ($layout = null) {
        if($layout === null){
            $layout = $this->defaultLauout;
        }

        /*
         * @TODO Сделать настройки переключения (мультидевайсы/Респонсив шаблон). Подключать автоматически из настроек.
         */
        $enterDevice = DeviceDetector::getDevice();

        $this->setLayoutPath('@app/templates/' . $layout .'/' . $this->getSideInterface() . '/views/' . $enterDevice);
    }

    /**
     * Load configuration file
     * if this file is exist in root directory of the current component
     * @return bool
     */
    public function loadConfig() {
        if (count($this->getModules()) > 0){
            foreach ($this->getModules() as $moduleName => $moduleValue) {
                if (is_file($this->getBasePath() . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . 'config.php')) {

                    \Yii::configure($this, require($this->getBasePath() . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . 'config.php'));
                }
            }
        }

        if (is_file($this->getBasePath() . DIRECTORY_SEPARATOR . 'config.php')) {
            \Yii::configure($this, require($this->getBasePath() . DIRECTORY_SEPARATOR . 'config.php'));
        }
    }

    /**
     * Function getSideInterface
     * If specified in the address bar: DEV or ADMIN
     * Or, by default = frontend
     * @TODO move this to UrlManager and set this in special array param
     * @return string
     */
    public function getSideInterface ()
    {
        $zone = explode('/', \Yii::$app->getRequest()->getPathInfo());
        switch ($zone[0]) {
            case 'dev':
            case 'admin':
                return $zone[0];
                break;
            default:
                return 'frontend';
                break;
        }
    }
}