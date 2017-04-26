<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>

            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'username')->textInput(['class'=>'form-control','placeholder'=>'Username'])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control','placeholder'=>'Password'])->label(false) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div>

                    <input type="submit" value="Log in" class="btn btn-default submit">
                </div>


<!--    <div>-->
<!--    <input type="text" class="form-control" placeholder="Username" required="" />-->
<!--</div>-->
<!--<div>-->
<!--    <input type="password" class="form-control" placeholder="Password" required="" />-->
<!--</div>-->
<!--<div>-->
<!--    <a class="btn btn-default submit" href="index.html">Log in</a>-->
<!--    <a class="reset_pass" href="#">Lost your password?</a>-->
<!--</div>-->


    <?php ActiveForm::end(); ?>

