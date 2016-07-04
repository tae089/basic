<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumPhoto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-photo-form">
    <div class="box box-danger">
      <div class="box-body">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'album_photo_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'album_photo_detail')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 200])->label(false); ?>

        <div class="form-group field-upload_files">
          <label class="control-label" for="upload_files[]"> ภาพถ่าย </label>
          <div>
            <?= FileInput::widget([
               'name' => 'upload_ajax[]',
                   'options' => ['multiple' => true,'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                   'pluginOptions' => [
                   'overwriteInitial'=>false,
                   'initialPreviewShowDelete'=>true,
                   'initialPreview'=> $initialPreview,
                   'initialPreviewConfig'=> $initialPreviewConfig,
                   'uploadUrl' => Url::to(['/album-photo/upload-ajax']),
                   'uploadExtraData' => [
                   'ref' => $model->ref,
                   ],
                   'maxFileCount' => 100
                   ]
                   ]);
                   ?>
               </div>
           </div>

           <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
</div>