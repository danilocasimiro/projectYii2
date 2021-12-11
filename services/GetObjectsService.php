<?php

namespace app\services;

use yii\web\BadRequestHttpException;

class GetObjectsService {

  public static function getObjects(string $class): array
  {
    $models = $class::find()->all();

    if(empty($models)) {

        throw new BadRequestHttpException('Objects '.ucfirst($class).' not found');
    }

    return $models;
  }
}