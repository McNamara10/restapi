<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'api',
    'version' => $versionNo,
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'test' => "/v1/test",
                    ],
                    'pluralize' => false,
                    'extraPatterns' => [
                        'POST ALTRA_ACTION' => "ALTRA_ACTION",
                    ],
                ]
            ],
        ],
        /*
        'request' => [
            // Set Parser to JsonParser to accept Json in request
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],

        */
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        // Set this enable authentication in our API
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false, // Don't forget to set Auto login to false
        ],

        // Enable logging for API in a api Directory different than web directory
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    // maintain api logs in api directory
                    'logFile' => "@api/runtime/logs/{$versionNo}_error.log"
                ],
            ],
        ],
    ],

    'modules' => [
        'v1' => [
            'basePath' => '@api/modules/v1',
            'class' => 'api\modules\v1\Api',
        ]
    ],

    'params' => $params,
];

return $config;