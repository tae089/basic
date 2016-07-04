<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

//$this->title = $model->news_id;
$this->title = 'รายการ';
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

<h4><?= Html::encode($this->title) ?></h4>
    <div class="box box-danger">
    <!-- <div class="box-header with-border">
      <h3 class="box-title">Different Height</h3>
  </div> -->
  <div class="box-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->news_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->news_id], [
            'class' => 'btn btn-danger',
            'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
            ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                    'news_id',
                    'news_title',
                    //'news_detail:ntext',
                [
                    'format'=>'html',
                    'label' => 'รายละเอียด',
                    'value' => $model->news_detail,
                ],
                    'news_date',
                'news_photo',
                [
                    'attribute'=>'news_photo',
                    'value'=>'uploads/'.$model->news_photo,
                    'format' => ['image',['width'=>'400','height'=>'400']],
                ],

            ],
            ]) ?>

        </div>
    </div>
</div>
