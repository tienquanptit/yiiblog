<?php

namespace frontend\controllers;

class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionListpost($id){
        return $this->render('listPost');
    }
}
