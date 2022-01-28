<?php

namespace app\useCases\systemServices;

use app\models\entities\interfaces\EntitiesInterface;
use yii\web\BadRequestHttpException;

class CreateObjectService {

  public static function createObject(string $class, array $params): EntitiesInterface
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