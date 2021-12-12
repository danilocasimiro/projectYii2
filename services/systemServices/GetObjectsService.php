<?php

namespace app\services\systemServices;

class GetObjectsService {

  public static function getObjects(string $class): object
  {
    return $class::find()->where(['deleted_at' => null]);
  }
}