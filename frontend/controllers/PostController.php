<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Post;
use common\models\Tag;
use yii\data\Pagination;


class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionView($id){
        $model = Post::findOne(['id'=>$id]);

    $model1 = Post::find()->one();
                $tag = Tag::find()->leftJoin('tbl_posttag', '`tbl_tag`.`id` = `tbl_posttag`.`tag_id`')
            ->where(['tbl_posttag.post_id' => $id])->all();

            return $this->render('view',[
                'model'=>$model,
                'model1'=>$model1,
                'tag'=>$tag,
            ]);
    }

    public function actionListPost($id){

        $data = new Post();
        $data = $data->getPostByCatId($id);

        #code...
        #phan trang
        $query = Post::find()->asArray()->where('cate_id=:cateid',['cateid'=>$id]);

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $query->count(),
        ]);
        $posts = $query->orderBy('created_at')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('listPost',[
            'posts'=>$posts,
            'data'=> $data,
            'pagination'=>$pagination,

        ]);

    }

    public function actionListTag($id){
//        $post = new Post();
        $tag = Tag::find()->where(['id' => $id])->one();
        $allpost = Post::find()->leftJoin('tbl_posttag', '`tbl_post`.`id` = `tbl_posttag`.`post_id`')
            ->orderBy(['id' => SORT_DESC])->where(['tbl_posttag.tag_id' => $id])
            ->all();
        return $this->render('listTag', [
            'tag' => $tag,
            'allpost' => $allpost,
        ]);
    }


//    public function actionTag($id)
//    {
//        $post = new Post();
//        $pages = $post->getPostPagingByTag($id);
//        $tag = Tag::find()->where(['id' => $id])->one();
//        $allpost = Post::find()->leftJoin('post_tag', '`post`.`id` = `post_tag`.`post_id`')
//            ->orderBy(['id' => SORT_DESC])->where(['post_tag.tag_id' => $id, 'status' => '1'])
//            ->limit($pages->limit)->offset($pages->offset)->all();
//        return $this->render('list_by_tag', [
//            'tag' => $tag,
//            'allpost' => $allpost,
//            'pages' => $pages,
//        ]);
//    }



}
