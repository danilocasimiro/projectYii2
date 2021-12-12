<?php

namespace app\services\systemServices;

use yii\web\BadRequestHttpException;

class GetObjectService {

  public static function getObject(string $class, string $id): object
  {
    $model = $class::find()->where(['id' => $id, 'deleted_at' => null])->one();

    if(empty($model)) {

        throw new BadRequestHttpException('Object '.ucfirst($class).' not found');
    }

    return $model;
  }
}