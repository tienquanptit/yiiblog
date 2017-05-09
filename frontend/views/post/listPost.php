<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use common\models\Post;
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
$Baseurl = Yii::$app->homeUrl;
?>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8">
        <?php foreach ($data as $key => $value) : ?>
            <div class="post-preview">

                <h2><?php echo Html::a($value['postName'], ['post/view', 'id' => $value['id']], ['class' => 'post-title']); ?>
                </h2>
                <h4>
                    <?php echo '<small>' . $value['description'] . '</small>'; ?>
                </h4>

                <p class="post-meta">Posted by <a href="https://www.facebook.com/quannntien">Quan
                        Tien</a> <?php echo ' on ' . date('d-m-Y', $value['created_at']); ?></p>
            </div>
            <hr>

        <?php endforeach; ?>

        <!-- Pager -->
        <ul class="pager">
            <li class="next">
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
            </li>
        </ul>


    </div>
    <!--    SlideBar-->
    <?= \frontend\widgets\slideBarWidget::widget() ?>
</div>


<hr>
