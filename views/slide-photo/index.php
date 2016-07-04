<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SlidePhoto;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SlidePhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ภาพสไลด์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-photo-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-danger">
     <div class="box-header with-border" style="padding-top:5px;">
      <div class="box-title">
        <?= Html::a('<i class="fa fa-plus-circle"></i> เพิ่ม ภาพสไลด์', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="box-tools pull-right">
        <?= Html::a('<i class="fa fa-gear"></i> จัดการ ภาพสไลด์', ['index2'], ['class' => 'btn btn-info']) ?>   
    </div>
</div>
<div class="box-body">
    <?php
    $data = SlidePhoto::find()->orderBy(['slide_photo_order' => SORT_ASC])->all();
    $resultArray = array();
    foreach ($data as  $value) {

        $img = Url::to('@web/uploads_slidephoto/').$value['slide_photo_img'];                                 
        $obResult= [
        'url' => $img,
        'src' => $img,
        'options' => array('title' => 'photo')
        ];
        array_push($resultArray,$obResult);
    }
    ?>


    <?= dosamigos\gallery\Carousel::widget([
        'items' => $resultArray,
        'clientEvents' => [
        'onslide' => 'function(index, slide) {
            console.log(slide);
        }'
        ]]);
        ?>

    </div>
</div>
</div>
