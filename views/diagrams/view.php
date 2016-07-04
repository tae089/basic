<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diagrams */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Diagrams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagrams-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->diagrams_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->diagrams_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'diagrams_id',
            'name',
            'photo',
            'id_ref',
        ],
    ]) ?>

</div>
