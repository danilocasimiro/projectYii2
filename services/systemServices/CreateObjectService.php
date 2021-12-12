<?php

namespace app\services\systemServices;

use app\models\Log;
use app\services\systemServices\CreateObjectsRelationsService;
use yii\web\BadRequestHttpException;

class CreateObjectService {

  public static function createObject(string $class, array $params): object
  {
      $model = new $class;

      $model->load($params, '');

      if(!$model->save()) {

        throw new BadRequestHttpException(json_encode($model->getErrors()));
      }

      CreateObjectsRelationsService::createObjectsRelations($model, $params);

      if($class != 'app\models\Log') {
        Log::addLogCreate($model, $class);
      }

      return $model;
  }
}