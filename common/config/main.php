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

            //thêm i18n
            'i18n' => [
                'translations' => [
                    'frontend*' => [
                        'class' => 'yii\i18n\PhpMessageSource',
                        'basePath' => '@common/messages',
                    ],
                    'backend*' => [
                        'class' => 'yii\i18n\PhpMessageSource',
                        'basePath' => '@common/messages',
                    ],
                ],
            ],
            'cache' => [
                'class' => 'yii\caching\FileCache',
            ],
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
    'language' => 'en-EN',

];
