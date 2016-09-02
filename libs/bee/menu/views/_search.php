<?php
 /**
 * _search.php 
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms.local
 * @since 0.1
 * Date: 02.09.2016
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model bee\menu\models\MenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-search">

 <?php $form = ActiveForm::begin([
     'action' => ['index'],
     'method' => 'get',
 ]); ?>

 <?= $form->field($model, 'menu_id') ?>

 <?= $form->field($model, 'zone_code') ?>

 <?= $form->field($model, 'extension_id') ?>

 <?= $form->field($model, 'menutype_id') ?>

 <?= $form->field($model, 'menutype_name') ?>

 <?php // echo $form->field($model, 'menutype_params') ?>

 <?php // echo $form->field($model, 'menutype_is_published') ?>

 <?php // echo $form->field($model, 'menutype_is_removable') ?>

 <?php // echo $form->field($model, 'parent_id') ?>

 <?php // echo $form->field($model, 'title') ?>

 <?php // echo $form->field($model, 'subtitle') ?>

 <?php // echo $form->field($model, 'alias') ?>

 <?php // echo $form->field($model, 'component_path') ?>

 <?php // echo $form->field($model, 'query_params') ?>

 <?php // echo $form->field($model, 'link') ?>

 <?php // echo $form->field($model, 'image') ?>

 <?php // echo $form->field($model, 'params') ?>

 <?php // echo $form->field($model, 'zone_name') ?>

 <?php // echo $form->field($model, 'component_name') ?>

 <?php // echo $form->field($model, 'controller_name') ?>

 <?php // echo $form->field($model, 'action_name') ?>

 <?php // echo $form->field($model, 'ext_params') ?>

 <?php // echo $form->field($model, 'ext_is_published') ?>

 <?php // echo $form->field($model, 'component_is_published') ?>

 <?php // echo $form->field($model, 'is_home') ?>

 <?php // echo $form->field($model, 'is_menu_displayed') ?>

 <?php // echo $form->field($model, 'is_published') ?>

 <?php // echo $form->field($model, 'ordering') ?>

 <?php // echo $form->field($model, 'lft') ?>

 <?php // echo $form->field($model, 'rgt') ?>

 <div class="form-group">
  <?= Html::submitButton(Yii::t('bee\messages', 'Search'), ['class' => 'btn btn-primary']) ?>
  <?= Html::resetButton(Yii::t('bee\messages', 'Reset'), ['class' => 'btn btn-default']) ?>
 </div>

 <?php ActiveForm::end(); ?>

</div>