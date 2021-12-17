<?php

namespace app\services\systemServices;

use app\interfaces\ModelInterface;
use app\services\systemServices\CreateObjectsRelationsService;
use yii\web\BadRequestHttpException;

class CreateObjectService {

  public static function createObject(string $class, array $params): ModelInterface
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