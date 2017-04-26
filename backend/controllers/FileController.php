<?php

namespace backend\controllers;

class FileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
