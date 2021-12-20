<?php

namespace app\useCases\systemServices;

class CreateBatchObjectsService {

  public static function createBatchObjects(string $class, array $bodyParams): array
  {
    foreach($bodyParams['objects'] as $object) {

        $model = CreateObjectService::createObject($class, $object);

        $models[] = $model;

    }

    return $models;
  }
}