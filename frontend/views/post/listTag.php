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
            <div class="post-preview">

                <a href="<?= \yii\helpers\Url::to(['/post/view/']) . '?id=' . $item->id; ?>">
                    <p><?= $item->postName ?></p>
                </a>
            </div>
            <hr>

        <?php endforeach; ?>


    </div>
    <!--    SlideBar-->
    <?= \frontend\widgets\slideBarWidget::widget() ?>
</div>



<!--<div class="view-post">-->
<!---->
<!--    <!-- Page Header -->-->
<!--    <!-- Set your background image for this header on the line below. -->-->
<!--    <br>-->
<!--    <hr>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xs-12 col-sm-6 col-md-8">-->
<!--                <div class="w3-card-4 w3-margin w3-white">-->
<!--                    <div class="heading"><h3>Tag: --><?//= $tag->name; ?><!--</h3></div>-->
<!--                    <hr>-->
<!---->
<!---->
<!--                    --><?php
//                    foreach ($allpost as $item) {
//                        ?>
<!--                        <div class="article">-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-3">-->
<!--                                    <div class="cover">-->
<!--                                        <a href="--><?//= \yii\helpers\Url::to(['/post/view/']) . '?id=' . $item->id; ?><!--">-->
<!--                                            <img src="--><?//= $item->image ?><!--">-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-9">-->
<!--                                    <div class="title" style="margin-top: 30px;">-->
<!--                                        <a href="--><?//= \yii\helpers\Url::to(['/post/view/']) . '?id=' . $item->id; ?><!--">-->
<!--                                            <p>--><?//= $item->postName ?><!--</p>-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                    <div class="description">-->
<!--                                        <p>-->
<!--                                            --><?php
//                                            if (strlen($item->description) > 150) {
//                                                echo mb_substr($item->description, 0, 150, "utf-8") . '...';
//                                            } else {
//                                                echo $item->description;
//                                            }
//                                            ?>
<!--                                        </p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <hr/>-->
<!--                        --><?php
//                    }
//                    ?>
<!---->
<!---->
<!---->
<!---->
<!--                </div>-->
<!---->
<!---->
<!--            </div>-->
<!--            <!--    SlideBar-->-->
<!--            --><?//= \frontend\widgets\slideBarWidget::widget() ?>
<!--        </div>-->
<!--        <hr>-->
<!--    </div>-->