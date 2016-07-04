<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diagrams */

$this->title = 'ปรับปรุง แผนผัง' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Diagrams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->diagrams_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diagrams-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
