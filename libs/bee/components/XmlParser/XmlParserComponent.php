<?php
/**
 * XmlParser.php
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms.local
 * @since 0.1
 * Date: 23.08.2016
 */

namespace bee\components\XmlParser;

use yii\base\Component;
use yii\web\BadRequestHttpException;
use yii\web\RequestParserInterface;

/**
 * The request parser for xml.
 *
 * @author lichunqiang <light-li@hotmail.com>
 * @license MIT
 *
 * @version 0.2.11
 */
class XmlParserComponent extends Component implements RequestParserInterface
{
    /**
     * If parser result as array, this is default,
     * if you want to get object, set it to false.
     *
     * @var bool
     */
    public $asArray = true;
    /**
     * Whether throw the [[BadRequestHttpException]] if the process error.
     *
     * @var bool
     */
    public $throwException = true;

    /**
     * {@inheritdoc}
     */
    public function parse($rawBody, $contentType)
    {
        libxml_use_internal_errors(true);
        $result = simplexml_load_string($rawBody, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($result === false) {
            $errors = libxml_get_errors();
            $latestError = array_pop($errors);
            $error = [
                'message' => $latestError->message,
                'type' => $latestError->level,
                'code' => $latestError->code,
                'file' => $latestError->file,
                'line' => $latestError->line,
            ];
            if ($this->throwException) {
                throw new BadRequestHttpException($latestError->message);
            }
            return $error;
        }
        if (!$this->asArray) {
            return $result;
        }
        return json_decode(json_encode($result), true);
    }
}