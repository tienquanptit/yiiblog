<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 4/13/2017
 * Time: 11:05 PM
 */
use rmrevin\yii\module\Comments;
use yii\helpers\Html;
use common\models\Post;
use yii\widgets\LinkPager;

$url = new Post();
/* @var $this yii\web\View */
$this->title = $tag->name;
?>

<h3>Tag: <?= $tag->name; ?></h3>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8">
        <?php foreach ($allpost as $item) : ?>
            <div class="tags">
                <div class="col-md-7" style="padding: 10px">

                    <img src="<?php echo Yii::$app->request->baseUrl . "http://local.admin.yiidemo.com" . $item->image ?>"
                         alt="Picture" style="width:100%">

                </div>

                <div class="col-md-5">
                    <div class="title" style="margin-top: 30px;">
                        <a href="<?= \yii\helpers\Url::to(['/post/view/']) . '?id=' . $item->id; ?>">
                            <p><b><?= $item->postName ?></b></p>
                        </a>
                    </div>
                </div>
            </div>


        <?php endforeach; ?>


    </div>
    <!--    SlideBar-->
    <?= \frontend\widgets\slideBarWidget::widget() ?>
</div>