<?php

namespace app\services\systemServices;

use app\models\Log;
use app\services\systemServices\CreateObjectsRelationsService;
use yii\web\BadRequestHttpException;

class CreateBatchObjectsService {

  public static function createBatchObjects(string $class, array $bodyParams): array
  {
    if(empty($bodyParams['objects'])) {
      throw new BadRequestHttpException("The params 'object' is mandatory.");
    }

    foreach($bodyParams['objects'] as $object) {

        $model = new $class;

        $model->load($object, '');

        if(!$model->save()) {
            throw new BadRequestHttpException(json_encode($model->getErrors()));
        };
        
        CreateObjectsRelationsService::createObjectsRelations($model, $object);

        $models[] = $model;

    }

    if($class != 'app\models\Log') {
      foreach($models as $model) {
        Log::addLogCreate($model, $class);
      }
    }

    return $models;
  }
}