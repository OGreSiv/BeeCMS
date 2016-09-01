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
namespace bee\module;

use Bee;
use yii\base\InvalidValueException;
use yii\base\UnknownClassException;
use bee\devicedetector\DeviceDetector;

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

    /**
     * @var array
     */
    public $bootstrapModulesDepending = [];


    public function init()
    {
        $this->loadBootstrapModulesDepending();
        parent::init();
        $this->loadConfig();
        $this->loadLayout();
    }

    /**
     * Function loadBootstrapModulesDepending
     * Load dependent modules in current component
     *
     * @throws InvalidValueException
     * @throws UnknownClassException
     */
    public function loadBootstrapModulesDepending(){
        if(!is_array($this->bootstrapModulesDepending)){
            throw new InvalidValueException('The value "bootstrapModulesDepending" must be an array.');
        }

        array_unshift($this->bootstrapModulesDepending, $this->id);

        if(count($this->bootstrapModulesDepending) > 0) {
            foreach($this->bootstrapModulesDepending as $bootstrapMD) {
                $className = ucfirst($bootstrapMD) . 'Bootstrap';

                $classFile = Bee::getAlias('@components/' . $bootstrapMD . '/' . $className . '.php');
                if ($classFile === false || !is_file($classFile)) {
                    throw new UnknownClassException("Unable to find '$className' in file: $classFile. Namespace missing?");
                    continue;
                }

                $component = Bee::createObject([
                    'class' => 'components\\' . $bootstrapMD . '\\' . $className,
                ]);

                if ($component instanceof \yii\base\BootstrapInterface) {
                    Bee::trace("Bootstrap with " . get_class($component) . '::bootstrap()', __METHOD__);
                    $component->bootstrap($this);
                } else {
                    Bee::trace("Bootstrap with " . get_class($component), __METHOD__);
                }
            }
        }

        return true;
    }

    /**
     * Function loadLayout
     * Load layout by default
     * @param null $layout
     */
    public function loadLayout ($layout = null) {
        if($layout === null){
            $layout = $this->defaultLauout;
        }

        /*
         * @TODO Сделать настройки переключения (мультидевайсы/Респонсив шаблон). Подключать автоматически из настроек.
         */
        $enterDevice = DeviceDetector::getDevice();

        parent::setLayoutPath('@tmpl/' . $layout .'/' . $this->getSideInterface() . '/views/' . $enterDevice);
    }

    /**
     * Function loadConfig
     * Load configuration file
     * if this file is exist in root directory of the current component
     * @return bool
     */
    public function loadConfig() {
        $file = $this->getBasePath() . DIRECTORY_SEPARATOR . 'config.php';
        if (is_file($file)) {
            Bee::configure($this, require($file));
            unset($file);
            return true;
        }
        return false;
    }

    /**
     * Function getSideInterface
     * If specified in the address bar: DEV or ADMIN
     * Or, by default = frontend
     * @TODO move this to UrlManager and set this in special array param
     * @return string
     */
    public function getSideInterface()
    {
        $zone = explode('/', \Bee::$app->getRequest()->getPathInfo());
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