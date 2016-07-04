<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SlidePhoto */

$this->title = 'เพิ่ม ภาพสไลด์';
$this->params['breadcrumbs'][] = ['label' => 'Slide Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-photo-create">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
