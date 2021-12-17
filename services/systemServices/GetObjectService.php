<?php

namespace app\services\systemServices;

use app\interfaces\ModelInterface;
use yii\web\BadRequestHttpException;

class GetObjectService {

  public static function getObject(string $class, string $id): ModelInterface
  {
    $model = $class::find()->where(['id' => $id, 'deleted_at' => null])->one();

    if(empty($model)) {

        throw new BadRequestHttpException('Object '.ucfirst($class).' not found');
    }

    return $model;
  }
}