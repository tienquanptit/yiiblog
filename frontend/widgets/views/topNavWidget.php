<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 4/24/2017
 * Time: 11:58 AM
 */
use common\models\Category;
$Baseurl = Yii::$app->homeUrl;
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
            <a class="navbar-brand" href="<?= \yii\helpers\Url::to(['site/index']) ?>">Trang chủ Blog's QuanTien</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">





                <?php
                    foreach ($dataCat as $key => $value){
                ?>

                <li>

                        <a href="javascript:;" class=" user-profile dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                            <?php echo $value['cateName'];?>
                            <span class="caret"></span></a>


                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <?php
                            $catSub1 = new Category();
                            $dataCatSub1 = $catSub1 ->getCategoryByParent($value['id']);
                            foreach ($dataCatSub1 as $key1 => $value1) {
                                ?>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=$Baseurl;?>post/list-post?id=<?php echo $value1['id']?>">
                                        <?php echo $value1['cateName'];?>
                                    </a></li>

                                <?php
                            }
                            ?>
                        </ul>

                </li>

                <?php } ?>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['site/about']) ?> ">About</a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>">Contact</a>
                </li>
                <?php
                    if(Yii::$app->user->isGuest) {
                        ?>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['site/login']) ?>">Login</a>
                        </li>
                        <?php
                    }else {
                        ?>
                        <ul class="nav navbar-nva navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">Account</a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right" id="dropdownacount">
                                    <li style="...">
                                        <a href="javascript:;" style="...">
                                            Signing in as: <?php echo Yii::$app->user->identity->username; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= \yii\helpers\Url::to(['site/logout']) ?>" data-method="post">
                                            <i class="fa fa-sign-out"></i>Log out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <?php
                    }
                ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('<?=$Baseurl;?>img/home-bg.jpg')">
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
