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
<!--            <div class="post-preview">-->
<!---->
<!--                <h2>--><?php //echo Html::a($value['postName'], ['post/view', 'id' => $value['id']], ['class' => 'post-title']); ?>
<!--                </h2>-->
<!--                <h4>-->
<!--                    --><?php //echo '<small>' . $value['description'] . '</small>'; ?>
<!--                </h4>-->
<!---->
<!--                <p class="post-meta">Posted by <a href="https://www.facebook.com/quannntien">Quan-->
<!--                        Tien</a> --><?php //echo ' on ' . date('d-m-Y', $value['created_at']); ?><!--</p>-->
<!--            </div>-->
<!--            <hr>-->


            <div class="w3-card-4 w3-margin w3-white">

                <img src="<?php echo Yii::$app->request->baseUrl . "http://local.admin.yiidemo.com" . $value['image'] ?>"
                     alt="Picture" style="width:100%">

                <div class="w3-container">
                    <!--                    <h3><b>  -->
                    <?php //echo Html::a($item->postName,['post/view','id'=>$item->id], ['class'=>'post-title']);?><!-- </b></h3>-->
                    <h2>
                        <b class="post-title"> <?php echo $value['postName']; ?> </b>
                    </h2>

                    <p class="post-meta">Posted by <a href="https://www.facebook.com/quannntien">Quan
                            Tien</a> <?php echo ' on ' . date('d-m-Y',$value['created_at']); ?></p>
                </div>

                <div class="w3-container">

                    <?php
                    $content = strip_tags(html_entity_decode($value['content']));
                    $lim = 200;
                    if (mb_strlen($content, 'UTF-8') > $lim) {
                        $content = mb_substr($content, 0, $lim - 3, 'utf-8') . '...';
                    }
                    ?>

                    <p><?php echo $content ?></p>
                    <div class="w3-row">
                        <div class="w3-col m8 s12">
                            <p>
                                <?php echo Html::a('<b>READ MORE »</b>', ['post/view', 'id' => $value['id']], ['class' => 'w3-button w3-padding-large w3-white w3-border']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
