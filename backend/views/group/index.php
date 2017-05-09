<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'groupName',
//            'status',
            [
                'attribute' => 'status',
                'content' => function($model){
                    if($model->status==0){
                        return '<span class="label label-danger">Không kích hoạt</span>';
                    }
                    else{
                        return '<span class="label label-success">Kích hoạt</span>';
                    }
                },
                'headerOptions'=>[
                    'style'=>'width:150px;text-align:center'
                ],
                'contentOptions'=>[
                    'style'=>'width:150px;text-align:center'
                ],
            ],
//            'created_at',
            [
                'attribute'=>'created_at',
                'content' =>function($model){
                    return date('d-m-Y',$model->created_at);
                }
            ],
//            'updated_at',
            [
                'attribute'=>'updated_at',
                'content' =>function($model){
                    return date('d-m-Y',$model->created_at);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
