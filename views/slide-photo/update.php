<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SlidePhoto */

//$this->title = 'Update Slide Photo: ' . $model->slide_photo_id;
$this->title = 'ปรับปรุง ภาพสไลด์';
$this->params['breadcrumbs'][] = ['label' => 'Slide Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slide_photo_id, 'url' => ['view', 'id' => $model->slide_photo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slide-photo-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
