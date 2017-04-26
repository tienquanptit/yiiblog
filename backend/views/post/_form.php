<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'postName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groups_id')->dropDownList($dataGroup,['prompt'=>'-Chọn danh mục-']) ?>

    <?= $form->field($model, 'cate_id')->dropDownList($dataCat,['prompt'=>'-Chọn danh mục-']) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['id' => 'desc']) ?>

    <?= $form->field($model, 'content')->textarea(['id' => 'content']) ?>

    <?= $form->field($model, 'status')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
