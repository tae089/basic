<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Diagrams;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Diagrams */
/* @var $form yii\widgets\ActiveForm */

//$id_ref = $_GET['id'];
$data = Diagrams::find()->all();
$arr1 = ArrayHelper::map($data,'diagrams_id','name'); 
?>

<div class="diagrams-form">
  <div class="box box-danger">
    <div class="box-body">
      <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'id_ref')->dropDownList($arr1, ['prompt'=>' เลือก ']); ?>

      <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

      <?//= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>
      <div class="row">
        <div class="col-md-2">
          <div class="well text-center">
            <?= Html::img($model->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
          </div>
        </div>
        <div class="col-md-10">
          <?= $form->field($model, 'photo')->fileInput() ?>
        </div>
      </div>

      <?//= $form->field($model, 'id_ref')->textInput(['value'=>'']) ?>

      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>

      <?php ActiveForm::end(); ?>

    </div>
  </div>
</div>
