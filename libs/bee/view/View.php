<?php

namespace bee\view;

/**
 * Class View
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee\view
 * @since 0.1
 */
class View extends \yii\web\View
{
    /**
     * Function findViewFile
     * @param string $view
     * @param null $context
     * @return string
     */
    protected function findViewFile($view, $context = null) {
        return parent::findViewFile($view, $context);

    //    if(strncmp($context->module->controllerNamespace, "app", 3) === 0) {
    //        if (is_object($currentViewFile = Bee::$app->getModule($context->module->id)) &&
    //            $currentViewFile->getViewPath() !== false) {
    //            $file = $currentViewFile->getViewPath() . DIRECTORY_SEPARATOR . ltrim($view, '/');
    //        } elseif ($context instanceof ViewContextInterface) {
    //            $file = strstr($context->getViewPath(), "/", true) . DIRECTORY_SEPARATOR . '/..' . DIRECTORY_SEPARATOR . $view;
    //        }
    //
    //        if (pathinfo($file, PATHINFO_EXTENSION) !== '') {
    //            return $file;
    //        }
    //
    //        $path = $file . '.' . $this->defaultExtension;
    //        if ($this->defaultExtension !== 'php' && !is_file($path)) {
    //            $path = $file . '.php';
    //        }
    //
    //        return $path;
    //    } else {
    //        return parent::findViewFile($view, $context);
    //    }
    }
}
