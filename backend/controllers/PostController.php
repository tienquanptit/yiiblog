<?php

namespace backend\controllers;

use common\models\Category;
use common\models\Group;
use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritdoc
     */
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
        if(empty($dataCat))
            $dataCat = array();

        $time = time();
        $model->created_at = $time;
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->file = UploadedFile::getInstance($model,'file');

            if($model->file){
                //var_dump($model->file);die;
                $model->file->saveAs('../uploads/'.$model->file->name);
                $model->image = $model->file->name;

            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'dataGroup'=> $dataGroup,

                'model_cate' => $model_cate,
                'dataCat' => $dataCat,
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
        if(empty($dataCat))
            $dataCat = array();

        $time = time();
        $model->updated_at = $time;

        $model->file = UploadedFile::getInstance($model,'file');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

//            $model->file = UploadedFile::getInstance($model,'file');

            if($model->file){
                //var_dump($model->file);die;
                $model->file->saveAs('../../uploads/'.$model->file->name);
                $model->image = $model->file->name;

            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'dataGroup'=> $dataGroup,

                'model_cate' => $model_cate,
                'dataCat' => $dataCat,
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
