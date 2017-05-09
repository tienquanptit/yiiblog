<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
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

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'image')->hiddenInput(['id'=>'image']) ?>
            <img src="<?php echo $model->image;?>" id="show-img">
            <a href="#" id="select-img" title="Chọn hình ảnh" class="btn btn-info btn-sm">Chọn ảnh</a>
            <a href="#" id="remove-img" title="Xóa hình ảnh" class="btn btn-danger btn-sm">Xóa ảnh</a>
        </div>
        <div class="col-md-9">

        </div>
    </div>

<!--    --><?//= $form->field($model, 'description')->textarea(['id' => 'desc']) ?>
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic',
        'clientOptions' => ElFinder::ckeditorOptions(['elfinder']),
    ]) ?>

<!--    --><?//= $form->field($model, 'content')->textarea(['id' => 'content']) ?>
    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => ElFinder::ckeditorOptions(['elfinder']),
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

<?php
echo $form->field($model, 'tag')->widget(Select2::classname(), [
    'data' => $alltag,
    'options' => ['placeholder' => 'Select a Tags...', 'multiple' => true],
    'pluginOptions' => [
        'tags' => true,
        'tokenSeparators' => [',', ' '],
        'maximumInputLength' => 10
    ],
])->label('Tag Multiple');
?>
<!--    --><?php //echo $form->field($model,'tags')->textInput(array('size'=>50)); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
