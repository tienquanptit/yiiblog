<?php

namespace backend\controllers;

use common\models\Category;
use common\models\Group;
use common\models\PostTag;
use common\models\Tag;
use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
////                    [
////                        'allow' => true,
////                        'roles' => ['@'],
////                        'matchCallback' => function($rule, $action){
////                            $control = Yii::$app->controller->id;
////                            $action = Yii::$app->controller->action->id;
////
////                            $role = $action.'-'.$control; //index-post
////                            if(Yii::$app->user->can($role)){
////                                return true;
////                            }
////                        }
////                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                    'delete' => ['post'],
//                ],
//            ],
//        ];
//    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//        ];
//    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Post();

        $group = new Group();
        $dataGroup = ArrayHelper::map($group->getAllGroup(),'id','groupName');

        $model_cate = new Category();
        $dataCat = $model_cate->getCategoryParent();
        $tag = new Tag();
        $alltag = $tag->getAllTag();
        if(empty($dataCat))
            $dataCat = array();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            $model->updated_at = time();
            //var_dump($model->tag);die;
            if($model->save(false)){
                Yii::$app->session->addFlash('success','Thêm mới bài viết thành công');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->addFlash('danger','Thêm mới bài viết không thành công');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'dataGroup'=> $dataGroup,

                'model_cate' => $model_cate,
                'dataCat' => $dataCat,

                'alltag' => $alltag,
            ]);
        }

    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $group = new Group();
        $dataGroup = ArrayHelper::map($group->getAllGroup(),'id','groupName');

        $model_cate = new Category();
        $dataCat = $model_cate->getCategoryParent();
        $tag = new Tag();
        $alltag = $tag->getAllTag();
        if(empty($dataCat))
            $dataCat = array();

        $time = time();
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model,'file');
            if($model->file){//if isser($_FILES['file'])
                //code
//                var_dump($model->file);die;
                $model->file->saveAs('../../uploads/'.$model->file->name);
                $model->image = $model->file->name;

            }

//            $model->created_at = time();
            $model->updated_at = time();
            PostTag::deleteAll(['post_id' => $id]);
            if($model->save(false)){
                Yii::$app->session->addFlash('success','Update bài viết thành công');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->addFlash('danger','Update bài viết không thành công');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'dataGroup'=> $dataGroup,

                'model_cate' => $model_cate,
                'dataCat' => $dataCat,

                'alltag' => $alltag,
            ]);
        }

    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
