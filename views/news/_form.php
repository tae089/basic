<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">
    <div class="box box-danger">
    <!-- <div class="box-header with-border">
      <h3 class="box-title">Different Height</h3>
  </div> -->
  <div class="box-body">

    <?php 
    $form = ActiveForm::begin([
      'options' => ['enctype' => 'multipart/form-data']
      ]);
      ?>

      <?= $form->field($model, 'news_title')->textInput(['maxlength' => true]) ?>

      <?//= $form->field($model, 'news_detail')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'news_detail')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'advanced'
        ]) ?>

        <?//= $form->field($model, 'news_date')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'news_date')->widget(
            DatePicker::className(), [
            'model' => $model,
            'attribute' => 'news_date',
	          //'template' => '{addon}{input}',
            'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-dd-mm'
            ]
        ]);?>



            <?= $form->field($model, 'user_add')->textInput(['maxlength' => true]) ?>

            <div class="row">
              <div class="col-md-2">
                <div class="well text-center">
                  <?= Html::img($model->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
              </div>
          </div>
          <div class="col-md-10">
            <?= $form->field($model, 'news_photo')->fileInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
<!-- /.box-body -->
</div>