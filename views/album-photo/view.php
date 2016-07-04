<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumPhoto */

$this->title = 'อัลบั้มภาพ: '.$model->album_photo_name;
$this->params['breadcrumbs'][] = ['label' => 'Album Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-photo-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <div class="panel panel-default">
      <div class="panel-body">
       <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref,$model->album_photo_name)]);?>
   </div>
</div>


</div>
