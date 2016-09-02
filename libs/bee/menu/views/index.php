<?php
 /**
 * index.php 
 *
 * @author BeeCMS team <s.seroed@gmail.com>
 * @link http://bee-cms.net
 * @copyright 2015 INTFOM
 * @package bee-cms.local
 * @since 0.1
 * Date: 02.09.2016
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel bee\menu\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('bee\messages', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

 <h1><?= Html::encode($this->title) ?></h1>
 <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 <p>
  <?= Html::a(Yii::t('bee\messages', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
 </p>
 <?php Pjax::begin(); ?>    <?= GridView::widget([
     'dataProvider' => $dataProvider,
     'filterModel' => $searchModel,
     'columns' => [
         ['class' => 'yii\grid\SerialColumn'],

         'menu_id',
         'zone_code',
         'extension_id',
         'menutype_id',
         'menutype_name',
      // 'menutype_params:ntext',
      // 'menutype_is_published',
      // 'menutype_is_removable',
      // 'parent_id',
      // 'title',
      // 'subtitle',
      // 'alias',
      // 'component_path',
      // 'query_params',
      // 'link:ntext',
      // 'image',
      // 'params:ntext',
      // 'zone_name',
      // 'component_name',
      // 'controller_name',
      // 'action_name',
      // 'ext_params:ntext',
      // 'ext_is_published',
      // 'component_is_published',
      // 'is_home',
      // 'is_menu_displayed',
      // 'is_published',
      // 'ordering',
      // 'lft',
      // 'rgt',

         ['class' => 'yii\grid\ActionColumn'],
     ],
 ]); ?>
 <?php Pjax::end(); ?></div>