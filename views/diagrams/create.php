<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Diagrams */

$this->title = 'Create Diagrams';
$this->params['breadcrumbs'][] = ['label' => 'Diagrams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagrams-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
