<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use bee\icon\Icon;

Icon::map($this);
$this->title = $name;
$this->params['icon'] = 'attention';

?>
<div class="error-wrap">
    <div class="error">
        <span><?= nl2br(Html::encode($message)) ?></span>
    </div>
    <div class="error">
        <span><?= nl2br(Html::encode($message)) ?></span>
    </div>
    <div class="error">
        <span><?= nl2br(Html::encode($message)) ?></span>
    </div>
    <p>
        <a href="<?= Bee::$app->homeUrl ?>"><?= Icon::show('home'); ?></a>
    </p>
</div>
