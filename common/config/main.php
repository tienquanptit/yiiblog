<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager'=>[
          'class'=>'yii\rbac\DbManager'
        ],
    ],
    'modules' => [
        // ...
        'comments' => [
            'class' => 'rmrevin\yii\module\Comments\Module',
            'userIdentityClass' => 'app\models\User',
            'useRbac' => true,
        ],

        //tích hợp facebook
        'social' => [
            // the module class
            'class' => 'kartik\social\Module',

            // the global settings for the Facebook plugins widget
            'facebook' => [
                'appId' => 'FACEBOOK_APP_ID',
                'secret' => 'FACEBOOK_APP_SECRET',
            ],

        ],
    ],

];
