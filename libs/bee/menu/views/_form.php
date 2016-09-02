<?php
 /**
 * _form.php
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
/* @var $model bee\menu\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

 <?php $form = ActiveForm::begin(); ?>

 <?= $form->field($model, 'menu_id')->textInput() ?>

 <?= $form->field($model, 'zone_code')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'extension_id')->textInput() ?>

 <?= $form->field($model, 'menutype_id')->textInput() ?>

 <?= $form->field($model, 'menutype_name')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'menutype_params')->textarea(['rows' => 6]) ?>

 <?= $form->field($model, 'menutype_is_published')->textInput() ?>

 <?= $form->field($model, 'menutype_is_removable')->textInput() ?>

 <?= $form->field($model, 'parent_id')->textInput() ?>

 <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'component_path')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'query_params')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'link')->textarea(['rows' => 6]) ?>

 <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'params')->textarea(['rows' => 6]) ?>

 <?= $form->field($model, 'zone_name')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'component_name')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'controller_name')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'action_name')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'ext_params')->textarea(['rows' => 6]) ?>

 <?= $form->field($model, 'ext_is_published')->textInput() ?>

 <?= $form->field($model, 'component_is_published')->textInput() ?>

 <?= $form->field($model, 'is_home')->textInput() ?>

 <?= $form->field($model, 'is_menu_displayed')->textInput() ?>

 <?= $form->field($model, 'is_published')->textInput() ?>

 <?= $form->field($model, 'ordering')->textInput() ?>

 <?= $form->field($model, 'lft')->textInput() ?>

 <?= $form->field($model, 'rgt')->textInput() ?>

 <div class="form-group">
  <?= Html::submitButton($model->isNewRecord ? Yii::t('bee\messages', 'Create') : Yii::t('bee\messages', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
 </div>

 <?php ActiveForm::end(); ?>

</div>