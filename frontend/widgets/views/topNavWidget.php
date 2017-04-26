<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 4/24/2017
 * Time: 11:58 AM
 */
use common\models\Category;
?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html">Trang chủ Blog Quan</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
<!--                <li>-->
<!--                    <!--                    <a href="index.html">Home</a>-->-->
<!--                    <div class="dropdown">-->
<!--                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Home-->
<!--                            <span class="caret"></span></button>-->
<!--                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">-->
<!--                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>-->
<!--                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>-->
<!--                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>-->
<!--                            <li role="presentation" class="divider"></li>-->
<!--                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </li>-->

                <?php
                    foreach ($dataCat as $key => $value){
                ?>

                <li>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                            <?php echo $value['cateName'];?>
                            <span class="caret"></span></button>


                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <?php
                            $catSub1 = new Category();
                            $dataCatSub1 = $catSub1 ->getCategoryByParent($value['id']);
                            foreach ($dataCatSub1 as $key1 => $value1) {
                                ?>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= Yii::$app->homeUrl?>post/listpost?id=<?php echo $value1['id']?>">
                                        <?php echo $value1['cateName'];?>
                                    </a></li>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>

                <?php } ?>

                <li>
                    <a href="about.html">About</a>
                </li>
                <li>
                    <a href="post.html">Sample Post</a>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Quan Blog</h1>
                    <hr class="small">
                    <span class="subheading">Trải qua một việc thêm một phần trí khôn.</span>
                </div>
            </div>
        </div>
    </div>
</header>
