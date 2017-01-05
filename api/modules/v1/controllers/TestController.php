<?php
/**
 * Created by PhpStorm.
 * User: simone.checcoli
 * Date: 30/12/2016
 * Time: 17:15
 */

namespace api\modules\v1\controllers;

use api\modules\v1\actions\FollowAction;
use api\modules\v1\models\Followers;
use yii\rest\ActiveController;

class TestController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\TestModel';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                //Questo serve per l'Allow Orgin da tutti gli host
                'Origin' => ['*'],
                'Access-Control-Request-Method' => [
                    'GET',
                    //'POST',
                    //'PUT',
                    // 'PATCH',
                    // 'DELETE',
                    // 'HEAD',
                    // 'OPTIONS'
                ],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ];


        return $behaviors;
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'prepareDataProvider' => function () {
                    $searchModel = new \api\modules\v1\models\search\TestModelSearch();
                    return $searchModel->search(\Yii::$app->request->queryParams);
                },
            ],
            //altre action da implementare vanno qui, Sono le Action classiche dei rest di Yii, oppure puoi crearti la tua custom
        ];
    }


}