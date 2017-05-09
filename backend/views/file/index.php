<?php
/* @var $this yii\web\View */
$this->title = "Quản lý hình ảnh";

$baseUrl = str_replace('','http://local.admin.testfile.com',Yii::$app->urlManager->baseUrl);
//$baseUrl = Yii::$app->urlManager->baseUrl;
//echo 'daajsd->'.$baseUrl.'->gi do';

?>
<div class="file-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $this->title; ?></h3>
        </div>
        <div class="panel-body">
<!--            <iframe src="--><?php //echo Yii::$app->params ?><!--/file/dialog.php" style="width:100%; height: 500px; border: none"></iframe>-->
            <iframe src="http://local.admin.testfile.com/file/dialog.php" style="width:100%; height: 500px; border: none"></iframe>
        </div>
    </div>
</div>
