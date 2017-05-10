<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 4/13/2017
 * Time: 11:05 PM
 */
$this->title = ($model) ? $model->postName : 'Not found';
use rmrevin\yii\module\Comments;
use yii\helpers\Html;
use common\models\Post;
use yii\widgets\LinkPager;
use kartik\social\FacebookPlugin;

?>
<head>
    <meta property="fb:app_id" content="121195288445637"/>
    <meta property="fb:admins" content="100006435767361"/>
</head>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=121195288445637";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="view-post">
    <?php
    if ($model) : ?>


        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <br>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <div class="w3-card-4 w3-margin w3-white">
                        <div class="w3-container">
                            <h1><?php echo $model->postName; ?></h1>
                            <p class="post-meta">Posted by <a href="https://www.facebook.com/quannntien">Quan Tien</a> <?php echo ' on '.date('d-m-Y',$model->created_at);?></p>
                        </div>
                        <hr>
                        <div class="w3-container">

                            <p><?php echo $model->content; ?></p>

                        </div>

                        <div class="tags">
                            Tag:
                            <?php
                            $i = 0;
                            foreach ($tag as $item) {
                                if ($i % 2 == 0) {
                                    ?>
                                    <a class="btn btn-success btn-xs"
                                       href="<?= \yii\helpers\Url::to(['post/list-tag/']).'?id=' . $item->id ?>""><?= $item->name; ?></a>
                                    <?php
                                } else {
                                    ?>
                                    <a class="btn btn-danger btn-xs"
                                       href="<?= \yii\helpers\Url::to(['post/list-tag/']).'?id=' . $item->id ?>"><?= $item->name; ?></a>
                                    <?php
                                }
                                $i++;
                            }
                            ?>
                    </div>

                </div>


            </div>
                <!--    SlideBar-->
                <?= \frontend\widgets\slideBarWidget::widget() ?>
        </div>
        <hr>
<!--        <!-- Post Content -->
<!--        <article>-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-xs-12 col-sm-6 col-md-8">-->
<!--                        --><?php //echo $model->content; ?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </article>-->


<h3>Demo</h3>

<!--        --><?php //echo Comments\widgets\CommentListWidget::widget([
//            'entity' => (string) 'photo-15', // type and id
//        ]);?>
<!--            <h3>Bình luận</h3>-->
<!--            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>-->


            <?php
                echo FacebookPlugin::widget(['type'=>FacebookPlugin::COMMENT, 'settings' => ['data-width'=>1000, 'data-numposts'=>5]]);
            ?>
        <?php else: ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">$tiems;
            </button>
            <strong>Error 404!</strong> Không có thông tin bài viết...
        </div>

    <?php endif; ?>
</div>
