<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User1 */

$this->title = 'Create User1';
$this->params['breadcrumbs'][] = ['label' => 'User1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
