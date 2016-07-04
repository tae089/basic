<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kongoon\orgchart\OrgChart;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\Diagrams;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DiagramsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แผนผัง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagrams-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">
                <p>
                    <?//= Html::a('Create Diagrams', ['create'], ['class' => 'btn btn-success']) ?>
                    <?//= Html::button('<i class="fa fa-plus-circle"></i> Create Diagrams1', ['value'=>Url::to('index.php?r=diagrams/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
                    <?= Html::button('<i class="fa fa-plus-circle"></i> บันทึก แผนผัง', ['value'=>Url::to('index.php?r=diagrams/create1'),'class' => 'btn btn-success','id'=>'modalButton1']) ?>
                </p>
            </h3>
        </div>
        <div class="box-body">
            <?php
            Modal::begin([
                'header'=>'<h4>test1</h4>',
                'id' =>'modal',
                'size'=>'modal-lg',

                ]);

            echo "<div id='modalContent'></div>";

            Modal::end();

            Modal::begin([
                'header'=>'<h4>บันทึก แผนผัง</h4>',
                'id' =>'modal1',
                'size'=>'modal-lg',

                ]);

            echo "<div id='modalContent1'></div>";

            Modal::end();

            ?>

            <?php

            $data = Diagrams::find()->all();
            $resultArray = array();
            foreach ($data as  $value) {
                $name = $value['name'];
                $img = Url::to('@web/uploads_1/').$value['photo']; 
                $position = $value['position'];  
                $diagrams_id = $value['diagrams_id'];
                $id_ref = $value['id_ref'];                                 
                $obResult= [['v' => ''.$diagrams_id.'','f' => '<img src="'.$img.'" width="120" height="150" /><br /> <strong>'.$name.'</strong><br/>'.$position."<br>".Html::a('แก้ไข', ['diagrams/update','id'=>$diagrams_id ])."/".Html::a('ลบ', ['diagrams/delete','id'=>$diagrams_id ], ['data'=>['method' => 'post','confirm' => 'Are you sure?',]])],$id_ref, $name];
                array_push($resultArray,$obResult);
            }
            echo OrgChart::widget([ 'data' => 
                $resultArray
            ]);

            ?>



    <?//= GridView::widget([
        // 'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        // 'columns' => [
        //     ['class' => 'yii\grid\SerialColumn'],

        //     'diagrams_id',
        //     'name',
        //     'photo',
        //     'id_ref',

        //     ['class' => 'yii\grid\ActionColumn'],
        //],
    //]); ?>

</div>
</div>
</div>
