<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\FrontAsset;
use common\widgets\Alert;

use frontend\widgets\topNavWidget;
use frontend\widgets\footerWidget;
use frontend\widgets\slideBarWidget;
FrontAsset::register($this);

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
<body>
<?php $this->beginBody() ?>

<!-- Tao widget Nav -->
<?= topNavWidget::widget() ?>

<!-- Main Content -->
<div class="container">
<!--    goi den ham index.php-->
    <?= $content ?>

<!-- Footer -->
<?= footerWidget::widget() ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

