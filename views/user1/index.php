<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\User1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User1s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' =>['class' => 'table table-responsive'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            // 'confirmed_at',
            // 'unconfirmed_email:email',
            // 'blocked_at',
            // 'registration_ip',
            // 'created_at',
            // 'updated_at',
            // 'flags',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'จัดการ',
               // 'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div>{view}&nbsp;{update}&nbsp;{delete} </div>',
                'options'=> ['style'=>'width:150px;'],
                'buttons'=>[
                  'view' => function($url,$model,$key){
                      return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',$url,['class'=>'btn btn-default']);
                    },
                    'update' => function($url,$model,$key){
                      return Html::a('<i class="glyphicon glyphicon-pencil"></i>',$url,['class'=>'btn btn-info']);
                    },

                    'delete' => function($url,$model,$key){
                      return Html::a('<i class="glyphicon glyphicon-trash"></i>',$url,['class'=>'btn btn-danger']);
                    },
                  ]
              ],
        ],
    ]); ?>
</div>
