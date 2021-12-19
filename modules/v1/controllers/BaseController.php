<?php

namespace app\modules\v1\controllers;

use app\helpers\HelperExpandMethods;
use app\services\systemServices\ {
    CreateBatchObjectsService, CreateObjectService, DeleteObjectService, GetObjectService, GetObjectsService, UpdateObjectService
};
use app\interfaces\ModelInterface;
use app\services\doActionsServices\AfterCreateService;
use app\services\doActionsServices\AfterDeleteService;
use app\services\doActionsServices\AfterUpdateService;
use Yii;
use yii\web\BadRequestHttpException;

class BaseController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public $bodyParams = [];

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

    public function beforeAction($action)
    {
        $this->bodyParams = Yii::$app->request->getBodyParams();

        if($action->id === 'create-batch' && empty($this->bodyParams['objects'])) {
    
            throw new BadRequestHttpException("The params 'objects' is mandatory.");
            
        }
        return parent::beforeAction($action);
    }

    public function actionCreate(): ModelInterface
    {
        $transaction = Yii::$app->db->beginTransaction();
        
        $model = CreateObjectService::createObject($this->modelClass, $this->bodyParams);

        $afterCreateService = new AfterCreateService;

        $afterCreateService->execute($model, $this);

        $transaction->commit();

        return $model;
    }
    
    public function actionView(string $id): array
    {
        $model = GetObjectService::getObject($this->modelClass, $id)->one();

        if(empty($model)) {
            return [];
        }

        return HelperExpandMethods::mergeObjectWithRelationsOnExpand($model);
    }
     
    public function actionIndex(): array
    {
        $models = GetObjectsService::getObjects($this->modelClass)->all();

        if(empty($models)) {
            return [];
        }

        return HelperExpandMethods::mergeObjectsWithRelationsOnExpand($models);

    }

    public function actionUpdate(string $id): ModelInterface
    {        
        $oldModel = GetObjectService::getObject($this->modelClass, $id)->one();

        if(empty($oldModel)) {
            throw new BadRequestHttpException("Object id: ".$id." not found");
        }

        $oldModelAttributes = $oldModel->getAttributes();

        $transaction = Yii::$app->db->beginTransaction();

        $model = UpdateObjectService::updateObject($oldModel, $this->bodyParams);

        $afterUpdateService = new AfterUpdateService;

        $afterUpdateService->execute($model, $this, $oldModelAttributes);

        $transaction->commit();

        return $model;
    }

    public function actionCreateBatch(): array
    {
        $transaction = Yii::$app->db->beginTransaction();

        $models = CreateBatchObjectsService::createBatchObjects($this->modelClass, $this->bodyParams); 

        $afterCreateService = new AfterCreateService;
        
        foreach($models as $model) {
        
            $afterCreateService->execute($model, $this);

        }

        $transaction->commit();

        return $models;
    }

    public function actionDelete(string $id): string
    {
        $model = GetObjectService::getObject($this->modelClass, $id)->one();

        $typeDelete = !empty($this->bodyParams['typeDelete']) ? $this->bodyParams['typeDelete'] : $this->defaultTypeDelete;

        $message = DeleteObjectService::deleteObject($this->modelClass, $typeDelete, $model); 

        $afterDeleteService = new AfterDeleteService;

        $afterDeleteService->execute($model, $this, $typeDelete);
        
        return $message;
    }
}
