<?php

namespace app\modules\v1\controllers;

use app\models\Log;
use app\services\systemServices\CreateBatchObjectsService;
use app\services\systemServices\CreateObjectService;
use app\services\systemServices\DeleteObjectService;
use app\services\systemServices\GetObjectService;
use app\services\systemServices\GetObjectsService;
use app\services\systemServices\UpdateObjectService;
use app\interfaces\ModelInterface;
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

    public function actionView(string $id): ModelInterface
    {
        return GetObjectService::getObject($this->modelClass, $id);
    }

    public function actionCreate(): ModelInterface
    {
        $transaction = Yii::$app->db->beginTransaction();
        
        $model = CreateObjectService::createObject($this->modelClass, $this->bodyParams);

        $this->createLog($this->modelClass, $model);

        $transaction->commit();

        return $model;
    }
    
    public function actionIndex(): array
    {
       return GetObjectsService::getObjects($this->modelClass)->all();
    }

    public function actionUpdate(string $id): ModelInterface
    {        
        $oldModel = GetObjectService::getObject($this->modelClass, $id);

        $oldModelAttributes = $oldModel->getAttributes();

        $transaction = Yii::$app->db->beginTransaction();

        $model = UpdateObjectService::updateObject($oldModel, $this->bodyParams);

        Log::addLogUpdate($oldModelAttributes, $this->modelClass, $this->bodyParams);

        $transaction->commit();

        return $model;
    }

    public function actionCreateBatch(): array
    {
        $transaction = Yii::$app->db->beginTransaction();

        $models = CreateBatchObjectsService::createBatchObjects($this->modelClass, $this->bodyParams); 

        foreach($models as $model) {
        
            $this->createLog($this->modelClass, $model);
        }

        $transaction->commit();

        return $models;
    }

    public function actionDelete(string $id): string
    {
        $model = GetObjectService::getObject($this->modelClass, $id);

        $typeDelete = !empty($this->bodyParams['typeDelete']) ? $this->bodyParams['typeDelete'] : $this->defaultTypeDelete;

        $message = DeleteObjectService::deleteObject($this->modelClass, $typeDelete, $model); 

        Log::addLogDelete($model, $this->modelClass, $typeDelete);
        
        return $message;
    }

    private function createLog(string $class, ModelInterface $model): void
    {
        if($class != 'app\models\Log') {
            Log::addLogCreate($model, $class);
        }
    }
}
