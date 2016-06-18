<?php

namespace app\libs\bee\classes;

use Yii;

/**
 * Class View
 *
 * @author    BeeCMS team <s.seroed@gmail.com>
 * @link      http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package   app\libs\bee\classes
 * @since     0.1
 */
class View extends \yii\web\View
{
    /**
     * Finds the view file based on the given view name.
     * @param string $view the view name or the path alias of the view file. Please refer to [[render()]]
     * on how to specify this parameter.
     * @param object $context the context to be assigned to the view and can later be accessed via [[context]]
     * in the view. If the context implements [[ViewContextInterface]], it may also be used to locate
     * the view file corresponding to a relative view name.
     * @return string the view file path. Note that the file may not exist.
     * @throws InvalidCallException if a relative view name is given while there is no active context to
     * determine the corresponding view file.
     */
    protected function findViewFile($view, $context = null) {
        if(strncmp($context->module->controllerNamespace, "app", 3) === 0) {
            if (($currentViewFile = Yii::$app->getModule($context->module->id)->getViewPath()) !== false) {
                $file = $currentViewFile . DIRECTORY_SEPARATOR . ltrim($view, '/');
            }

            if (pathinfo($file, PATHINFO_EXTENSION) !== '') {
                return $file;
            }

            $path = $file . '.' . $this->defaultExtension;
            if (is_file($path)) {
                return $path;
            }
        } else {
            return parent::findViewFile($view, $context);
        }
    }
}
