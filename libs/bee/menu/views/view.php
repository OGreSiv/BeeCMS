<?php
 /**
 * view.php 
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms.local
 * @since 0.1
 * Date: 02.09.2016
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model bee\menu\models\Menu */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('bee\messages', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">

 <h1><?= Html::encode($this->title) ?></h1>

 <p>
  <?= Html::a(Yii::t('bee\messages', 'Update'), ['update', 'id' => $model->m], ['class' => 'btn btn-primary']) ?>
  <?= Html::a(Yii::t('bee\messages', 'Delete'), ['delete', 'id' => $model->m], [
      'class' => 'btn btn-danger',
      'data' => [
          'confirm' => Yii::t('bee\messages', 'Are you sure you want to delete this item?'),
          'method' => 'post',
      ],
  ]) ?>
 </p>

 <?= DetailView::widget([
     'model' => $model,
     'attributes' => [
         'menu_id',
         'zone_code',
         'extension_id',
         'menutype_id',
         'menutype_name',
         'menutype_params:ntext',
         'menutype_is_published',
         'menutype_is_removable',
         'parent_id',
         'title',
         'subtitle',
         'alias',
         'component_path',
         'query_params',
         'link:ntext',
         'image',
         'params:ntext',
         'zone_name',
         'component_name',
         'controller_name',
         'action_name',
         'ext_params:ntext',
         'ext_is_published',
         'component_is_published',
         'is_home',
         'is_menu_displayed',
         'is_published',
         'ordering',
         'lft',
         'rgt',
     ],
 ]) ?>

</div>