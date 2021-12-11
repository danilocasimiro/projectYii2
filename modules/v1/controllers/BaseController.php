<?php

namespace app\modules\v1\controllers;

use app\services\CreateBatchObjectsService;
use app\services\CreateObjectService;
use app\services\DeleteObjectService;
use app\services\GetObjectService;
use app\services\GetObjectsService;
use app\services\UpdateObjectService;
use Yii;

class BaseController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function behaviors() {
      
        $behaviors['authenticator'] = [
            'class' => \sizeg\jwt\JwtHttpBearerAuth::class,
        ];

         $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Allow' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Allow-Credentials' => null,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => []
            ]
        ];
  
      return $behaviors;
    }

    public function actionView(string $id): object
    {
        return GetObjectService::getObject($this->modelClass, $id);
    }

    public function actionCreate(): object
    {
        $transaction = Yii::$app->db->beginTransaction();
        
        $model = CreateObjectService::createObject($this->modelClass, Yii::$app->request->getBodyParams());

        $transaction->commit();

        return $model;
    }
    
    public function actionIndex(): array
    {
       return GetObjectsService::getObjects($this->modelClass);
    }

    public function actionUpdate(string $id): object
    {        
        $transaction = Yii::$app->db->beginTransaction();

        $model = UpdateObjectService::updateObject($this->modelClass, $id);

        $transaction->commit();

        return $model;
    }

    public function actionCreateBatch(): array
    {
        $bodyParams = Yii::$app->request->getBodyParams();

        $transaction = Yii::$app->db->beginTransaction();

        $models = CreateBatchObjectsService::createBatchObjects($this->modelClass, $bodyParams); 

        $transaction->commit();

        return $models;
    }

    public function actionDelete(string $id): string
    {
        $bodyParams = Yii::$app->request->getBodyParams();
        
        $typeDelete = !empty($bodyParams['typeDelete']) ? $bodyParams['typeDelete'] : $this->defaultTypeDelete;

        $message = DeleteObjectService::deleteObject($this->modelClass, $typeDelete, $id); 
        
        return $message;
    }
}
