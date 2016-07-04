<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\News */

//$this->title = 'Update News: ' . $model->news_id;
$this->title = 'ปรับปรุง ข่าวสาร กิจกรรม';
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->news_id, 'url' => ['view', 'id' => $model->news_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
