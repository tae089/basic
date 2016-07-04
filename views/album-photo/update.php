<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumPhoto */

//$this->title = 'Update Album Photo: ' . $model->album_photo_id;
$this->title = 'ปรับปรุง อัลบั้มภาพ';
$this->params['breadcrumbs'][] = ['label' => 'Album Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->album_photo_id, 'url' => ['view', 'id' => $model->album_photo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="album-photo-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'initialPreview'=>$initialPreview,
        'initialPreviewConfig'=>$initialPreviewConfig
    ]) ?>

</div>
