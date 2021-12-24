<?php

namespace app\modules\v1\controllers;

use app\helpers\HelperExpandMethods;
use app\useCases\systemServices\ {
    CreateBatchObjectsService, CreateObjectService, DeleteObjectService, GetObjectService, GetObjectsService, UpdateObjectService
};
use app\interfaces\ModelInterface;
use app\useCases\doActionsUseCases\{AfterCreateUseCase, AfterDeleteUseCase, AfterUpdateUseCase};
use Yii;
use yii\web\BadRequestHttpException;

class BaseController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public $bodyParams = [];

    /**@var ModelInterface */
    public $getObject;

    /**
     * @inheritdoc
     */
    public function behaviors() {
      
        $behaviors['authenticator'] = [
            'class' => \sizeg\jwt\JwtHttpBearerAuth::class,
            'except' => [
                'options'
            ]
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

    public function actionOptions()
    {
        return true;
    }

    public function beforeAction($action)
    {
        $this->bodyParams = Yii::$app->request->getBodyParams();

        if($action->id === 'create-batch' && empty($this->bodyParams['objects'])) {
    
            throw new BadRequestHttpException("The params 'objects' is mandatory.");
            
        }

        if(in_array($action->id, ['view', 'delete', 'update'])) {

            $this->getObject();
          
        }

        return parent::beforeAction($action);
    }

    public function actionCreate(): ModelInterface
    {
        $transaction = Yii::$app->db->beginTransaction();
        
        $model = CreateObjectService::createObject($this->modelClass, $this->bodyParams);

        $afterCreateUseCase = new AfterCreateUseCase;

        $afterCreateUseCase->execute($model, $this);

        $transaction->commit();

        return $model;
    }
    
    public function actionView(): array
    {
        return HelperExpandMethods::mergeObjectWithRelationsOnExpand($this->getObject);
    }
     
    public function actionIndex(): array
    {
        $models = GetObjectsService::getObjects($this->modelClass)->all();

        if(empty($models)) {
            return [];
        }

        return HelperExpandMethods::mergeObjectsWithRelationsOnExpand($models);

    }

    public function actionUpdate(): ModelInterface
    {        
        $oldModelAttributes = $this->getObject->getAttributes();

        $transaction = Yii::$app->db->beginTransaction();

        $model = UpdateObjectService::updateObject($this->getObject, $this->bodyParams);

        $afterUpdateUseCase = new AfterUpdateUseCase;

        $afterUpdateUseCase->execute($model, $this, $oldModelAttributes);

        $transaction->commit();

        return $model;
    }

    public function actionCreateBatch(): array
    {
        $transaction = Yii::$app->db->beginTransaction();

        $models = CreateBatchObjectsService::createBatchObjects($this->modelClass, $this->bodyParams); 

        $afterCreateUseCase = new AfterCreateUseCase;
        
        foreach($models as $model) {
        
            $afterCreateUseCase->execute($model, $this);

        }

        $transaction->commit();

        return $models;
    }

    public function actionDelete(): string
    {
        $transaction = Yii::$app->db->beginTransaction();

        $typeDelete = !empty($this->bodyParams['typeDelete']) ? $this->bodyParams['typeDelete'] : $this->defaultTypeDelete;

        $afterDeleteUseCase = new AfterDeleteUseCase;

        $afterDeleteUseCase->execute($this->getObject, $this, $typeDelete);

        $response = DeleteObjectService::deleteObject($this->modelClass, $typeDelete, $this->getObject);
        
        if($response) {
            $transaction->commit();
            
            return $response;
        } 
    }

    private function getObject()
    {
        $id = Yii::$app->request->get('id');
        $object = GetObjectService::getObject($this->modelClass, $id)->one();

        if(!$object) {
            throw new BadRequestHttpException("Object id: ".$id." not found");
        }

        $this->getObject = $object;
    }
}
