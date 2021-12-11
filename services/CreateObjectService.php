<?php

namespace app\services;

use app\services\CreateObjectsRelationsService;
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

      return $model;
  }
}