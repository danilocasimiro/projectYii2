<?php

namespace app\useCases\systemServices;

use app\interfaces\ModelInterface;
use yii\web\BadRequestHttpException;

class UpdateObjectService {

  public static function updateObject(ModelInterface $model, array $bodyParams): ModelInterface 
  {
    $model->load($bodyParams, '');

    if(!$model->save()) {
        throw new BadRequestHttpException(json_encode($model->getErrors()));
    };

    return $model;
  }
}