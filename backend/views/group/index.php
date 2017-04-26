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
            'status',
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
