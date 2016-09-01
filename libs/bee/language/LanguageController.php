<?php

namespace bee\language;

use Bee;
use yii\helpers\ArrayHelper;
use yii\base\InvalidCallException;

/**
 * Class LanguageController
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\language
 * @since 0.1
 */
class LanguageController extends \yii\base\Object
{

    //Переменная, для хранения текущего объекта языка
    static $_current = NULL;

    /**
     * @param int $published
     */
    public function __construct ($published = 1) {
        $this->findAllLanguages();
    }

    /*
     * Поиск всех языков опубликованных в системе
     * @todo или загрузка языковых версий из кеша
     *       если они есть в кеше
     *       или если дата обновления записи больше чем в кеше
     *
     * @return $this object
     */
    public function findAllLanguages ($published = 1) {
        if (Bee::$app->getLanguageAll() === null) {
            $languages = LanguageModel::find()
                ->andWhere('`is_published` = :is_published', [':is_published' => $published])
                ->asArray()
                ->all();

            if (empty($languages)) {
                throw new InvalidCallException(Bee::t('bee', 'language', 'EXCEPTION_LANGUAGES_IS_EMPTY'));
            }

            $this->setLanguages ($languages);
            $this->setDefault ();
            $this->setCurrent ();
            unset($published);
            unset($languages);
        }
    }

    /*
     * Список всех языков опубликованных в системе
     *
     * self::$_allLanguages Структурный вывод языков типа:
     * stdClass Object (
     *      [ru] => Array (
     *           [language_id] => 1
     *           [is_published] => 1
     *           [ordering] => 0
     *           [is_default] => 1
     *           [language_code] => ru
     *           [language_local] => ru-RU
     *           [name] => Russian
     *           [title] => Русский
     *           [flag] =>
     *           [date_create] => 0000-00-00 00:00:00
     *           [date_update] => 0000-00-00 00:00:00
     *      ),
     *      [en] => Array (
     *          ...
     *      ),
     *      [ua] => Array (
     *          ...
     *      ),
     *      ...
     * )
     */
    public function setLanguages ($languages) {
        if ($languages !== NULL) {
            Bee::$app->setLanguageAll(ArrayHelper::index($languages, 'language_code'));
            unset($languages);
            return true;
        }

        return false;
    }

    /**
     * Function getLanguages
     * @return array
     */
    public function getLanguages() {
        return Bee::$app->getLanguageAll();
    }

    /**
     * Function getLanguages
     * @return array
     */
    public function getLanguage($key) {
        return Bee::$app->getLanguageAll()[$key];
    }

    public function getLanguageLocal ($key) {
        return $this->getLanguage($key)['language_local'];
    }

    /*
     * Set the default language
     * @return object
     */
    public function setDefault () {
        $languages = $this->getLanguages();

        if ($languages !== NULL) {
            foreach ($languages as $key => $language) {
                if ((int)$language['is_default'] === 1) {
                    Bee::$app->setSourceLanguageKey((string)$key);

                    /* Задание языка по умолчанию */
                    Bee::$app->sourceLanguage = $language['language_local'];
                    unset($language);
                    unset($languages);
                    return true;
                }
            }
        }
        // если нет ни одного языка, то используем предустановленный в конфигах
        return NULL;
    }

    /*
     * Get the default language
    */
    public function getDefaultLanguage () {
        return Bee::$app->sourceLanguage;
    }

    public function getLocaleKey($local = null) {
        if($local === NULL) {
            return $local = Bee::$app->getSourceLanguageKey();
        } elseif($this->getLanguages()) {
            return $this->getLanguage($local)['language_code'];
        } else {
            return false;
        }
    }

    /*
     * Установка текущего объекта языка и локаль пользователя
     * Устанавливаем язык указанный по умолчанию в БД,
     * либо из УРЛ, если указан (имеет больший приоритет).
     *
     * @return array
     * stdClass Object (
     *     [title] => Русский,
     *     [code] => ru,
     *     [local] => ru-RU
     * )
     */
    public function setCurrent () {
        if (Bee::$app->urlManager->enablePrettyUrl) {
            $request = Bee::$app->request;
            $pathInfo = $request->getPathInfo();
            $language = explode('/', $pathInfo)[0];
            $locale = array_key_exists($language, $this->getLanguages()) ? $language : null;

            if ($locale !== null) {
                Bee::$app->setLanguageKey((string)$locale);
                $request->setPathInfo(substr_replace($pathInfo, '', 0, (strlen($language) + 1)));

                Bee::$app->language = $this->getLanguageLocal($language);
            } else {
                Bee::$app->setLanguageKey((string)$this->getLocaleKey());
                Bee::$app->language = $this->getDefaultLanguage();
            }

            unset($request);
            unset($pathInfo);
            unset($language);
            unset($locale);
        } else {
            $request = Bee::$app->request;
            $params = $request->getQueryParams();
            $route = isset($params['r']) ? $params['r'] : '';
            $language = explode('/', $route)[0];
            $locale = array_key_exists($language, $this->getLanguages()) ? $language : null;

            if ($locale !== NULL) {
                $request->setQueryParams(['r' => substr_replace($route, '', 0, (strlen($language) + 1))]);
                Bee::$app->setLanguageKey((string)$locale);
                Bee::$app->language = $this->getLanguageLocal($language);
            } else {
                Bee::$app->setLanguageKey((string)$this->getLocaleKey());
                Bee::$app->language = $this->getDefaultLanguage();
            }

            unset($request);
            unset($params);
            unset($route);
            unset($language);
            unset($locale);
        }
    }
}
