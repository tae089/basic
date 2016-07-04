<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SlidePhoto */

//$this->title = $model->slide_photo_id;
$this->title = 'รายการ';
$this->params['breadcrumbs'][] = ['label' => 'Slide Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-photo-view">

    <h4><?= Html::encode($this->title) ?></h4>
    <div class="box box-danger">
    <!-- <div class="box-header with-border">
      <h3 class="box-title">Different Height</h3>
  </div> -->
  <div class="box-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->slide_photo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->slide_photo_id], [
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
            'slide_photo_id',
            //'slide_photo_img',
            [
                    'attribute'=>'slide_photo_img',
                    'value'=>'uploads_slidephoto/'.$model->slide_photo_img,
                    'format' => ['image',['width'=>'400','height'=>'400']],
             ],
            'slide_photo_order',
            ],
            ]) ?>

        </div>
    </div>
