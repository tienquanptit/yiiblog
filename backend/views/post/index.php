<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $content = strip_tags(html_entity_decode('postName'));
        echo $content;
        $lim = 300;
        if (mb_strlen($content, 'UTF-8') > $lim) {
            $content = mb_substr($content, 0, $lim - 3, 'utf-8') . '...';
        }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'postName',
//            'slug',
//            'image',
//            'description:html',
            // 'content:ntext',
            // 'groups_id',
            // 'cate_id',
//             'status',
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
            // 'created_at',
//             'updated_at',
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