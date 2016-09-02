<?php
 /**
 * create.php 
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms.local
 * @since 0.1
 * Date: 02.09.2016
 */
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model bee\menu\models\Menu */

$this->title = Yii::t('bee\messages', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('bee\messages', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

 <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form', [
     'model' => $model,
 ]) ?>

</div>