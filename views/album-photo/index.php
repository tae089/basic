<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Uploads;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumPhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'อัลบั้มภาพ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-photo-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">
              <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่ม อัลบั้มภาพ', ['create'], ['class' => 'btn btn-success']) ?>
          </h3>
      </div>
      <div class="box-body">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' =>['class' => 'table table-responsive'],
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'album_photo_id',
            'album_photo_name',
            'album_photo_detail:ntext',
            //'ref',
            [
              'header'=>'จำนวน (รูปภาพ)',
              'value' => 
                      function($model){
                         return Uploads::find()->where(['ref'=>$model->ref])->count();
                      }
            ],
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