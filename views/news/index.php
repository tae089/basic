<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\AlbumPhoto;
use yii\helpers\Url;
//use dosamigos\ckeditor\CKEditorInline;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข่าวสาร และ กิจกรรม';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-index">

  <h4><?= Html::encode($this->title) ?></h4>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <div class="box box-danger">
   <div class="box-header with-border">
      <h3 class="box-title">
      <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่ม ข่าวสาร กิจกรรม', ['create'], ['class' => 'btn btn-success']) ?>
        
      </h3>
    </div>
    <div class="box-body">
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' =>['class' => 'table table-responsive'],
        'summary'=>'',
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
        'options'=>['style'=>'width:150px;'],
        'format'=>'raw',
        'attribute'=>'news_photo',
        'value'=>function($model){
          return Html::tag('div','',[
            'style'=>'width:150px;height:95px;
            border-top: 10px solid rgba(255, 255, 255, .46);
            background-image:url('.$model->photoViewer.');
            background-size: cover;
            background-position:center center;
            background-repeat:no-repeat;
            ']);
        }
        ],
        'news_title',
            //'news_detail:ntext',
        [
        'format'=>'html',
        'attribute'=>'news_detail',
        'value' =>  function($model){
         return  $model->news_detail;
       }
       ],
       'news_date',
       'user_add',
            //'news_photo',

            //['class' => 'yii\grid\ActionColumn'],
       [
       'class' => 'yii\grid\ActionColumn',
       'header'=>'จัดการ',
        'buttonOptions'=>['class'=>'btn btn-danger'],
       'template'=>'<div>{view}&nbsp;{update}&nbsp;{delete} </div>',
       'options'=> ['style'=>'width:150px;'],
       'buttons'=>[
       'view' => function($url,$model,$key){
        return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',$url,['class'=>'btn btn-default']);
      },
      'update' => function($url,$model,$key){
        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',$url,['class'=>'btn btn-info']);
      },

      ]
      ],
      ],
      ]); ?>
    </div>
  </div>
</div>