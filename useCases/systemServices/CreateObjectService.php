<?php

namespace app\useCases\systemServices;

use app\interfaces\ModelInterface;
use app\useCases\systemServices\CreateObjectsRelationsService;
use yii\web\BadRequestHttpException;

class CreateObjectService {

  public static function createObject(string $class, array $params): ModelInterface
  {
      $model = new $class;

      static::loadModel($model, $params);

      static::saveModel($model);

      CreateObjectsRelationsService::createObjectsRelations($model, $params);

      return $model;
  }

  private static function loadModel(&$model, $params)
  {
      $model->load($params, '');
  }

  private static function saveModel($model)
  {
    if(!$model->save()) {

      throw new BadRequestHttpException(json_encode($model->getErrors()));
    }
  }
  
}