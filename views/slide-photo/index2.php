<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'ภาพสไลด์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-photo-index">
  <h4><?= Html::encode($this->title) ?></h4>

  <div class="box box-danger">
   <div class="box-header with-border" style="padding-top:5px;">
    <div class="box-title">
      <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่ม ภาพสไลด์', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="box-tools pull-right">
    <?= Html::a('<i class="fa fa-eye"></i> ตัวอย่าง ภาพสไลด์', ['index'], ['class' => 'btn btn-info']) ?>   
    </div>
  </div>
  <div class="box-body">

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'tableOptions' =>['class' => 'table table-responsive'],
      'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      [
      'options'=>['style'=>'width:150px;'],
      'format'=>'raw',
      'attribute'=>'slide_photo_img',
      'value'=>function($model){
        return Html::tag('div','',[
          'style'=>'width:200px;height:180px;
          border-top: 10px solid rgba(255, 255, 255, .46);
          background-image:url('.$model->photoViewer.');
          background-size: cover;
          background-position:center center;
          background-repeat:no-repeat;
          ']);
      }
      ],
      'slide_photo_order',

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
      ]);

      ?>
    </div>
  </div>
</div>
