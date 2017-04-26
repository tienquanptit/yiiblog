<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 4/24/2017
 * Time: 9:14 AM
 */?>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login">
<?php $this->beginBody() ?>

<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <form>
            <h1>Login Form</h1>
            </form>
            <?= Alert::widget() ?>
            <?= $content ?>



        </section>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

