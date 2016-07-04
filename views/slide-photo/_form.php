<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SlidePhoto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-photo-form">
  <div class="box box-danger">
    <!-- <div class="box-header with-border">
      <h3 class="box-title">Different Height</h3>
    </div> -->
    <div class="box-body">

      <?php $form = ActiveForm::begin(); ?>

      <?//= $form->field($model, 'slide_photo_img')->textInput(['maxlength' => true]) ?>
      <div class="row">
        <div class="col-md-2">
          <div class="well text-center">
            <?= Html::img($model->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
          </div>
        </div>
        <div class="col-md-10">
          <?= $form->field($model, 'slide_photo_img')->fileInput() ?>
        </div>
      </div>

      <?= $form->field($model, 'slide_photo_order')->textInput() ?>

      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>

      <?php ActiveForm::end(); ?>

    </div>
  </div>
</div>