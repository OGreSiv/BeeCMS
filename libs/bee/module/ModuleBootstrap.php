<?php
/**
 * ModuleBootstrap.php
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms.local
 * @since 0.1
 * Date: 30.08.2016
 */
namespace bee\module;

use Bee;
use yii\base\BootstrapInterface;
use yii\base\UnknownPropertyException;

class ModuleBootstrap implements BootstrapInterface
{
    /**
     * @var string
     */
    public $moduleName;

    /**
     * @var array or string
     */
    public $translationFiles = [
        'translate',
    ];

    public function bootstrap($app){
        $this->loadTranslations();
    }

    public function loadTranslations () {
        $fileMap = [];
        if($this->moduleName === null){
            throw new UnknownPropertyException('Setting unknown property: ' . get_class($this) . '::' . $this->moduleName);
        }

        if(is_array($this->translationFiles)){
            foreach($this->translationFiles as $translationFile) {
                $fileMap['components/' . $this->moduleName . '/language/' . $translationFile] = $translationFile . '.php';
            }
        } elseif(is_string($this->translationFiles)) {
            $fileMap['components/' . $this->moduleName . '/language/' . $this->translationFiles] = $this->translationFiles . '.php';
        }

        Bee::$app->i18n->translations['components/' . $this->moduleName . '/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@components/' . $this->moduleName . '/language',
            'forceTranslation' => true,
            'fileMap' => $fileMap,
            'on missingTranslation' => ['bee\language\TranslationEventHandler', 'handleMissingTranslation'],
        ];
    }
}