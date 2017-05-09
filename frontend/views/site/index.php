<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use common\models\Post;
use yii\widgets\LinkPager;
$this->title = 'My Yii Application';
?>


<?php if($posts) : ?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8">
        <?php foreach ($posts as $item) : ?>
<!--        <div class="post-preview">-->
<!---->
<!--                <h2>--><?php //echo Html::a($item->postName,['post/view','slug'=>$item->slug], ['class'=>'post-title']);?>
<!--                </h2>-->
<!--<h4>-->
<!--                    --><?php //echo '<small>'.$item->description.'</small>'; ?>
<!--</h4>-->
<!---->
<!--            <p class="post-meta">Posted by <a href="https://www.facebook.com/quannntien">Quan Tien</a> --><?php //echo ' on '.date('d-m-Y',$item->created_at);?><!--</p>-->
<!--        </div>-->
<!--        <hr>-->

            <div class="w3-card-4 w3-margin w3-white">
                <img src="<?php echo $item->image;?>" alt="Nature" style="width:100%">
                <div class="w3-container">
                    <h3><b>  <?php echo Html::a($item->postName,['post/view','id'=>$item->id], ['class'=>'post-title']);?> </b></h3>
                    <h4> <?php echo $item->description?> </h4>
                    <p class="post-meta">Posted by <a href="https://www.facebook.com/quannntien">Quan Tien</a> <?php echo ' on '.date('d-m-Y',$item->created_at);?></p>
                </div>

                <div class="w3-container">

                    <?php
                    $content = strip_tags(html_entity_decode($item->content));
                    $lim = 250;
                    if (mb_strlen($content, 'UTF-8') > $lim) {
                        $content = mb_substr($content, 0, $lim - 3, 'utf-8') . '...';
                    }
                    ?>

                    <p><?php echo $content ?></p>
                    <div class="w3-row">
                        <div class="w3-col m8 s12">
                            <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
                        </div>
                        <div class="w3-col m4 w3-hide-small">
                            <p><span class="w3-padding-large w3-right"><b>Comments &nbsp;</b> <span class="w3-tag">0</span></span></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <?php endif; ?>
        <!-- Pager -->
        <ul class="pager">
            <li class="next">
                <?= LinkPager::widget(['pagination'=> $pagination])?>
            </li>
        </ul>


    </div>


    <!--    SlideBar-->
    <?= \frontend\widgets\slideBarWidget::widget() ?>


</div>



<hr>
