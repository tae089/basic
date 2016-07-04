<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AlbumPhoto */

$this->title = 'เพิ่ม อัลบั้มภาพ';
$this->params['breadcrumbs'][] = ['label' => 'Album Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-photo-create">

    <h4><?= Html::encode($this->title) ?></h4>

   <?= $this->render('_form', [
        'model' => $model,
        'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>
